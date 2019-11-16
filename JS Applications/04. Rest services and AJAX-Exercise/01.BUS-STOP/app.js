async function getInfo() {
    let stopId = document.querySelector('#stopId');
    let result_name = document.querySelector('#stopName');
    let result_ul = document.querySelector('#buses');
    try {
        const response = await fetch(`https://judgetests.firebaseio.com/businfo/${stopId.value.trim()}.json`);
        const data = await response.json();
        result_name.textContent = data.name
        result_ul.textContent = '';
        Object.keys(data.buses).map((x) => {
            result_ul.innerHTML += `<li>Bus ${x} arrives in ${data.buses[x]} minutes</li>`
        })
    }
    catch (error) {
        result_name.textContent = 'Error';
        result_ul.textContent = '';
    }
}