function solve(input) {
    function parseHero(data) {
        return {
            "name": data[0],
            "level": Number(data[1]),
            "items": data.length > 2 ? data[2].split(', ') : []
        }
    }
    let heroes = input
        .map(str => str.split(' / '))
        .map(arr => parseHero(arr));
    console.log(JSON.stringify(heroes));
}

solve([
    'Isacc / 25 / Apple, GravityGun',
    'Derek / 12 / BarrelVest, DestructionSword',
    'Hes / 1 / Desolator, Sentinel, Antara'
]);