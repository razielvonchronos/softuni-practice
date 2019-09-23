function solve(radar) {
    let [speed, zone] = radar;
    let limits = {
        'motorway': 130,
        'interstate': 90,
        'city': 50,
        'residential': 20
    }

    let msg = [
        [0, 'speeding'],
        [20, 'excessive speeding'],
        [40, 'reckless driving'],
    ]

    let speeding = speed - limits[zone];
    let result = msg.filter(m => m[0] < speeding).pop();
    if (result)
        console.log(result.pop());
}

solve([40, 'city']);
solve([21, 'residential']);
solve([120, 'interstate']);
solve([200, 'motorway']);