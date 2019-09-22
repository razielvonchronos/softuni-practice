function solve(steps, footprint, kmh) {
    /* 
        Pad function taken from:
        https://gist.github.com/endel/321925f6cafa25bbfbde
     */
    Number.prototype.pad = function (size) {
        var s = String(this);
        while (s.length < (size || 2)) { s = "0" + s; }
        return s;
    }
    let distance = steps * footprint; // calculate the distance based on steps and footprint
    let breaks = distance >= 500 ? ~~(distance / 500) : 0; // he takes a rest each 500 metters
    let est = distance / (kmh * 1000) * 60;// estimated walking time 
    est += breaks; // add seconds for break times
    let h = ~~(est / 60); // convert minutes to hours, floored
    let m = ~~est % 60; // take the minutes left after hours removal
    let s = Math.round(est % ~~est * 60); // leave seconds after removing the minutes
    console.log(`${h.pad(2)}:${m.pad(2)}:${s.pad(2)}`);
}

solve(4000, 0.60, 5); // returns 00:32:48