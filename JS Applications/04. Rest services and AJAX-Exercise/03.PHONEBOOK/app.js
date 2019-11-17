function attachEvents() {

    const phonebook = document.getElementById('phonebook');

    function buildContact(id, data) {
        let li = document.createElement('li');
        li.innerText = `${data.person}: ${data.phone}`
        let btnDelete = document.createElement('button');
        btnDelete.textContent = "Delete";
        btnDelete.addEventListener("click", (e) => {
            fetch(`https://phonebook-nakov.firebaseio.com/phonebook/${id}.json`, {
                method: "DELETE"
            }).then(res => res.json()).then(console.log);
            e.target.parentElement.remove()
        })
        li.appendChild(btnDelete);
        return li;
    }

    function handleLoad() {
        fetch('https://phonebook-nakov.firebaseio.com/phonebook.json')
            .then(res => res.json())
            .then(data => {

                for (x of Object.keys(data)) {
                    let contact = buildContact(x, data[x]);
                    phonebook.appendChild(contact)
                }
            })
    }

    function handleCreate() {

        let inputs = document.querySelectorAll('#person, #phone');
        let data = {
            'person': inputs[0].value,
            'phone': inputs[1].value
        }
        fetch('https://phonebook-nakov.firebaseio.com/phonebook.json', {
            method: 'POST',
            body: JSON.stringify(data)
        }).then(res => res.json()).then(console.log)
        inputs.forEach(x => x.value = '');
    }

    let btnLoad = document.getElementById("btnLoad");
    btnLoad.addEventListener("click", handleLoad)

    let btnCreate = document.getElementById("btnCreate");
    btnCreate.addEventListener("click", handleCreate)
}

attachEvents();