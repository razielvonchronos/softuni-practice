function solve(input) {

  let web = {
    data: {},
    addSystem(a) {
      if (!this.data.hasOwnProperty(a))
        this.data[a] = {};
      return this;
    },
    addModule(a, b) {
      if (!this.data[a].hasOwnProperty(b))
        this.data[a][b] = [];
      return this;
    },
    addComponent(a, b, c) {
      this.data[a][b].push(c);
      return this;
    },
    build(data) {
      let [a, b, c] = data;
      this
        .addSystem(a)
        .addModule(a, b)
        .addComponent(a, b, c);
    },
    print() {
      objlen = (obj) => { return Object.keys(obj).length }
      let data = this.data;
      let systems = Object.keys(data)
        .sort()
        .sort((a, b) => objlen(data[b]) - objlen(data[a]));
      for (let s of systems) {
        console.log(s);
        let modules = Object.keys(data[s])
          .sort((a, b) => objlen(data[s][b]) - objlen(data[s][a]));
        for (let m of modules) {
          console.log('|||' + m);
          for (let c of data[s][m]) {
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