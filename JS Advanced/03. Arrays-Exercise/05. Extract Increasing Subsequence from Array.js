function solve(params) {
  /**
   * Watched Mihaela's video cuz I have no idea how does Reduce work
   * TODO: make a second version with filter and 3rd version with map
   */
  // let sequence = params.slice(0, 1);
  let result = params.reduce((acc, curr, i, arr) => {
    if (curr >= Math.max(...acc)) {
      acc.push(curr)
    }
    return acc;
  }, []);
  return result;
}

console.log(
  solve(
    [1, 3, 8, 4, 10, 12, 3, 2, 24]
  )
)