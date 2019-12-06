import { get, post, put, del } from "../scripts/requester.js";

function main() {
    let app = Sammy('#rooter', function () {
        this.use('Handlebars', 'hbs');

        this.get('/', function (ctx) {
            setHeaderInfo(ctx);
            this.loadPartials(getPartials())
                .partial('./views/home.hbs');
        });

        this.get('/register', function (ctx) {
            this.loadPartials(getPartials())
                .partial('./views/auth/register.hbs')
        })

        this.post('/register', function (ctx) {
            const { firstName, lastName, username, password, repeatPassword } = ctx.params;
            if (firstName && lastName && username && password && password === repeatPassword) {
                post('user', '', { firstName, lastName, username, password }, 'Basic')
                    .then(userInfo => {
                        saveAuth(userInfo)
                        ctx.redirect('/');
                    }).catch(console.error)
            }
        })

        this.get('/login', function (ctx) {
            this.loadPartials(getPartials())
                .partial('./views/auth/login.hbs')
        })

        this.post('/login', function (ctx) {
            const { username, password } = ctx.params;
            if (username, password) {
                post('user', 'login', { username, password }, 'Basic')
                    .then(userInfo => {
                        saveAuth(userInfo)
                        ctx.redirect('/');
                    }).catch(console.error)
            }
        })
        this.get('/logout', function (ctx) {
            post('user', '_logout', {}, 'Kinvey').then(res => {
                sessionStorage.clear();
                ctx.redirect('/');
            })
        })

        this.get('/share', function(ctx){
            setHeaderInfo(ctx);
            this.loadPartials(getPartials())
                .partial('./views/share.hbs');
        })
    });


    function getPartials() {
        return {
            header: './views/common/header.hbs',
            footer: './views/common/footer.hbs'
        }
    }

    function setHeaderInfo(ctx) {
        console.log(ctx)
        ctx.isAuth = sessionStorage.getItem('authtoken') !== null;
        ctx.fullName = sessionStorage.getItem('fullName');
    }

    function saveAuth(userInfo) {
        sessionStorage.setItem('authtoken', userInfo._kmd.authtoken)
        sessionStorage.setItem('fullName', `${userInfo.firstName} ${userInfo.lastName}`);
    }
    // start the application
    app.run();
}

main();