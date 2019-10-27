function solve() {
   let el = {
      sections: {
         available: document.getElementsByTagName('section')[0],
         myproducts: document.getElementsByTagName('section')[1],
      }
   }

   function getProductName(element) {
      return element.querySelector('span').textContent;
   }
   function getProductPrice(element) {
      return element.querySelector('strong').textContent;
   }
   function decreaseQuantity(element) {
      let quantity = element.querySelector('strong');
      let regex = /[\d.]+/gm;
      let new_quantity = (x) => {
         let a = Number(x - 1);
         if (a < 1)
            element.remove()
         return a;
      };
      let replacement = quantity.textContent.replace(regex, new_quantity)
      quantity.textContent = replacement;
   }

   function buildButton(text, fn) {
      let button = document.createElement('button');
      button.textContent = text;
      if (fn)
         button.addEventListener('click', fn)
      return button;
   }

   function buildProduct(name, quantity, price) {
      let li = document.createElement('li');
      let span = document.createElement('span');
      span.textContent = name.value;
      let strong = document.createElement('strong');
      strong.textContent = `Available: ${Number(quantity.value)}`
      let div = document.createElement('div');
      let strong2 = document.createElement('strong');
      strong2.textContent = Number(price.value).toFixed(2);
      let button = buildButton("Add to Client's List", handleAddToClient);
      [strong2, button].forEach(x => div.appendChild(x));
      [span, strong, div].forEach(x => li.appendChild(x));
      return li;
   }
   function handleAdd(e) {
      console.log("Trigger HandleAdd");
      e.preventDefault();
      let [name, quantity, price] = document.getElementById('add-new').getElementsByTagName('input');
      let productHTML = buildProduct(name, quantity, price);
      el.sections.available.querySelector('ul').appendChild(productHTML);
   }

   function handleAddToClient(e) {
      console.log("Trigger handleAddToClient");
      e.preventDefault();
      let parent = e.target.parentElement;
      let grandparent = e.target.parentElement.parentElement;
      let name = getProductName(grandparent);
      let price = document.createElement('strong');
      price.textContent = getProductPrice(parent);
      let li = document.createElement('li');
      li.textContent = name;
      li.appendChild(price);
      el.sections.myproducts.querySelector('ul').appendChild(li);
      decreaseQuantity(grandparent);
      let total_price = document.getElementsByTagName('h1')[1];
      let regex = /[\d.]+/gm;
      let add_price = Number(price.textContent.match(regex)[0]);
      let new_price = total_price.textContent.replace(regex, (x) => (Number(x) + add_price).toFixed(2))
      total_price.textContent = new_price;

   }

   function handleFilter(e) {
      console.log("Trigger handleFilter");
      e.preventDefault();
      let keyword = document.querySelector('#products .filter input').value;
      el.sections.available.querySelectorAll('ul li').forEach(e => {
         let name = e.querySelector('span').textContent;
         e.style.display = (!keyword || name === keyword) ? 'block' : 'none';
      });
   }

   function handleBuy(e) {
      e.preventDefault();
      let parent = e.target.parentElement;
      parent.querySelector('ul').textContent = '';
      let total_price = document.getElementsByTagName('h1')[1];
      let regex = /[\d.]+/gm;
      let new_price = total_price.textContent.replace(regex, "0.00");
      total_price.textContent = new_price;
   }
   function init() {
      console.log("Launched");
      let submit = document.querySelector('#add-new button');
      submit.addEventListener("click", handleAdd);
      let filter = document.querySelector('#products .filter button');
      filter.addEventListener("click", handleFilter);
      let buy = document.querySelector('#myProducts button');
      buy.addEventListener("click", handleBuy);
   }
   init();
}

function test() {
   let [name, quantity, price] = document.querySelector('#add-new').getElementsByTagName('input');
   name.value = "test";
   quantity.value = 5;
   price.value = 3.5;
   let submit = document.querySelector('#add-new button');
   submit.click();

   // let keyword = document.querySelector('#products .filter input');
   // keyword.value = "te";
   // let filter = document.querySelector('#products .filter button');
   // filter.click()

}
