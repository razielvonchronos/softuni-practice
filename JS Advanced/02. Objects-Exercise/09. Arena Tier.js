function solve(input) {
  let storage = {};

  let gladiator = {
    init(data) {
      let [name, tech, points] = data;
      if (!storage.hasOwnProperty(name))
        storage[name] = {};
      if (!storage[name].hasOwnProperty(tech))
        storage[name][tech] = 0;
      if (storage[name][tech] < points)
        storage[name][tech] = Number(points);
    },
    exist(x, y) {
      return storage.hasOwnProperty(x) && storage.hasOwnProperty(y);
    },
    CommonSkills(x, y) {
      return gladiator.exist(x, y) ?
        Object.keys(storage[x]).filter(e => storage[y].hasOwnProperty(e)) :
        false;
    },
    skillPoints(x) {
      return Object.values(storage[x]).reduce((a, b) => a + b);
    }
  }

  let duel = {
    init(data) {
      let [x, y] = data.split(' vs ');
      y ? this.fight(x, y) : this.exit();
    },
    fight(x, y) {
      let result = gladiator.CommonSkills(x, y)
      if (!result.length > 0)
        return;
      let a = gladiator.skillPoints(x);
      let b = gladiator.skillPoints(y);
      // console.log(`Duel Start ${x} - ${a} vs ${y} - ${b}`);
      if (a > b)
        delete storage[y];
      else if (a < b)
        delete storage[x];
      else
        return // draw
    },
    exit() {
      // console.log(`Duels ended`);
      let gladiators = Object.keys(storage)
        .sort((a, b) => gladiator.skillPoints(b) - gladiator.skillPoints(a)
          || a.localeCompare(b));
      for (g of gladiators) {
        console.log(`${g}: ${gladiator.skillPoints(g)} skill`)
        let skills = Object.keys(storage[g])
          .sort((a, b) => storage[g][b] - storage[g][a] || a.localeCompare(b));
        for (s of skills) {
          console.log(`- ${s} <!> ${storage[g][s]}`);
        }
      }
      // console.log(storage);
    }
  }

  input.forEach(e => {
    let data = e.split(' -> ');
    data.length === 3 ? gladiator.init(data) : duel.init(data[0]);
  });
}

solve([
  "Pesho -> Duck -> 400",
  "Julius -> Shield -> 150",
  "Gladius -> Heal -> 200",
  "Gladius -> Support -> 250",
  "Gladius -> Shield -> 250",
  "Pesho vs Gladius",
  "Gladius vs Julius",
  "Gladius vs Gosho",
  "Ave Cesar"
]);