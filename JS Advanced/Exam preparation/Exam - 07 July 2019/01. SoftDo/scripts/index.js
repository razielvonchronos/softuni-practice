// This is how you should load an function instead of <body onload="mySolution()">
// var body = document.getElementsByTagName("body")[0];
// body.onload = () => mySolution();

function mySolution() {
    let $test = false;
    // extract el
    let el = {
        inputSection: document.querySelector('#inputSection'),
        inputUsername: this.inputSection.querySelector('input'),
        inputQuestion: this.inputSection.querySelector('textarea'),
        inputButton: this.inputSection.querySelector('button'),
        //
        pendingQuestions: document.querySelector('#pendingQuestions'),
        //
        openQuestions: document.querySelector('#openQuestions'),
    }

    el.inputButton.addEventListener("click", function () {
        let question = buildQuestion();
        el.pendingQuestions.appendChild(question);
        [el.inputUsername, el.inputQuestion].forEach(x => x.value = '');
    });

    function archive(event) {
        let pendingQuestion = event.target.parentNode.parentNode;
        el.pendingQuestions.removeChild(pendingQuestion)
    };

    function open(event) {
        let actions = event.target.parentNode;
        let buttons = actions.querySelectorAll('button');
        let question = event.target.parentNode.parentNode;
        // move to opened questions
        question.className = "openQuestion";
        el.openQuestions.appendChild(question);
        // clear actions div and append reply button

        buttons.forEach(x => x.remove());
        actions.appendChild(buildButton("Reply", "reply", [reply]));
        // add replies section
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

    function buildButton(title, className, fns) {
        let btn = document.createElement('button');
        btn.innerHTML = title;
        btn.className = className;
        fns.forEach(x => btn.addEventListener("click", x));
        return btn;
    }

    function buildQuestion() {
        // question
        let question = document.createElement('div');
        question.classList.add('pendingQuestion');
        let img = document.createElement('img');
        let span = document.createElement('span');
        let p = document.createElement('p');
        img.src = "./images/user.png";
        img.width = '32';
        img.height = '32';
        span.innerHTML = el.inputUsername.value || 'Anonymous';
        p.innerHTML = el.inputQuestion.value || 'Empty';
        [img, span, p].forEach(x => question.appendChild(x))
        // actions
        let actions = document.createElement('div');
        actions.classList.add('actions');
        let buttons = [
            buildButton("Archive", "archive", [archive]),
            buildButton("Open", "open", [open])
        ]
        buttons.forEach(x => actions.appendChild(x))
        question.appendChild(actions)
        return question;
    };

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

    function test() {
        let errors = []
        let assert = {
            equal(x, y, message) {
                if (x !== y) {
                    errors.push(`${message}:\nExpected\n${x}\nto be equal\n${y}`)
                }
            }
        }

        el.inputQuestion.value = "What means ... operator?";
        el.inputUsername.value = "";
        el.inputButton.click();

        el.inputQuestion.value = "Kekekeke?";
        el.inputUsername.value = "BellowZero";
        el.inputButton.click();

        // select second question and open it
        let question = el.pendingQuestions.children[2];
        question.querySelector('button.open').click();
        question.querySelector('button.reply').click();
        question.querySelector('input.replyInput').value = "I am just a simple reply";
        question.querySelector('button.replyButton').click();

        let $pendingQuestions = el.pendingQuestions.children;
        let $openQuestions = el.openQuestions.children;
        let $openQuestionsReplies = $openQuestions[1].querySelector('.replySection ol.reply').children;
        let $expectedQuestion = '<img src="./images/user.png" width="32" height="32"><span>Anonymous</span><p>What means ... operator?</p><div class="actions"><button class="archive">Archive</button><button class="open">Open</button></div>';

        assert.equal($pendingQuestions.length, 2, "Child elements inside pendingQuestion section are invalid");
        assert.equal($pendingQuestions[0].textContent, "Pending Questions", 'The "Pending Questions" heading is invalid (text content)');
        assert.equal($pendingQuestions[0].tagName, "H3", 'The "Pending Questions" heading is invalid (tag name)');
        assert.equal($pendingQuestions[1].innerHTML, $expectedQuestion, 'The expected question is not structured properly (child structure)');
        assert.equal($pendingQuestions[1].tagName, "DIV", 'The expected question is not structured properly. (tag name)');
        assert.equal($openQuestions.length, 2, "Child elements inside pendingQuestion section are invalid");
        assert.equal($openQuestions[0].textContent, "Open Questions", 'The "Open Questions" heading is invalid (text content)');
        assert.equal($openQuestions[0].tagName, "H3", 'The "Pending Questions" heading is invalid (tag name)');
        assert.equal($openQuestionsReplies.length, 1, "Child elements inside replySection are invalid");

        console.log(`Tests finidhed, ${errors.length} errors`);
        errors.forEach(x => console.log(`${x}\n`))
    }

    if ($test)
        test();
}