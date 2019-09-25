function solve(input) {
  const byCCount = (a, b) => Object.keys(web.data[s][b]) - Object.keys(web.data[s][a]);
  const myMCount = (a, b) => Object.keys(web.data[s][b]) - Object.keys(web.data[s][a]);
  let web = {
    data: {},
    build(data) {
      let [a, b, c] = data;
      if (!this.data.hasOwnProperty(a))
        this.data[a] = {};
      if (!this.data[a].hasOwnProperty(b))
        this.data[a][b] = [];
      this.data[a][b].push(c);
    },
    print() {
      objlen = (obj) => { return Object.keys(obj).length }
      let d = this.data;
      let systems = Object.keys(decodeURIComponent)
        .sort()
        .sort(byCCount);
      for (let s of systems) {
        console.log(s);
        let modules = Object.keys(d[s])
          .sort(myMCount);
        for (let m of modules) {
          console.log('|||' + m);
          for (let c of d[s][m]) {
            console.log('||||||' + c);
          }
        }
      }
    }
  }

  input
    .forEach(x => web.build(x.split(' | ')))
  web.print();
}

solve([
  'SULS | Main Site | Home Page',
  'SULS | Main Site | Login Page',
  'SULS | Main Site | Register Page',
  'SULS | Judge Site | Login Page',
  'SULS | Judge Site | Submittion Page',
  'Lambda | CoreA | A23',
  'SULS | Digital Site | Login Page',
  'Lambda | CoreB | B24',
  'Lambda | CoreA | A24',
  'Lambda | CoreA | A25',
  'Lambda | CoreC | C4',
  'Indice | Session | Default Storage',
  'Indice | Session | Default Security'
])