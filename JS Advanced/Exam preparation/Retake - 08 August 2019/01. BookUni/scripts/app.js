
function solve() {
    function init() {
        el.input.submit.addEventListener('click', Handlers.buildBook);
    }
    const price_regex = /[\d.]+/gm;
    function setDiscount(x) {
        return (Number(x) - (x * 15 / 100)).toFixed(2)
    }
    function addProfit(x, y) {
        return (Number(x) + Number(y)).toFixed(2)
    }
    let el = {
        profit: document.querySelectorAll('h1')[1],
        input: {
            fields: document.querySelectorAll('form input'),
            submit: document.querySelector('form button'),
        },
        output: {
            old: document.querySelectorAll('div.bookShelf')[0],
            new: document.querySelectorAll('div.bookShelf')[1],
        }
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
        p.innerText = `${data[0]} [${data[1]}]`;
        let btn_buy = buildButton(`Buy it only for ${data[2]} BGN`, Handlers.buyBook);
        [p, btn_buy].map(x => div.appendChild(x));
        if (el.input.fields[1].value >= 2000)
            div.appendChild(buildButton("Move to old section", Handlers.ArchiveBook))
        return div;
    }

    let Handlers = {
        buildBook(e) {
            e.preventDefault();
            if (!el.input.fields[0].value.length) {
                throw new Error("Please enter a title")
            }
            if (Number(el.input.fields[1].value) < 0 || Number(el.input.fields[2].value) < 0) {
                throw new Error("Please enter a valid price")
            }
            let bookHTML = buildBookHTML([
                el.input.fields[0].value,
                Number(el.input.fields[1].value),
                Number(el.input.fields[2].value).toFixed(2),
            ]);
            let shelf = el.input.fields[1].value >= 2000 ? el.output.new : el.output.old;
            el.input.fields.forEach(x => x.value = '');
            shelf.appendChild(bookHTML);
        },
        ArchiveBook(e) {
            e.preventDefault();
            let parent = e.target.parentElement;
            let buttons = parent.querySelectorAll('button');
            let replacement = buttons[0].innerText.replace(price_regex, setDiscount)
            buttons[0].innerText = replacement;
            el.output.old.appendChild(parent);
            buttons[1].remove();
        },
        buyBook(e) {
            e.preventDefault();
            let parent = e.target.parentElement;
            let buttons = parent.querySelectorAll('button');
            let price = buttons[0].innerText.match(price_regex)[0]
            let new_profit = el.profit.innerHTML.replace(price_regex, (x) => addProfit(x, price));
            el.profit.innerHTML = new_profit;
            parent.remove();
        }
    }
    init();
}

function test() {
    let assert = {
        equal: (x, y) => {
            if (x != y) {
                console.log(x);
                console.log('expected to be');
                console.log(y);
                console.log('\n');
            }
        }
    }
    solve();
    let inputFields = document.querySelectorAll('form input');
    let formButton = document.querySelector('form button');
    let sections = document.querySelectorAll('section');
    inputFields[0].value = 'The Nickel Boys';
    inputFields[1].value = '2016';
    inputFields[2].value = '20';
    formButton.click();
    let newSectionChilds = sections[1].children;
    let newBookChilds = newSectionChilds[1].children[0].children;
    //Move to old
    newBookChilds[2].click();
    let oldSectionChilds = sections[0].children;
    assert.equal(oldSectionChilds[1].children.length, 1, 'The elements inside bookShelf in the old books section should be 1');
    let actualOldBookStructure = oldSectionChilds[1].children[0].innerHTML;
    let expectedOldBookStructure = "<p>The Nickel Boys [2016]</p><button>Buy it only for 16.90 BGN</button>";
    assert.equal(actualOldBookStructure, expectedOldBookStructure, "The moved book from new section to old section have invalid structure");
}

test();