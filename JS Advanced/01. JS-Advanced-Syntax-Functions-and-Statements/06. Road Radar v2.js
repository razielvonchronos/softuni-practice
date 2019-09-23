function solve(radar) {
    let [speed, zone] = radar;
    let limits = {
        'motorway': 130,
        'interstate': 90,
        'city': 50,
        'residential': 20
    }

    let msg = [
        [40, 'reckless driving'],
        [20, 'excessive speeding'],
        [0, 'speeding'],
    ]
    let speeding = speed - limits[zone];
    if(speeding <= 0)
        return;
    let result = msg.find(x => x[0] < speeding);
    console.log(result.pop());
}

solve([40, 'city']);
solve([21, 'residential']);
solve([120, 'interstate']);
solve([200, 'motorway']);