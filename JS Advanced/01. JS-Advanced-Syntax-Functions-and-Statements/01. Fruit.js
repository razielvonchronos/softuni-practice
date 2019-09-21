

function solve(fruit, grams, price) {
    let kilos = grams / 1000;
    let cost = kilos * price;

    console.log(`I need $${cost.toFixed(2)} to buy ${kilos.toFixed(2)} kilograms ${fruit}.`);
}
