function solve(params) {
  let player = {
    id: 1,
    symbol() {
      return this.id === 0 ? "O" : "X"
    },
    switch(plr) {
      this.id = plr.id === 0 ? 1 : 0;
    },
    winner: false
  }

  let board =
  {
    data: [
      [false, false, false],
      [false, false, false],
      [false, false, false]
    ],
    cols() {
      let result = [];
      for (let c = 0; c < this.data[0].length; c++) {
        let col = this.data.map(x => (x[c]));
        result.push(col);
      }
      return result;
    },
    diagonals() {
      let data = [
        [], []
      ];
      for (let a = 0; a < this.data.length; a++)
        data[0].push(this.data[a][a])
      let z = 0;
      for (let b = this.data.length - 1; b >= 0; b--) {
        let val = this.data[b][z];
        data[1].push(val);
        z++
      }
      return data;
    },
    fields() {
      return [
        ...this.data,
        ...this.cols(),
        ...this.diagonals()
      ]
    },
    // slot methods
    space_available() {
      let result = this.data.some(x => x.includes(false));
      return result;
    },
    slot_available(x, y) {
      let result = board.data[x][y] === false;
      if (!result) {
        console.log("This place is already taken. Please choose another!")
        // console.log(x,y)
      }
      return result;
    },
    slot_use(x, y) {
      this.data[x][y] = player.symbol();
      this.win_check();
      // console.log(board.data, board.cols(), board.diagonals());
    },
    win_check() {
      let result = this.fields()
        .some((arr) => arr.every(e => e === player.symbol()))
      if (result)
        player.winner = true;
    },
  }

  for (let i = 0; i < params.length; i++) {
    let [x, y] = params[i].split(' ');
    if (!board.space_available())
      break;
    if (!board.slot_available(x, y))
      continue;
    board.slot_use(x, y)
    if (player.winner) {
      console.log(`Player ${player.symbol()} wins!`)
      break;
    }
    player.switch(player)
  }

  if (!player.winner)
    console.log('The game ended! Nobody wins :(')
  return board.data.map(x => x.join('\t')).join('\n') + '\n';
}

console.log(
  solve(
    ["0 1", "0 0", "0 2", "2 0", "1 0", "1 1", "1 2", "2 2", "2 1", "0 0"]
  )
)

console.log(
  solve(
    ["0 0", "0 0", "1 1", "0 1", "1 2", "0 2", "2 2", "1 2", "2 2", "2 1"]
  )
)

console.log(
  solve(
    ["0 1", "0 0", "0 2", "2 0", "1 0", "1 2", "1 1", "2 1", "2 2", "0 0"]
  )
)