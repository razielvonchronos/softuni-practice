
import { get, post, put, del } from "./requester.js";
import { showNotification } from "./helpers.js";

function toggleLoading() {
  let loadingBox = document.getElementById('loadingBox');
  loadingBox.style.display = 'block' ? 'block' : 'none';
}

function main() {

  let app = Sammy('#app', function () {

    this.use('Handlebars', 'hbs');
    this.get('/', function (ctx) {
      setHeaderInfo(ctx);
      findAll().then(res => {
        ctx.treks_data = res
        this.loadPartials(getPartials({}))
          .partial('../views/home.hbs');
      });
    });

    this.get('/register', function (ctx) {
      this.loadPartials(getPartials())
        .partial('../views/register.hbs')
    })

    this.post('/register', function (ctx) {
      const { username, password, rePassword } = ctx.params;
      if (username.length < 3) {
        showNotification('error', 'The username should be at least 3 characters long')
      }
      else if (password.length < 6) {
        showNotification('error', 'The password should be at least 6 characters long')

      }
      else if (password !== rePassword) {
        showNotification('error', 'The repeat password should be equal to the password');
      } else {
        post('user', '', { username, password }, 'Basic')
          .then(userInfo => {
            saveAuth(userInfo)
            ctx.redirect('/');
            showNotification('success', 'Successfully registered user.');
          }).catch(e => console.log(e))
      }
    })

    this.get('/login', function (ctx) {
      this.loadPartials(getPartials())
        .partial('../views/login.hbs')
    })

    this.post('/login', function (ctx) {
      const { username, password } = ctx.params;
      if (username, password) {
        post('user', 'login', { username, password }, 'Basic')
          .then(userInfo => {
            saveAuth(userInfo)
            showNotification('success', 'Successfully logged user.');
            redirect(ctx, '/', 2000);
          }).catch(e => console.log(e))
      }
    })
    this.get('/logout', function (ctx) {
      post('user', '_logout', {}, 'Kinvey').then(res => {
        sessionStorage.clear();
        showNotification('success', 'Successfully logged out.');
        redirect(ctx, '/', 2000);
      })
    })

    this.get('/create', function (ctx) {
      setHeaderInfo(ctx);
      this.loadPartials(getPartials())
        .partial('../views/create.hbs');
    })

    this.post('/create', function (ctx) {
      ctx.params.organizer = sessionStorage.getItem('username');
      ctx.params.likes = 0;
      const { location, dateTime, description, imageURL, likes, organizer } = ctx.params;

      if (location.length < 6) {
        showNotification('error', 'The trek name should be at least 6 characters long')
      }
      else if (description.length < 10) {
        showNotification('error', 'The description should be at least 10 characters long')

      } else {
        post('appdata', 'treks', { location, date: dateTime, description, image: imageURL, likes, organizer }, 'Kinvey')
          .then(res => {
            console.log(res);
            showNotification('success', 'Trek created successfully.');
            redirect(ctx, '/', 2000);
          }).catch(e => console.log(e))
      }
    })

    this.get('/details/:id', function (ctx) {
      setHeaderInfo(ctx);
      findOne(ctx.params.id).then(res => {
        ctx.trek_data = res;
        ctx.isCreator = res.organizer === ctx.username
        this.loadPartials(getPartials({}))
          .partial('../views/details.hbs');
      });
    })

    this.get('/edit/:id', function (ctx) {
      setHeaderInfo(ctx);
      findOne(ctx.params.id).then(res => {
        ctx.trek_data = res;
        console.log(res)
        this.loadPartials(getPartials({}))
          .partial('../views/edit.hbs');
      });
    })

    this.post('/edit/:id', function (ctx) {
      let { location, dateTime, description, imageURL, organizer, likes } = ctx.params;
      put('appdata', `treks/${ctx.params.id}`, {
        location,
        date: dateTime,
        description,
        image: imageURL,
        organizer,
        likes
      }, 'Kinvey')
      findOne(ctx.params.id).then(res => {
        ctx.trek_data = res;
        showNotification('success', "Trek edited successfully");
        redirect(ctx, '/', 2000);
        this.loadPartials(getPartials({}))
          .partial('../views/edit.hbs');
      });
    })

    this.get('/like/:id', function (ctx) {
      setHeaderInfo(ctx);
      findOne(ctx.params.id).then(res => {
        ctx.trek_data = res;
        console.log(res)
        this.loadPartials(getPartials({}))
          .partial('../views/edit.hbs');
      });
    })
  });

  function getPartials(additional) {
    return {
      header: '../views/common/header.hbs',
      footer: '../views/common/footer.hbs',
      treks: '../views/components/treks.hbs'
    }
  }

  function saveAuth(userInfo) {
    sessionStorage.setItem('authtoken', userInfo._kmd.authtoken)
    sessionStorage.setItem('username', userInfo.username);
  }

  function setHeaderInfo(ctx) {
    ctx.isAuth = sessionStorage.getItem('authtoken') !== null;
    ctx.username = sessionStorage.getItem('username');
  }

  function findAll(ctx) {
    return get('appdata', 'treks', {}, 'Kinvey');
  }

  function findOne(id) {
    return get('appdata', `treks/${id}`, {}, 'Kinvey');
  }

  function redirect(context, path, ms) {
    setTimeout(() => {
      context.redirect(path)
    }, ms)
  }

  // start the application
  app.run();
}

main();