
import * as Service from "./services.js";
import * as kinvey from "./database.js";
import * as Data from "./data.js";

function main() {
  let app = Sammy('#rooter', function () {
    this.use('Handlebars', 'hbs');

    this.get('/#/', async function (ctx) {
      setHeaderInfo(ctx);
      const partials = {
        ...globalPartials,
      }
      if (ctx.isAuth) {
        ctx.recipes_data = await kinvey.recipeFindAll();
        ctx.recipes_data.sort((a, b) => b.likes - a.likes);
      }
      const partial = ctx.isAuth ? '../views/recipes.hbs' : '../views/home.hbs';
      this.loadPartials(partials).partial(partial);
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
      ctx.username = sessionStorage.getItem('username');
      const user_id = sessionStorage.getItem('user_id');
      ctx.user_recipes = await kinvey.userrecipes(user_id);
      this.loadPartials(globalPartials).partial('../views/profile.hbs')
    })

    this.get('#/logout', function (ctx) {
      Service.Logout(ctx);
    })

    this.get('#/share', function (ctx) {
      setHeaderInfo(ctx);
      ctx.categories = Object.keys(Data.categories);
      this.loadPartials(globalPartials).partial('../views/share.hbs')
    })

    this.post('#/share', function (ctx) {
      setHeaderInfo(ctx);
      Service.recipeCreate(ctx);
    })

    this.get('#/recipe/:id', async function (ctx) {
      setHeaderInfo(ctx);
      ctx.recipe = await kinvey.recipeFindOne(ctx.params.id);
      ctx.isCreator = ctx.recipe._acl.creator === ctx.user_id;
      this.loadPartials(globalPartials).partial('../views/recipe.hbs')
    })

    this.get('#/edit/:id', async function (ctx) {
      setHeaderInfo(ctx);
      ctx.recipe = await kinvey.recipeFindOne(ctx.params.id);
      ctx.recipe.ingredients.join(', ');
      ctx.categories = Object.keys(Data.categories);
      this.loadPartials(globalPartials).partial('../views/edit.hbs')
    })

    this.post('#/edit/:id', function (ctx) {
      Service.recipeEdit(ctx);
    })

    this.get('#/archive/:id', function (ctx) {
      setHeaderInfo(ctx);
      Service.recipeArchive(ctx);
    })

    this.get('#/like/:id', function (ctx) {
      setHeaderInfo(ctx);
      Service.recipeLike(ctx);
    })

  });

  const globalPartials = {
    header: '../views/common/header.hbs',
    footer: '../views/common/footer.hbs',
  }

  function setHeaderInfo(ctx) {
    ctx.isAuth = sessionStorage.getItem('authtoken') !== null;
    ctx.user_id = sessionStorage.getItem('user_id');
    ctx.username = sessionStorage.getItem('username');
    ctx.fullName = sessionStorage.getItem('fullName');
  }

  // start the application
  app.run('/#/');
}

main();