function solve(input) {
  let sequences = {
    data: [],
    add(input) {
      function sum(target) {
        return target.reduce((p, c) => p + c, 0)
      }
      let a = sum(input)
      if (!this.data.some(e => sum(e) == a))
        this.data.push(input.sort((a, b) => b - a));
    },
    print() {
      let data = this.data
        .sort((a, b) => a.length - b.length);
      data.forEach(e => console.log(`[${e.join(', ')}]`))
    }
  };

  input
    .forEach(e => sequences.add(JSON.parse(e)))
  sequences.print();
}

solve([
  "[7.14, 7.180, 7.339, 80.099]",
  "[7.339, 80.0990, 7.140000, 7.18]",
  "[7.339, 7.180, 7.14, 80.099]"
]);