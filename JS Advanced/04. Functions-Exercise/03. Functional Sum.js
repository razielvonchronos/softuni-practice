
let add = (() => {
  let sum = 0;
  return function add(x) {
    sum += x;
    add.toString = () => sum;
    return add;
  }
})()

console.log(
  add(1)(6)(-3)(1)
)