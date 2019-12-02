
import { kinvey } from './kinvey.js'

const table_body = document.querySelector('table tbody');

async function listAllBooks() {
  let books = await kinvey.books.find.all();
  console.log(books);
  // setState({ books: response });
  books.forEach(e => {
    let tr = document.createElement('tr');
    tr.innerHTML = `<td>${e.title}</td`;
    tr.innerHTML += `<td>${e.author}</td`;
    tr.innerHTML += `<td>${e.isbn}</td`;
    table_body.appendChild(tr);
  });
}

const btnLoadAll = document.getElementById('loadBooks');
btnLoadAll.addEventListener('click', listAllBooks);
btnLoadAll.click()