function solve() {
    let HandleConvertion = (e) => {
        let convert = {
            binary(dec) {
                const result = (dec >>> 0).toString(2);
                return result;
            },
            hexadecimal: (dec) => {
                const result = dec.toString(16).toUpperCase();
                console.log(`${dec} to ${result}`)
                return result;
            },
        }

        let input = document.querySelector('#input');
        let to = document.querySelector('#selectMenuTo');

        let result = document.querySelector('#result');
        result.value = convert[to.value](Number(input.value));
    }
    document.querySelector('button').addEventListener('click', HandleConvertion)
}
