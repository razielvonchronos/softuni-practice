function solve(array, order) {
  let cmp = {
    asc: (a,b) => a - b,
    desc: (a,b) => b - a,
  }
  return array.sort(cmp[order])
}

console.log(solve(
  [14, 7, 17, 6, 8], 'asc'
))