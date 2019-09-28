function solve(params) {
  let array = params.slice(0, -1);
  let times = +params.slice(-1);
  times = ~~times % array.length;
  while (times > 0) {
    array.unshift(array.pop());
    times--;
  }
  return array.join(' ');
}

console.log(
  solve(
    ['Banana', 'Orange', 'Coconut', 'Apple', '15.5']
  )
)