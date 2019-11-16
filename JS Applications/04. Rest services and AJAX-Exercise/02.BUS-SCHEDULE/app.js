function solve() {

    let stopId = {
        name: '',
        next: 'depot'
    };

    let busStop = document.querySelector('#info span');
    let buttons = document.querySelectorAll('#depart, #arrive');

    function buttonsToggle() {
        buttons.forEach(x => x.disabled = !x.disabled);
    }

    async function findStop() {
        let response = await fetch(`https://judgetests.firebaseio.com/schedule/${stopId.next}.json`);
        let data = await response.json();
        return data;

    }

    async function depart() {
        stopId = await findStop();
        busStop.textContent = `Next Stop is ${stopId.name}`;
        buttonsToggle();
    }

    async function arrive() {
        busStop.textContent = `Arriving at ${stopId.name}`;
        buttonsToggle();
    }

    return {
        depart,
        arrive
    };
}

let result = solve();