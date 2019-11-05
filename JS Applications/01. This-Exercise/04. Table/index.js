function solve() {
   let trs = Array.from(document.getElementsByTagName('tbody')[0].children);
   trs.forEach(x => {
      x.addEventListener('click', (e) => {
         let parent = e.target.parentNode;
         if (parent.hasAttribute('style')) {
            parent.removeAttribute('style')
         }
         else {
            parent.style.backgroundColor = '#413f5e';
         }
         trs.forEach(el => {
            if (parent !== el) {
               el.removeAttribute('style');
            }
         });
      })
   })
   // test();
}

function test() {
   assert = {
      equal: (a, b, z) => {
         if (a !== b) {
            throw new Error(`\n${a}\nto be\n${b}\n ${z}`)
         }
      }
   }
   let color = "rgb(65, 63, 94)";
   let tds = document.querySelectorAll('td');
   tds[3].click();
   assert.equal(tds[3].parentNode.style.backgroundColor, color, "1");
   tds[3].click();
   assert.equal(tds[3].parentElement.style.backgroundColor, "", "2");
   tds[6].click();
   assert.equal(tds[6].parentElement.style.backgroundColor, color, "3");
   tds[2].click();
   assert.equal(tds[2].parentElement.style.backgroundColor, color, "4");
   assert.equal(tds[6].parentElement.style.backgroundColor, "", "5");
}