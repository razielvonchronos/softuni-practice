"use strict"

function solution() {
  let stock = {
    protein: 0,
    carbohydrate: 0,
    fat: 0,
    flavour: 0
  }

  let recipes = {
    apple: {
      carbohydrate: 1,
      flavour: 2
    },
    lemonade: {
      carbohydrate: 10,
      flavour: 20
    },
    burger: {
      carbohydrate: 5,
      fat: 7,
      flavour: 3
    },
    eggs: {
      protein: 5,
      fat: 1,
      flavour: 1
    },
    turkey: {
      protein: 10,
      carbohydrate: 10,
      fat: 10,
      flavour: 10
    }
  }

  let robot = {
    restock: (x, y) => {
      stock[x] += Number(y)
      return 'Success';
    },
    handlePrepare(recipe, c) {
      let ingredients = Object.keys(recipe);
      ingredients.map(x => stock[x] -= recipe[x] * c)
      return 'Success'
    },
    prepare(r, c) {
      let recipe = recipes[r];
      let ingredients = Object.keys(recipe);
      let enough = ingredients.filter(x => !stock.hasOwnProperty(x) || stock[x] < recipe[x] * c)
      return enough.length === 0 ? this.handlePrepare(recipe, c) : `Error: not enough ${enough.slice(0, 1)} in stock`;
    },
    report: () => Object.keys(stock).reduce((acc, curr) => {
      acc.push(`${curr}=${stock[curr]}`)
      return acc;
    }, []).join(' '),
  }

  return (input) => {
    let fragments = input.split(' ');
    let cmd = fragments[0]
    let params = fragments.slice(1)
    return robot[cmd](...params);
  }
}

let manager = solution();

let input = [
  // "restock carbohydrate 10",
  // "restock flavour 10",
  // "prepare apple 1",
  // "restock fat 10",
  // "prepare burger 1",
  // "report",
  'prepare turkey 1',
  'restock protein 10',
  'prepare turkey 1',
  'restock carbohydrate 10',
  'prepare turkey 1',
  'restock fat 10',
  'prepare turkey 1',
  'restock flavour 10',
  'prepare turkey 1',
  'report'
]
input.forEach(e =>
  console.log(manager(e)
  ))