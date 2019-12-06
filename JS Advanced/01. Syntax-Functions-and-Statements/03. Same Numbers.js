function solve(number) {
    let all = number.toString().split('').map(Number);
    let same = all.every((i) => { return i == all[0]});
    let sum = all.reduce((x,y) => x + y);
    console.log(same);
    console.log(sum);
}

solve(1234);
solve(2222);