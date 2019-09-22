function solve(array = new Array()) {
    let obj = {};
    while (array.length > 0) {
        let key = array.shift();
        let value = array.shift();
        obj[key] = Number(value);
    }
    console.log(obj)
}

solve(['Yoghurt', 48, 'Rise', 138, 'Apple', 52]);