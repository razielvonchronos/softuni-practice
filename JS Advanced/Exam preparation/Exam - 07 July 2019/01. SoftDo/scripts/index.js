
function mySolution() {
    let sections = {
        pendingQuestions: document.querySelector('#pendingQuestions'),
        openQuestions: document.querySelector('#openQuestions'),
    }

    function archive(event) {
        let pendingQuestion = event.target.parentNode.parentNode;
        sections.pendingQuestions.removeChild(pendingQuestion)
    };

    function open(event) {
        let actions = event.target.parentNode;
        let buttons = actions.querySelectorAll('button');
        let question = event.target.parentNode.parentNode;
        // move to opened questions
        question.className = "openQuestion";
        sections.openQuestions.appendChild(question);
        // clear actions div and append reply button

        buttons.forEach(x => x.remove());
        actions.appendChild(buildButton("Reply", "reply", [reply]));
        // add replies
        let replySection = buildReplies();
        question.appendChild(replySection);
    };

    function reply(event) {
        let grandparent = event.target.parentNode.parentNode;
        let replySection = grandparent.querySelector('div .replySection');
        let visible = replySection.style.display === "none";
        event.target.innerHTML = visible ? "Back" : "Reply";
        replySection.style.display = visible ? "block" : "none";
    }

    function sendReply(event) {
        let parent = event.target.parentNode;
        let input = parent.querySelector('input');
        let ol = parent.querySelector('ol');
        let li = document.createElement('li')
        li.innerHTML = input.value;
        ol.appendChild(li);
        input.value = '';
    }

    function buildReplies() {
        let replySection = document.createElement('div');
        replySection.classList.add('replySection');
        replySection.style.display = "none";
        let input = document.createElement('input');
        input.classList.add('replyInput');
        input.setAttribute('type', 'text');
        input.setAttribute('placeholder', 'Reply to this question here...');
        let btn_reply = buildButton('Send', 'replyButton', [sendReply]);
        // ordered list
        let ol = document.createElement('ol');
        ol.classList.add('reply');
        ol.type = '1';
        [input, btn_reply, ol].forEach(x => replySection.appendChild(x));

        return replySection;
    }
    function buildButton(title, className, fns) {
        let btn = document.createElement('button');
        btn.innerHTML = title;
        btn.className = className;
        fns.forEach(x => btn.addEventListener("click", x));
        return btn;
    }
    function buildQuestion() {
        let input = document.querySelectorAll('#inputSection textarea, #inputSection input[type="username"]');
        // question
        let questionDIV = document.createElement('div');
        questionDIV.classList.add('pendingQuestion');
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
        let buttons = [
            buildButton("Archive", "archive", [archive]),
            buildButton("Open", "open", [open])
        ]
        buttons.forEach(x => actions.appendChild(x))
        questionDIV.appendChild(actions)
        return questionDIV;
    };

    let ButtonSendQuestion = document.querySelector('#inputSection button');
    ButtonSendQuestion.addEventListener("click", function () {
        let question = buildQuestion();
        sections.pendingQuestions.appendChild(question);
        console.log('send was clicked');
    });
}
