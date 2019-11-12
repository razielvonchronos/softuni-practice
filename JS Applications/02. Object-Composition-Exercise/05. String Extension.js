(function () {
    String.prototype.ensureStart = function (str) {
        if (!this.startsWith(str)) {
            return str.concat(this)
        }
        return this.toString();
    }
    String.prototype.ensureEnd = function (str) {
        if (!this.endsWith(str)) {
            return this.toString().concat(str)
        }
        return this.toString();
    }
    String.prototype.isEmpty = function () {
        return this.length === 0;
    }
    String.prototype.truncate = function (n) {
        let string = this.toString()

        if (string.endsWith('...')) {
            string = string.slice(0, -3);
        }

        if (string.length > n) {
            let words = string.split(' ');
            if (words.length > 1) {
                let result = new String();
                for (i in words) {
                    let preview = words.slice(0, i).join(' ');
                    if (preview.length >= n - 2) {
                        break;
                    }
                    result = preview;
                }
                return result.concat('...')
            } else {
                return string.substr(0, n - 3).concat('...')
            }
        }

        if (n < 4) {
            return '.'.repeat(n)
        }

        return string.toString();
    }

    String.format = function (string, ...params) {
        params.forEach((x, i) => {
            string = string.replace(`{${i}}`, x)
        })
        return string;
    }
})()

function assert(a, b, c) {
    if (a !== b) {
        console.log(`Actual: ${a}\nExpected: ${b}\n => ${c}\n------------------------`)
    }
}

var testString = 'the quick brown fox jumps over the lazy dog';
assert(testString.truncate(10), 'the...', 'Incorrect truncate() functionality 1');
assert(testString.truncate(25), 'the quick brown fox...', 'Incorrect truncate() functionality 2');
assert(testString.truncate(43), 'the quick brown fox jumps over the lazy dog', 'Incorrect truncate() functionality 3');
assert(testString.truncate(45), 'the quick brown fox jumps over the lazy dog', 'Incorrect truncate() functionality 4');