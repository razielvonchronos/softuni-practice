

function solve(input) {
  const engines = [
    { power: 90, volume: 1800 },
    { power: 120, volume: 2400 },
    { power: 200, volume: 3500 }
  ];
  const carriages = [
    { type: 'hatchback', color: input.color },
    { type: 'coupe', color: input.color }
  ];

  let car = {
    model: input.model,
    engine: engines.find((x) => x.power >= input.power),
    carriage: carriages.find((x) => x.type === input.carriage),
    wheels: Array(4).fill(input.wheelsize % 2 === 0 ? input.wheelsize - 1 : input.wheelsize),
  }

  return car;
}

let input = {
  model: 'Opel Vectra',
  power: 110,
  color: 'grey',
  carriage: 'coupe',
  wheelsize: 17
};

let expected = {
  model: 'Opel Vectra',
  engine: {
    power: 120,
    volume: 2400
  },
  carriage: {
    type: 'coupe',
    color: 'grey'
  },
  wheels: [17, 17, 17, 17]
};


let car = solve(input);

console.log(car);