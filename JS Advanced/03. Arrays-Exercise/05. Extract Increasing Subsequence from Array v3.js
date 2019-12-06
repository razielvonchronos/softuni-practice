function solve(params) {
  let result = params.slice(0, 1);
  for (let i = 1; i < params.length; i++)
    if (params[i] >= Math.max(...result))
      result.push(params[i])
  return result.join('\n');
}

console.log(
  solve(
    [1, 3, 8, 4, 10, 12, 3, 2, 24]
  )
)