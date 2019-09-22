function solve(radar) {
    let speed = radar[0];
    let zone = radar[1];
    let data = {
        'motorway': 130,
        'interstate': 90,
        'city': 50,
        'residential': 20
    }

    let log = '';
    log = speed > data[zone] ? 'speeding' : log;
    log = speed > data[zone] + 20 ? 'excessive speeding' : log;
    log = speed > data[zone] + 40 ? 'reckless driving' : log;
    console.log(log);
}

solve([40, 'city']);
solve([21, 'residential']);
solve([120, 'interstate']);
solve([200, 'motorway']);