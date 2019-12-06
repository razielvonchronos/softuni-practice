function solve(...input) {
  let [a, b] = input;
  let storage = new Map();
  let kingdom = {
    find(x) {
      let list_generals = this.getGenerals(x)
      return {
        name: x,
        generals: list_generals,
        totalWins: list_generals.reduce((acc, el) => acc + el.wins, 0),
        totalLoss: list_generals.reduce((acc, el) => acc + el.loss, 0),
        totalArmy: list_generals.reduce((acc, el) => acc + el.army, 0)
      }
    },
    all() {
      return [...storage.values()].map(x => x.kingdom).filter((x, i, a) => a.indexOf(x) == i);
    },
    getGenerals(name) {
      return [...storage.values()].filter((x) => x.kingdom === name).sort((a, b) => b.army - a.army);
    }
  }
  let general = {
    find(name) {
      return storage.get(name)
    },
    store(data) {
      storage.set(
        data.general,
        {
          name: data.general,
          kingdom: data.kingdom,
          army: data.army,
          wins: 0,
          loss: 0
        }
      );
    },
    update(data) {
      storage.get(data.general).army += Number(data.army);
    },

  }
  let battle = {
    init(kingdom_a, general_a, kingdom_b, general_b) {
      if (kingdom_a === kingdom_b)
        return;
      let attacker = general.find(general_a);
      let defender = general.find(general_b);
      this.start(attacker, defender);
    },
    start(attacker, defender) {
      // console.log(`Battle Start ${attacker.name} vs ${defender.name}`);
      if (attacker.army === defender.army)
        return;
      attacker.army > defender.army ?
        this.end(attacker, defender) :
        this.end(defender, attacker);
    },
    end(winner, loser) {
      // console.log(`${winner.name} ${winner.kingdom} won against ${loser.name} ${loser.kingdom}`)
      winner.army = Math.floor(winner.army + (winner.army * 0.10));
      winner.wins++;
      loser.army = Math.floor(loser.army - (loser.army * 0.10));
      loser.loss++;
    },
    getWinner() {
      let x = kingdom.all()
        .sort(
          (a, b) => kingdom.find(b).totalWins - kingdom.find(a).totalWins ||
            kingdom.find(a).totalLoss - kingdom.find(b).totalLoss ||
            a.localeCompare(b))
        .shift();
      return kingdom.find(x);
    }
  }
  a.forEach(e =>
    storage.has(e.general) ? general.update(e) : general.store(e)
  );
  b.forEach(e => battle.init(...e));
  let winner = battle.getWinner();
  let announce = '';
  announce += `Winner: ${winner.name}\n`;
  for (let g of winner.generals) {
    announce += `/\\general: ${g.name}\n`;
    announce += `---army: ${g.army}\n`;
    announce += `---wins: ${g.wins}\n`;
    announce += `---losses: ${g.loss}\n`;
  }
  return announce;
}

console.log(
  solve(
    [
      { kingdom: "Maiden Way", general: "Merek", army: 5000 },
      { kingdom: "Stonegate", general: "Ulric", army: 4900 },
      { kingdom: "Stonegate", general: "Doran", army: 70000 },
      { kingdom: "YorkenShire", general: "Quinn", army: 0 },
      { kingdom: "YorkenShire", general: "Quinn", army: 2000 },
      { kingdom: "Maiden Way", general: "Berinon", army: 100000 }
    ],
    [
      ["YorkenShire", "Quinn", "Stonegate", "Ulric"],
      ["Stonegate", "Ulric", "Stonegate", "Doran"],
      ["Stonegate", "Doran", "Maiden Way", "Merek"],
      ["Stonegate", "Ulric", "Maiden Way", "Merek"],
      ["Maiden Way", "Berinon", "Stonegate", "Ulric"]
    ]
  )
)
// console.log(
//   solve(
//     [
//       { kingdom: "Maiden Way", general: "Merek", army: 5000 },
//       { kingdom: "Stonegate", general: "Ulric", army: 4900 },
//       { kingdom: "Stonegate", general: "Doran", army: 70000 },
//       { kingdom: "YorkenShire", general: "Quinn", army: 0 },
//       { kingdom: "YorkenShire", general: "Quinn", army: 2000 }
//     ],
//     [
//       ["YorkenShire", "Quinn", "Stonegate", "Doran"],
//       ["Stonegate", "Ulric", "Maiden Way", "Merek"]
//     ]

//   )
// )