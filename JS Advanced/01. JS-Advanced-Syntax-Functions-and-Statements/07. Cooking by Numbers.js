function solve(input) {
    let [incredient, cmd] = [Number(input[0]), input.slice(1)];
    let map = {
        chop(x) { return x / 2 },
        dice(x) { return Math.sqrt(x) },
        spice(x) { return x + 1 },
        bake(x) { return x * 3 },
        fillet(x) { return x -= x * 0.2 }
    }

    for (let c of cmd) {
        incredient = map[c](incredient);
        console.log(incredient);
    }
}

solve(['9', 'dice', 'spice', 'chop', 'bake', 'fillet']);