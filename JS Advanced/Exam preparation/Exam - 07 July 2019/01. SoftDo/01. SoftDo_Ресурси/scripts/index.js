// NOTE: The comment sections inside the index.html file is an example of how suppose to be structured the current elements.
//       - You can use them as an example when you create those elements, to check how they will be displayed, just uncomment them.
//       - Also keep in mind that, the actual skeleton in judge does not have this comment sections. So do not be dependent on them!
//       - Тhey are present in the skeleton just to help you!


// This function will be invoked when the html is loaded. Check the console in the browser or index.html file.
function mySolution() {
    let sections = {
        pendingQuestions: document.querySelector('#pendingQuestions'),
        openQuestions: document.querySelector('#openQuestions'),
    }

    function archive() {
        // sections.pendingQuestions.removeChild(grandparent);
        console.log('triggered', this.target)
    };

    function open() {
        sections.openQuestions.appendChild(buildQuestion('open'));
        this.archiveQuestion(q.target.parent);
    };

    function reply() {}

    function buildQuestion(status) {
        let input = document.querySelectorAll('#inputSection textarea, #inputSection input[type="username"]');
        // question
        let questionDIV = document.createElement('div');
        questionDIV.classList.add(`${status}Question`);
        let img = document.createElement('img');
        let span = document.createElement('span');
        let p = document.createElement('p');
        img.src = "./images/user.png";
        img.width = '32';
        img.height = '32';
        span.innerHTML = input[1].value || 'Anonymous';
        p.innerHTML = input[0].value || 'Empty';
        input.forEach(x => x.value = '');
        [img, span, p].forEach(x => questionDIV.appendChild(x))

        // actions
        let actions = document.createElement('div');
        actions.classList.add('actions');
        Object.keys(buttons[status]).forEach(x => actions.appendChild(buttons[status][x](questionDIV)))
        questionDIV.appendChild(actions);
        questionDIV.lastChild.childNodes.forEach(x => x.addEventListener("click", "x.className"))
        return questionDIV;
    };

    let handlers = {}
    let buttons = {
        pending: {
            archive: (q) => {
                let btn = document.createElement('button');
                btn.innerHTML = 'Archive';
                btn.className = 'archive';
                return btn;
            },
            open: (q) => {
                let btn = document.createElement('button');
                btn.innerHTML = 'Open';
                btn.className = 'open';
                return btn;
            }
        },
        open: {
            reply: (q) => {
                let btn = document.createElement('button');
                btn.innerHTML = 'Reply';
                btn.className = 'reply';
                return btn;
            }
        }
    }

    function sendQuestion() {
        sections.pendingQuestions.appendChild(buildQuestion('pending'))
    }
    let ButtonSendMsg = document.querySelector('#inputSection button');
    ButtonSendMsg.addEventListener("click", sendQuestion);
}