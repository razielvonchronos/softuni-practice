function solve(params) {

  function columns(params) {
    let data = [];
    const cols = params[0].length;
    for (let c = 0; c < cols; c++) {
      let result = params.map((x, i) => x[c]);
      data.push(result);
    }
    return data;
  }

  function sum(data) {
    let result = data.reduce((acc, curr) => acc + curr);
    return result;
  }

  function compare(rows, cols) {
    let init = sum(rows[0]);
    return rows.concat(cols).every((x) => sum(x) === init);
  }

  return compare(params, columns(params));
}

console.log(
  solve(
    [
      [4, 5, 6],
      [6, 5, 4],
      [5, 5, 5]
    ]
  )
)