function solve(params) {
  let player = {
    id: 1,
    symbol() {
      return this.id === 0 ? "O" : "X"
    },
    switch(id) {
      this.id = id === 0 ? 1 : 0;
    },
    winner: false
  }

  let board =
  {
    init: [
      [false, false, false],
      [false, false, false],
      [false, false, false]
    ],
    cells() {
      let len = this.init.length - 1;
      let cols = [];
      for (let c = 0; c <= len; c++) {
        let col = this.init.map(x => (x[c]));
        cols.push(col);
      }

      let diag_lr = []; // diagonal left to right
      let diag_rl = []; // diagonal right to left
      for (let d = 0; d <= len; d++) {
        diag_lr.push(this.init[d][d]);
        diag_rl.push(this.init[len - d][d]);
      }

      return [
        ...this.init,
        ...cols,
        diag_lr,
        diag_rl
      ]
    },
    // slot methods
    space_available() {
      let result = this.init.some(x => x.includes(false));
      return result;
    },
    slot_available(x, y) {
      let result = board.cells()[x][y] === false;
      if (!result) {
        console.log("This place is already taken. Please choose another!")
        // console.log(x,y)
      }
      return result;
    },
    slot_use(x, y) {
      this.init[x][y] = player.symbol();
      this.win_check();
      // console.log(board.cells(), board.cols(), board.diagonals());
    },
    win_check() {
      player.winner = this.cells()
        .some((arr) => arr.every(e => e === player.symbol()))
    },
  }

  for (let i = 0; i < params.length; i++) {
    let [x, y] = params[i].split(' ');
    if (!board.space_available())
      break;
    if (!board.slot_available(x, y))
      continue;
    board.slot_use(x, y)
    if (player.winner)
      break;
    player.switch(player.id)
  }

  console.log(player.winner ? `Player ${player.symbol()} wins!` : 'The game ended! Nobody wins :( ')
  return board.init
    .map(x => x.join('\t'))
    .join('\n') + '\n';
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