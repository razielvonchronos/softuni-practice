function solve(params) {
  let moves = params.slice()
  let game =
  {
    player: "X",
    winner: false,
    board: Array(3).fill().map(() => Array(3).fill(false)),
    cells() {
      // scan all cells for symbol * 3
      let base = this.board.slice();
      let len = base.length - 1;

      let columns = base.reduce((acc, curr, i) => {
        let column = base.map(x => x.slice(i, i + 1)[0])
        acc.push(column)
        return acc;
      }, []);

      let diagonals = base.reduce((acc, curr, i) => {
        acc[0].push(curr[i])
        acc[1].push(curr[len - i])
        return acc;
      }, [[], []])

      return base.concat(columns, diagonals);
    },
    isWinner() {
      let cells = this.cells();
      this.winner = cells.some((arr) => arr.every(e => e === this.player)) ?
        this.player : false
    },
    isRunning() { // run untill slots are taken, player is winner or moves is empty
      return this.board.some(x => x.includes(false)) && !this.winner && moves.length > 0;
    },
    slot_use() { // check if slot is available or send log.
      let [col, row] = moves.shift().split(' ');
      let available = game.board[col][row] === false;
      if (available)
        game.board[col][row] = this.player
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
    run() {
      while (this.isRunning()) {
        this.turn()
      }
    }
  }

  game.run();

  console.log(game.winner ? `Player ${game.winner} wins!` : 'The game ended! Nobody wins :( ')
  return game.board
    .map(x => x.join('\t'))
    .join('\n');
}

console.log(
  solve(
    ["0 1", "0 0", "0 2", "2 0", "1 0", "1 1", "1 2", "2 2", "2 1", "0 0"]
  ) + '\n'
)

console.log(
  solve(
    ["0 0", "0 0", "1 1", "0 1", "1 2", "0 2", "2 2", "1 2", "2 2", "2 1"]
  ) + '\n'
)

console.log(
  solve(
    ["0 1", "0 0", "0 2", "2 0", "1 0", "1 2", "1 1", "2 1", "2 2", "0 0"]
  ) + '\n'
)