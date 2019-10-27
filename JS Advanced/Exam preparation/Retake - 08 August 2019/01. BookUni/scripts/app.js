function solve() {
    const price_regex = /[\d.]+/gm;
    function setDiscount(x) {
        return (Number(x) - (x * 15 / 100)).toFixed(2)
    }
    function addProfit(x, y) {
        return (Number(x) + Number(y)).toFixed(2)
    }

    let el = {
        profit: document.querySelectorAll('h1')[1],
        inputs: document.querySelectorAll('form input'),
        SectionOld: document.querySelectorAll('section')[0].children[1],
        SectioNew: document.querySelectorAll('section')[1].children[1],
    }

    function buildButton(text, fn) {
        let button = document.createElement('button');
        button.textContent = text;
        if (fn)
            button.addEventListener('click', fn)
        return button;
    }

    function buildBookHTML(data) {
        let div = document.createElement('div');
        div.className = 'book';
        let p = document.createElement('p');
        p.textContent = `${data[0]} [${data[1]}]`;
        let btn_buy = buildButton(`Buy it only for ${data[2]} BGN`, buyBook);
        [p, btn_buy].map(x => div.appendChild(x));
        if (el.inputs[1].value >= 2000)
            div.appendChild(buildButton("Move to old section", ArchiveBook))
        return div;
    }

    function buildBook(e) {
        e.preventDefault();
        if (!el.inputs[0])
            throw new Error("Please enter a valid name")
        if (Number(el.inputs[1].value) < 1 || Number(el.inputs[2].value) < 1) {
            throw new Error("Please enter a valid price")
        }
        let bookHTML = buildBookHTML([
            el.inputs[0].value,
            Number(el.inputs[1].value),
            Number(el.inputs[2].value).toFixed(2),
        ]);
        let shelf = el.inputs[1].value >= 2000 ? el.SectioNew : el.SectionOld;
        shelf.appendChild(bookHTML);
        el.inputs.forEach(x => x.value = '');
    };
    function ArchiveBook(e) {
        e.preventDefault();
        let parent = e.target.parentElement;
        let buttons = parent.querySelectorAll('button');
        let replacement = buttons[0].textContent.replace(price_regex, setDiscount)
        buttons[0].textContent = replacement;
        el.SectionOld.appendChild(parent);
        buttons[1].remove();
    };
    function buyBook(e) {
        e.preventDefault();
        let parent = e.target.parentElement;
        let buttons = parent.querySelectorAll('button');
        let price = buttons[0].textContent.match(price_regex)[0]
        let new_profit = el.profit.innerHTML.replace(price_regex, (x) => addProfit(x, price));
        el.profit.innerHTML = new_profit;
        parent.remove();
    }

    function init() {
        let btn_submit = document.querySelector('form button');
        btn_submit.addEventListener('click', buildBook);
    }
    init();
}

const BookUni = solve;
module.exports = BookUni;