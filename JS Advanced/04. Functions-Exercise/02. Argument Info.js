function solve(params) {
  let args = {};
  for (arg of arguments) {
    let type = typeof (arg);
    console.log(`${type}: ${arg}`)
    args.hasOwnProperty(type) ? args[type]++ : args[type] = 1;
  }
  Object.keys(args).sort((a, b) => args[b] - args[a]).map(x => console.log(`${x} = ${args[x]}`))
}

solve(
  'cat',
  42,
  function () { console.log('Hello world!') }
);