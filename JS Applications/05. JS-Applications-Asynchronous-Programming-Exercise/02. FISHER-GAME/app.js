function attachEvents() {
    let catches = document.getElementById('catches');
    let [btnLoad, btnAdd] = document.querySelectorAll('aside button');
    // let [angler, weight, species,location,bait,captureTime] 

    function buildCatch(id, data) {
        let div = document.createElement('div');
        div.className = 'catch';
        div.dataset.id = id;
        div.innerHTML = '<label>Angler</label>';
        div.innerHTML += `<input type="text" class="angler" value="${data.angler}" /><hr>`;
        div.innerHTML += '<label>Weight</label>';
        div.innerHTML += `<input type="number" class="weight" value="${data.weight}" /><hr>`;
        div.innerHTML += '<label>Species</label>';
        div.innerHTML += `<input type="text" class="species" value="${data.species}" /><hr>`;
        div.innerHTML += '<label>Location</label>';
        div.innerHTML += `<input type="text" class="location" value="${data.location}" /><hr>`;
        div.innerHTML += '<label>Bait</label>';
        div.innerHTML += `<input type="text" class="bait" value="${data.bait}" /><hr>`;
        div.innerHTML += '<label>Capture Time</label>';
        div.innerHTML += `<input type="number" class="captureTime" value="${data.captureTime}" /><hr>`;
        let btnDelete = document.createElement('button');
        btnDelete.textContent = "Delete";
        btnDelete.addEventListener('click', events.delete);
        let btnUpdate = document.createElement('button');
        btnUpdate.addEventListener('click', events.update);
        btnUpdate.textContent = "Update";
        [btnDelete, btnUpdate].forEach(x => div.appendChild(x));
        catches.appendChild(div);
    }
    const events = {
        load: async () => {
            let response = await fetch('https://fisher-game.firebaseio.com/catches.json');
            let data = await response.json();
            Object.keys(data).forEach(x => buildCatch(x, data[x]));
        },
        add: async () => {
            let data = {};
            document.querySelectorAll('#addForm input').forEach(x => {
                data[x.className] = x.value;
                x.value = '';
            })
            await fetch('https://fisher-game.firebaseio.com/catches.json', {
                method: 'POST',
                body: JSON.stringify(data)
            });
        },
        delete: (e) => {
            let parent = e.target.parentElement;
            fetch(`https://fisher-game.firebaseio.com/catches/${parent.dataset.id}.json`, {
                method: "DELETE"
            });
            parent.remove()
        },
        update: (e) => {
            let parent = e.target.parentElement;
            let data = {};
            parent.querySelectorAll('input').forEach(x => {
                data[x.className] = x.value;
            });
            fetch(`https://fisher-game.firebaseio.com/catches/${parent.dataset.id}.json`, {
                method: "PATCH",
                body: JSON.stringify(data)
            });
        },
    }
    btnLoad.addEventListener('click', events.load);
    btnAdd.addEventListener('click', events.add);

    catches.innerHTML = '';
    btnLoad.click();
}

attachEvents();

