
import * as Service from "./services.js";
import * as kinvey from "./database.js";
import { Notification, redirect, saveAuth, toggleLoading } from "./utilities.js";

function main() {

  let app = Sammy('#app', function () {
    this.use('Handlebars', 'hbs');

    this.get('/#/', async function (ctx) {
      setHeaderInfo(ctx);
      const partials = {
        ...globalPartials,
        treks: '../views/components/treks.hbs'
      }
      if (ctx.isAuth) {
        ctx.treks_data = await kinvey.trekFindAll();
        ctx.treks_data.sort((a, b) => b.likes - a.likes);
      }
      this.loadPartials(partials).partial('../views/home.hbs');
    });

    this.get('/#/register', function (ctx) {
      setHeaderInfo(ctx);
      this.loadPartials(globalPartials).partial('../views/register.hbs')
    })

    this.post('/#/register', function (ctx) {
      Service.Register(ctx);
    })

    this.get('#/login', function (ctx) {
      this.loadPartials(globalPartials).partial('../views/login.hbs')
    })

    this.post('#/login', function (ctx) {
      Service.Login(ctx);
    })

    this.get('#/profile', async function (ctx) {
      setHeaderInfo(ctx);
      ctx.username = localStorage.getItem('username');
      const user_id = localStorage.getItem('user_id');
      ctx.user_treks = await kinvey.userTreks(user_id);
      this.loadPartials(globalPartials).partial('../views/profile.hbs')
    })

    this.get('#/logout', function (ctx) {
      Service.Logout(ctx);
    })

    this.get('#/create', function (ctx) {
      setHeaderInfo(ctx);
      this.loadPartials(globalPartials).partial('../views/create.hbs');
    })

    this.post('#/create', function (ctx) {
      Service.trekCreate(ctx);
    })

    this.get('#/details/:id', async function (ctx) {
      setHeaderInfo(ctx);
      const data = await kinvey.trekFindOne(ctx.params.id)
      if (data) {
        ctx.trek_data = data;
        ctx.isCreator = data.organizer === localStorage.getItem('username');
        this.loadPartials(globalPartials)
          .partial('../views/details.hbs');
      }
    })

    this.get('#/edit/:id', async function (ctx) {
      setHeaderInfo(ctx);
      const data = await kinvey.trekFindOne(ctx.params.id);
      if (data) {
        console.log(data)
        ctx.trek_data = data;
        this.loadPartials(globalPartials)
          .partial('../views/edit.hbs');
      }
    })

    this.post('#/edit/:id', function (ctx) {
      Service.trekEdit(ctx);
    })

    this.get('/#/close/:id', function (ctx) {
      kinvey.trekDelete(ctx.params.id).then(() => {
        Notification('success', "You closed the trek successfully")
        redirect(ctx, `#/`, 2000)
      })
    })

    this.get('#/like/:id', async function (ctx) {
      setHeaderInfo(ctx);
      const trek_data = await kinvey.trekFindOne(ctx.params.id);
      if (trek_data) {
        trek_data.likes = Number(trek_data.likes) + 1;
        kinvey.trekUpdate(trek_data).then(() => {
          Notification('success', "You liked the trek successfully")
          redirect(ctx, `#/details/${trek_data._id}`, 2000)
        })
      }
    })
  });

  const globalPartials = {
    header: '../views/common/header.hbs',
    footer: '../views/common/footer.hbs',
  }

  function setHeaderInfo(ctx) {
    ctx.isAuth = localStorage.getItem('authtoken') !== null;
    ctx.username = localStorage.getItem('username');
  }

  // start the application
  app.run('/#/');
}

main();