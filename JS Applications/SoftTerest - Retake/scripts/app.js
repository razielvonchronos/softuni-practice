
import * as Service from "./services.js";
import * as kinvey from "./database.js";

function main() {
  let app = Sammy('#rooter', function () {
    this.use('Handlebars', 'hbs');

    this.get('#/', async function (ctx) {
      setHeaderInfo(ctx);
      const partials = {
        ...globalPartials,
      }
      let partial = '../views/home.hbs';
      if (ctx.isAuth) {
        ctx.ideas = await kinvey.ideaFindAll();
        ctx.ideas.sort((a, b) => b.likes - a.likes);
        partial = '../views/ideas.hbs'
      }
      this.loadPartials(partials).partial(partial);
    });

    this.get('#/register', function (ctx) {
      setHeaderInfo(ctx);
      this.loadPartials(globalPartials).partial('../views/register.hbs');
    })

    this.post('#/register', function (ctx) {
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
      ctx.ideas = await kinvey.userideas(ctx.user_id);
      console.log(ctx.ideas)
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
      Service.ideaCreate(ctx);
    })

    this.get('#/idea/:id', async function (ctx) {
      setHeaderInfo(ctx);
      const data = await kinvey.ideaFindOne(ctx.params.id)
      if (data) {
        ctx.idea = data;
        ctx.isCreator = data.organizer === localStorage.getItem('username');
        this.loadPartials(globalPartials).partial('../views/idea.hbs');
        const app = this;
        document.addEventListener('submit', (e) => {
          e.preventDefault();
          const formData = new FormData(e.target);
          let data = {
            id: ctx.idea._id,
            username: ctx.username,
            newComment: formData.get('newComment'),
            form: e.target
          }
          Service.ideaComment(ctx, data).then(res => {
            ctx.idea = res;
            this.loadPartials(globalPartials).partial('../views/idea.hbs');
          });
        });
      }
    })

    this.post('#/idea/:id', async function (ctx) {
      console.log(ctx)
    })

    this.get('#/like/:id', function (ctx) {
      setHeaderInfo(ctx);
      Service.ideaLike(ctx)
    })

    this.get('#/delete/:id', function (ctx) {
      Service.ideaDelete(ctx)
    })
  });

  const globalPartials = {
    header: '../views/common/header.hbs',
    footer: '../views/common/footer.hbs',
  }

  function setHeaderInfo(ctx) {
    ctx.isAuth = localStorage.getItem('authtoken') !== null;
    ctx.user_id = localStorage.getItem('user_id');
    ctx.username = localStorage.getItem('username');
  }

  // start the application
  app.run('#/');
}

main();