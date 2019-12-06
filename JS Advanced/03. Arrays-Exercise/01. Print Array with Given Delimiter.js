function solve(params) {
  return params.join(params.pop());
}

console.log(
  solve([
    'One',
    'Two',
    'Three',
    'Four',
    'Five',
    '-'
  ])
)