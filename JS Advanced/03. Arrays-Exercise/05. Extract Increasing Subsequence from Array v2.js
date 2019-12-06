function solve(params) {
  let result = params.slice(0, 1);
  params.map(e => {
    if (e >= Math.max(...result))
      result.push(e);
  })
  return result.slice(1).join('\n');
}

console.log(
  solve(
    [1, 3, 8, 4, 10, 12, 3, 2, 24]
  )
)