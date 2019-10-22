"use strict"

// NOTE: The comment sections inside the index.html file is an example of how suppose to be structured the current elements.
//       - You can use them as an example when you create those elements, to check how they will be displayed, just uncomment them.
//       - Also keep in mind that, the actual skeleton in judge does not have this comment sections. So do not be dependent on them!
//       - Тhey are present in the skeleton just to help you!


// This function will be invoked when the html is load. Check the console in the browser or index.html file.
function mySolution() {
    let questions = [];

    let sections = {
        pending: document.querySelector('#pendingQuestions'),
        open: document.querySelector('#openQuestions'),
    }

    let mapActions = {
        open: (x) => x.status = 'open',
        pending: (x) => x.status = 'pending',
        archive: (x) => x.status = 'archived',
        reply: (x) => x.replies.active = !x.replies.active,
    }
    let LoadQuestions = () => {
        sections.pending.innerHTML = '<h3>Pending Questions</h3>';
        sections.open.innerHTML = '<h3>Open Questions</h3>';
        questions.forEach(question => {
            let QuestionHTML = buildQuestion(question);
            let actionsHTML = buildActionButtons(question);
            QuestionHTML.appendChild(actionsHTML);
            let replySection = appendReplies(question);
            replySection.style.display = question.replies.active ? 'block' : 'none';
            QuestionHTML.appendChild(replySection);
            sections[question.status].appendChild(QuestionHTML);
        })
        // console.log('LoadQuestionsing', questions)
    };

    function buildActionButtons(question) {
        let buttons = {
            archive: {
                text: 'Archive',
                visible: question.status === 'pending',
                action: (x) => mapActions.archive(x),
            },
            open: {
                text: 'Open',
                action: (x) => mapActions.open(x),
                visible: question.status === 'pending',

            },
            reply: {
                text: question.status === 'open' && question.replies.active ? 'Back' : 'Reply',
                visible: question.status === 'open',
                action: (x) => mapActions.reply(x),
            },
        }

        let actions = document.createElement('div');
        actions.classList.add('actions');
        // actions are status change
        Object.keys(buttons).map(x => {
            let btn = document.createElement('button');
            btn.classList.add(x);
            btn.innerHTML = buttons[x].text
            btn.setAttribute('data-action', x);
            btn.setAttribute('data-question_id', Number(question.id));
            btn.style.display = buttons[x].visible ? 'inline' : 'none';
            btn.addEventListener('click', HandleActionButton);
            actions.appendChild(btn);
        })
        return actions;
    }

    function buildQuestion(question) {
        let questionDIV = document.createElement('div');
        questionDIV.classList.add(`${question.status}Question`);
        let img = document.createElement('img');
        let span = document.createElement('span');
        let p = document.createElement('p');
        img.src = "./images/user.png";
        img.width = '32';
        img.height = '32';
        span.innerHTML = question.from;
        p.innerHTML = question.content;
        [img, span, p].forEach(x => questionDIV.appendChild(x))
        return questionDIV;
    };

    function appendReplies(question) {
        let replySection = document.createElement('div');
        replySection.classList.add('replySection');
        let input = document.createElement('input');
        input.classList.add('replyInput');
        input.setAttribute('type', 'text');
        input.setAttribute('data-question_id', question.id);
        input.setAttribute('placeholder', 'Reply to this question here...');
        let button = document.createElement('button');
        button.classList.add('replyButton');
        button.innerText = 'Send';
        button.setAttribute('data-question_id', question.id);
        button.addEventListener('click', HandleSendReplyButton);
        // ordered list
        let ol = document.createElement('ol');
        ol.classList.add('reply');
        ol.type = '1';
        // list items
        question.replies.data.forEach(x => {
            let li = document.createElement('li');
            li.innerText = x;
            ol.appendChild(li)
        });
        [input, button, ol].forEach(x => replySection.appendChild(x));

        return replySection;
    }

    let HandleActionButton = (e) => {
        let button = e.target;
        let action = button.dataset.action
        let question = questions.filter(x => x.id === Number(button.dataset.question_id));
        mapActions[action](...question);
        LoadQuestions();
        // console.log(action, questions);
    }

    let HandleSendReplyButton = (e) => {
        let button = e.target;
        let question = questions.filter(x => x.id === Number(button.dataset.question_id)).pop();
        let replyInput = document.querySelector(`.replySection input[data-question_id="${question.id}"]`);
        console.log(`${replyInput} to `, question);
        question.replies.data.push(replyInput.value);
        replyInput.innerHTML = '';
        LoadQuestions();
    }
    let HandleSendButton = (e) => {
        let input = document.querySelector('#inputSection textarea, #inputSection input');
        let question = {
            id: questions.length > 0 ? Number(questions.slice(-1).pop().id + 1) : Number(1),
            content: input[0].value || "Empty",
            from: input[1].value || 'Anonymous',
            status: 'pending',
            replies: {
                active: false,
                data: []
            }
        }
        questions.push(question);
        LoadQuestions();
        input.forEach(x => x.value = '');
    }

    const btn_send = document.querySelector('#inputSection button')
    btn_send.addEventListener('click', HandleSendButton)

}
// To check out your solution, just submit mySolution() function in judge system.