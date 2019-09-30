function solve(params) {
  let game =
  {
    player: "X",
    winner: false,
    init: Array(3).fill().map(() => Array(3).fill(false)),
    slot_use() { // check if slot is available or send log.
      let [col, row] = params.shift().split(' ');
      let available = game.init[col][row] === false;
      if (available)
        game.init[col][row] = this.player
      else
        console.log("This place is already taken. Please choose another!")
      return available;
    },
    turn() { // Player's turn, return if trying to use unavailable slot
      if (!this.slot_use())
        return;
      this.isWinner()
      game.player = game.player === "X" ? "O" : "X"
    },
    isWinner() { // scan all fields for symbol * 3
      let len = this.init.length - 1;

      let columns = [];
      for (let c = 0; c <= len; c++) {
        let col = this.init.map(x => (x[c]));
        columns.push(col);
      }

      let diag_lr = []; // diagonal left to right
      let diag_rl = []; // diagonal right to left
      for (let d = 0; d <= len; d++) {
        diag_lr.push(this.init[d][d]);
        diag_rl.push(this.init[len - d][d]);
      }

      let board = [
        ...this.init,
        ...columns,
        diag_lr,
        diag_rl
      ]
      this.winner = board.some((arr) => arr.every(e => e === this.player)) ?
        this.player : false
    },
    isRunning() { // run untill slots are taken or player is winner
      return this.init.some(x => x.includes(false)) && !this.winner;
    },
    run() {
      while (this.isRunning()) {
        this.turn()
      }
    }
  }

  game.run();

  console.log(game.winner ? `Player ${game.winner} wins!` : 'The game ended! Nobody wins :( ')
  return game.init
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