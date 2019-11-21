function attachEvents() {
    let state = {};

    let input = document.getElementById('location');
    let btnLoad = document.getElementById('submit');

    let icons = {
        'Sunny': '&#x2600;',
        'Partly sunny': '&#x26C5;',
        'Overcast': '&#x2601;',
        'Rain': '&#x2614;',
    }

    let fetchLocation = async (target) => {
        let response = await fetch('https://judgetests.firebaseio.com/locations.json');
        let json = await response.json();
        let data = json.find(x => x.name === target);
        return data;
    }

    let fetchToday = async (code) => {
        let response = await fetch(`https://judgetests.firebaseio.com/forecast/today/${code}.json`);
        let json = await response.json();
        return json;
    }

    let fetchUpcoming = async (code) => {
        let response = await fetch(`https://judgetests.firebaseio.com/forecast/upcoming/${code}.json`);
        let json = await response.json();
        return json;
    }

    function buildForecastHTML(data) {
        let div = document.createElement('div');
        div.className = 'forecasts';
        let span_symbol = document.createElement('span');
        span_symbol.classList.add('condition', 'symbol');
        span_symbol.innerHTML = icons[data.forecast.condition];

        div.appendChild(span_symbol);

        let span_condition = document.createElement('span');
        span_condition.classList.add('condition');

        // prepare data
        let forecasts = [
            data.name,
            `${data.forecast.low}&#176;/${data.forecast.high}&#176;`,
            data.forecast.condition
        ];
        // build and append html
        forecasts.forEach(x => {
            let span = document.createElement('span');
            span.className = 'forecast-data';
            span.innerHTML = x;
            span_condition.appendChild(span);
        })
        div.appendChild(span_condition)
        return div;
    }

    function buildUpcomingHTML(data) {
        let div = document.createElement('div');
        div.className = 'forecast-info';

        data.forecast.forEach(x => {
            let span_upcoming = document.createElement('span');
            span_upcoming.className = 'upcoming';
            span_upcoming.innerHTML = `<span class="symbol">${icons[x.condition]}</span>`;
            span_upcoming.innerHTML += `<span class="forecast-data">${x.low}&#176;/ ${x.high}&#176;</span>`;
            span_upcoming.innerHTML += `<span class="forecast-data">${x.condition}</span>`;
            div.appendChild(span_upcoming);
        })
        return div;

    }

    async function handleLoad() {
        let location_data = await fetchLocation(input.value);
        let forecast = document.getElementById('forecast');
        forecast.removeAttribute('style');
        if (!location_data) {
            forecast.textContent = "Error";
            console.error(`Location "${input.value}" not found!`)
        } else {
            let today_data = await fetchToday(await location_data.code);
            let upcoming_data = await fetchUpcoming(await location_data.code);


            let current = document.getElementById('current');
            current.appendChild(buildForecastHTML(today_data));
            let upcoming = document.getElementById('upcoming');
            upcoming.appendChild(buildUpcomingHTML(upcoming_data));
        }
    }

    btnLoad.addEventListener('click', handleLoad);


    (function () {
        input.value = 'Sofia'
        btnLoad.click();
    }())
}

attachEvents();