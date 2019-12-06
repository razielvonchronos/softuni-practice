function solve() {

    let to = document.querySelector('#selectMenuTo');
    let option_binary = document.createElement('option');
    let option_hexadecimal = document.createElement('option');

    option_binary.text = "Binary"
    option_binary.value = "binary"
    option_hexadecimal.text = "Hexadeicmal"
    option_hexadecimal.value = "hexadecimal"
    to.appendChild(option_binary);
    to.appendChild(option_hexadecimal);

    let HandleConvertion = (e) => {
        let convert = {
            binary(dec) {
                const result = (dec >>> 0).toString(2);
                return result;
            },
            hexadecimal: (dec) => {
                const result = dec.toString(16).toUpperCase();
                return result;
            },
        }

        let input = document.querySelector('#input');

        let result = document.querySelector('#result');
        result.value = convert[to.value](Number(input.value));
    }
    document.querySelector('button').addEventListener('click', HandleConvertion)
}
