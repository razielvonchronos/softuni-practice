function solve(input) {

  let db = {};
  class Car {
    constructor(brand, model, amount) {
      this.brand = brand;
      this.model = model;
      this.amount = Number(amount);
    }
  }
  let catalog = {
    brand(car) {
      if (!db.hasOwnProperty(car.brand))
        db[car.brand] = {};
    },
    store(car) {
      if (!db[car.brand].hasOwnProperty(car.model))
        db[car.brand][car.model] = 0;
      db[car.brand][car.model] += car.amount
    },
    handle(data) {
      let [brand, model, amount] = data;
      let car = new Car(brand, model, amount);
      this.brand(car);
      this.store(car);
      return this;
    },
    log() {
      6
      for (let b in db) {
        console.log(b);
        for (let m in db[b])
          console.log('###' + m, '->', db[b][m]);
      }
    }

  };

  input
    .forEach(e => {
      catalog.handle(e.split(' | '));
    });
  catalog.log()
}

solve(['Audi | Q7 | 1000',
  'Audi | Q6 | 100',
  'BMW | X5 | 1000',
  'BMW | X6 | 100',
  'Citroen | C4 | 123',
  'Volga | GAZ-24 | 1000000',
  'Lada | Niva | 1000000',
  'Lada | Jigula | 1000000',
  'Citroen | C4 | 22',
  'Citroen | C5 | 10']);