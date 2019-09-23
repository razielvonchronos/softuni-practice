function solve(input) {
  let fruits = {};
  let inventory = {};

  let fruit = {
    fruit: null,
    amount: null,
    set(data) {
      this.fruit = data[0];
      this.amount = Number(data[1]);
      return this;
    },
    isEnough() {
      return fruits[this.fruit] >= 1000;
    },
    collect() {
      fruits.hasOwnProperty(this.fruit) ? fruits[this.fruit] += this.amount : fruits[this.fruit] = this.amount;
      if (this.isEnough())
        this.bottle()
      return this;
    },
    bottle() {
      if (!inventory.hasOwnProperty(this.fruit))
        inventory[this.fruit] = 0;
      inventory[this.fruit] += Math.floor(fruits[this.fruit] / 1000);
      fruits[this.fruit] %= 1000;
    },
  }
  input
    .map(x => { return x.split(' => ') })
    .map(data => {
      fruit
        .set(data)
        .collect();
    });
  for (let [key, value] of Object.entries(inventory))
    console.log(`${key} => ${value}`);
}

solve([
  'Orange => 2000',
  'Peach => 1432',
  'Banana => 450',
  'Peach => 600',
  'Strawberry => 549'
])

// solve([
//   'Kiwi => 234',
//   'Pear => 2345',
//   'Watermelon => 3456',
//   'Kiwi => 4567',
//   'Pear => 5678',
//   'Watermelon => 6789'
// ])
