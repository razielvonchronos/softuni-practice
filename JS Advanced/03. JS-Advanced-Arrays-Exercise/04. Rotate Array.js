function solve(params) {
  let array = params.slice(0, -1);
  let times = params.slice(-1);
  for (times;times > 0; times--)
  {
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