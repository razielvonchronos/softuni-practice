function solve(input) {
  let sequences = {
    data: new Set(),
    transform(input) {
      let result = input
        .map(e => JSON.parse(e).sort((a, b) => b - a))
        .sort((a, b) => a.length - b.length)
      result.forEach(e => this.data.add(e.join(', ')))
    },
    print() {
      for (let item of this.data.values())
        console.log(`[${item}]`);
    }
  };
  sequences.transform(input);
  sequences.print();
}

solve([
  "[7.14, 7.180, 7.339, 80.099]",
  "[7.339, 80.0990, 7.140000, 7.18]",
  "[7.339, 7.180, 7.14, 80.099]"
]);