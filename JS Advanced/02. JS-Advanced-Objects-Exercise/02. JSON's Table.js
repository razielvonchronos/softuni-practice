
function solve(input) {
  let json = input
    .map(arr => JSON.parse(arr));
  render = (data) => {
    let row = "";
    row += "	<tr>\n";
    row += "		<td>" + data.name + "</td>\n";
    row += "		<td>" + data.position + "</td>\n";
    row += "		<td>" + data.salary + "</td>\n";
    row += "	</tr>"
    console.log(row);
  }
  console.log('<table>');
  json.map(data => render(data))
  console.log('</table>');
}

solve([
  '{"name":"Pesho","position":"Promenliva","salary":100000}',
  '{"name":"Teo","position":"Lecturer","salary":1000}',
  '{"name":"Georgi","position":"Lecturer","salary":1000}'
]);