"use strict"
let solution = {
  // add: (...vec) => [vec[0][0] + vec[1][0], vec[0][1] + vec[1][1]],
  add: (...vec) => vec.reduce((acc, row, i) => {
    let sum;
    sum = vec.map(x => x[i]).reduce((x, y) => x + y);
    acc.push(sum);
    return acc;
  }, []),
  multiply: (vec, multiplier) => vec.map(el => el * multiplier),
  length: (vec) => vec.reduce((x, y) => Math.sqrt(Math.pow(x, 2) + Math.pow(y, 2))),
  dot: (...vec) => vec.reduce((acc, curr, i) => {
    let result = vec.map(x => x[i]).reduce((x, y) => x * y)
    acc.push(result);
    return acc;
  }, []).reduce((a, b) => a + b),
  cross: (...vec) => [vec[0][0] * vec[1][1], vec[0][1] * vec[1][0]].reduce((a, b) => a - b) // too lazy to do it with reduce
}

// console.log(solution.add([2, 1], [3, 2]))
// console.log(solution.multiply([3.5, -2], 2))
// console.log(solution.length([3, -4]))
console.log(solution.dot([2, 3], [2, -1]))
// console.log(solution.cross([3, 7], [1, 0]))