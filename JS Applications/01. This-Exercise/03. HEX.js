
class Hex {
    constructor(value) {
        this.value = value
    }

    valueOf() {
        // This function should return the value property of the Hex class.
        return this.value
    }

    toString() {
        // This function will show its hexidecimal value starting with "0x"
        return `0x${this.value.toString(16).toUpperCase()}`;
    }

    plus(number) {
        // This function should add a number or Hex object and return a new Hex object.
        return new Hex(this.value + number);
    }
    minus(number) {
        // This function should subtract a number or Hex object and return a new Hex object.
        return new Hex(this.value - number);
    }
    parse(string) {
        // Create a parse class method that can parse Hexidecimal numbers and convert them to standard decimal numbers.
        return parseInt(string, 16);
    }
}


function test() {

    assert = {
        equal: (a, b) => {
            if (a !== b) {
                throw new Error(`\n${a}\nto be\n${b}`)
            }
        }
    }

    let FF = new Hex(255);
    let actual = FF.toString();
    let expected = "0xFF";
    assert.equal(actual,expected);
    assert.equal(FF.valueOf() + 1 , 256);
    let a = new Hex(10);
    let b = new Hex(5);
    let act = a.plus(b).toString();
    let exp = "0xF";
    assert.equal(act,exp);
}

test();