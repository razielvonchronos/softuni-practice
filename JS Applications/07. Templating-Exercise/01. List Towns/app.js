

let root = document.getElementById('root');

document.getElementById('btnLoadTowns')
    .addEventListener('click', async function (e) {
        e.preventDefault();
        const towns = document.getElementById('towns').value.split(", ");
        const source = await fetch('http://127.0.0.1:5500/templates/towns.hbs')
            .then(res => res.text());
        const template = Handlebars.compile(source);
        const context = { towns };
        const html = template(context);
        root.innerHTML = html;
    });