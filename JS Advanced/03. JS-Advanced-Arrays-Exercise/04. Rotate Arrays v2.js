function solve(params) {
  let array = params.slice(0, -1);
  let times = params.slice(-1);
  while (times > 0) {
    array.unshift(array.pop())
    times--
  }
  return array.join(' ');
}

console.log(
  solve(
    ['Banana', 'Orange', 'Coconut', 'Apple', '15']
  )
)