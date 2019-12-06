function solve(params) {
  let array = params.slice(0, -1);
  let i = params.slice(-1).pop();
  i %= array.length;
  for (i; 0 < i; i--) {
    let x = array.pop();
    array.unshift(x)
  }
  return array.join(' ');
}

console.log(
  solve(
    ['1', '2', '3', '4', '2']
  )
)