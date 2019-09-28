function solve(params) {
  let n = Number(params.pop());
  let result = [];
  for (let i = 1; i <= params.length; i += n)
    result.push(params[i - 1])

  return result.join('\n');
}

console.log(solve(['5', '20', '31', '4', '20', '2']))