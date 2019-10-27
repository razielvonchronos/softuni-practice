const MOCHA_HTML = `
<h1>Book Store</h1>
    <form>
        <label for="book">Book</label>
        <input type="text" placeholder="Add Title" />

        <label for="year">Year</label>
        <input type="number" placeholder="Add Year" />

        <label for="price">Price</label>
        <input type="number" placeholder="Add Price" min="0" />

        <button>Add new book</button>
    </form>
    <h1>Total Store Profit: 0 BGN</h1>
    <div id="outputs">
        <section>
            <h2>Old Books</h2>
            <div class="bookShelf"></div>
        </section>
        <section>
            <h2>New Books</h2>
            <div class="bookShelf"></div>
        </section>
    </div>
`;
module.exports = MOCHA_HTML;