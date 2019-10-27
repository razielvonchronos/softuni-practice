const assert = require('chai').assert;
const jsdom = require("jsdom");
const { JSDOM } = jsdom;
const MOCHA_HTML = require("../templates/index.js")
const BookUni = require("../scripts/app");



describe("Init tests", () => {
  let dom = new JSDOM('<!DOCTYPE html><html><head></head><body></body></html>');
  global.window = dom.window;
  global.document = dom.window.document;
  beforeEach(() => {
    global.document.body.innerHTML = MOCHA_HTML;
    BookUni();
  });

  it("create new book and move it to old section", () => {
    let inputFields = document.querySelectorAll('form input');
    let formButton = document.querySelector('form button');
    let sections = document.querySelectorAll('section');
    let shelf_old = sections[0].children[1];
    let shelf_new = sections[1].children[1];
    inputFields[0].value = 'The Nickel Boys';
    inputFields[1].value = '2016';
    inputFields[2].value = '19.88';
    formButton.click();
    assert.equal(shelf_new.children.length, 1, 'The elements inside bookShelf in the new books section should be 1');
    //Move to old
    shelf_new.children[0].children[2].click();
    assert.equal(shelf_old.children.length, 1, 'The elements inside bookShelf in the old books section should be 1');
    let actualOldBookStructure = shelf_old.children[0].innerHTML;
    let expectedOldBookStructure = "<p>The Nickel Boys [2016]</p><button>Buy it only for 16.90 BGN</button>";
    assert.equal(actualOldBookStructure, expectedOldBookStructure, "The moved book from new section to old section have invalid structure");
  })
})

