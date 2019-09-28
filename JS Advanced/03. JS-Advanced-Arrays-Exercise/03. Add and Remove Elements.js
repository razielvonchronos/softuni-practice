function solve(params) {
  let init = 1;
  let fragmets = [];
  let actions = {
    add() {
      fragmets.push(init);
      init++;
    },
    remove() {
      fragmets.pop();
      init++;
    },
  }
  params.map(x => actions[x]())
  return fragmets.join('\n') || "Empty";
}

console.log(
  solve(
    ['add',
      'add',
      'remove',
      'add',
      'add']
  )
)