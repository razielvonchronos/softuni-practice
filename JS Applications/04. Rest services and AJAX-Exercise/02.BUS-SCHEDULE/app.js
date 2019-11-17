function solve() {

    let data = {
        name: '',
        next: 'depot'
    };

    let busStop = document.querySelector('#info span');
    let buttons = document.querySelectorAll('#depart, #arrive');

    function buttonsToggle() {
        buttons.forEach(x => x.disabled = !x.disabled);
    }


    async function depart() {
        try {
            let response = await fetch(`https://judgetests.firebaseio.com/schedule/${data.next}.json`);
            data = await response.json();
            busStop.textContent = `Next Stop is ${data.name}`;
            buttonsToggle();
        } catch (e) {
            busStop.textContent = `Error`;
        }
    }

    async function arrive() {
        busStop.textContent = `Arriving at ${data.name}`;
        buttonsToggle();
    }

    return {
        depart,
        arrive
    };
}

let result = solve();