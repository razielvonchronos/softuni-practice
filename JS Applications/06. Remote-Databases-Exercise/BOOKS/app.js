
import { kinvey } from './kinvey.js'

const table_body = document.querySelector('table tbody');

async function listAllBooks() {
  let books = await kinvey.books.find.all();
  console.log(books);
  // setState({ books: response });
  books.forEach(e => {
    let tr = document.createElement("tr");
    tr.innerHTML = `<td>${e.title}</td`;
    tr.innerHTML += `<td>${e.author}</td`;
    tr.innerHTML += `<td>${e.isbn}</td`;

    let buttonTD = document.createElement('td');
    let btnEdit = document.createElement("button");
    btnEdit.textContent = "Edit";
    let btnDelete = document.createElement("button");
    btnDelete.textContent = "Delete";
    buttonTD.appendChild(btnEdit);
    buttonTD.appendChild(btnDelete);
    tr.appendChild(buttonTD);
    table_body.appendChild(tr);
  });
}

function createBook(e) {
  e.preventDefault();
  let inputs = document.querySelectorAll('#title, #author, #isbn');
  let data = {
    title: inputs[0].value,
    author: inputs[1].value,
    isbn: inputs[2].value,
  }
  kinvey.books.create(data).then(console.log).catch(console.log);
  inputs.forEach(x => x.value = "")
}

const btnLoadAll = document.getElementById('loadBooks');
btnLoadAll.addEventListener('click', listAllBooks);

let form = document.querySelector('form');
form.addEventListener("submit", createBook)
