function solve(input) {
  let catalog = {
    data: new Map(),
    createLabel(label) {
      if (this.data.has(label))
        return;
      this.data.set(label, [])
      console.log(label)
    },
    print(x) {
      let label = x[0];
      this.createLabel(label);
      let product = x.split(" : ");
      this.data.get(label).push(product);
      console.log('  ' + product.join(': '));
    },
  }
  input
    .sort()
    .forEach(x => {
      catalog.print(x)
    });
}


solve([
  'Appricot : 20.4',
  'Fridge : 1500',
  'TV : 1499',
  'Deodorant : 10',
  'Boiler : 300',
  'Apple : 1.25',
  'Anti-Bug Spray : 15',
  'T-Shirt : 10'
]);