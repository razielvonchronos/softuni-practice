
let errors = []

let assert = {
    equal(x, y, message) {
        if (x !== y) { errors.push(`${message}: Expected \n${x} \nto be equal\n ${y}`)}
    }
}
// add question
mySolution();
let $textarea = document.querySelector('#inputSection textarea');
let $input = document.querySelector('#inputSection input');
let $questionBtn = document.querySelector('#inputSection button');
let $pendingQuestions = document.getElementById('pendingQuestions');

$textarea.value = "What means ... operator?";
$questionBtn.click();

let $childs = $pendingQuestions.children;
let expectedHeader = "Pending Questions";
let $expectedQuestion = '<img src="./images/user.png" width="32" height="32"><span>Anonymous</span><p>What means ... operator?</p><div class="actions"><button class="archive">Archive</button><button class="open">Open</button></div>';

assert.equal($childs.length, 2, "Child elements inside pendingQuestion section are invalid");

assert.equal($childs[0].textContent, expectedHeader, 'The "Pending Questions" heading is invalid (text content)');
assert.equal($childs[0].tagName, "H3", 'The "Pending Questions" heading is invalid (tag name)');

assert.equal($childs[1].innerHTML, $expectedQuestion, 'The expected question is not structured properly (child structure)');
assert.equal($childs[1].tagName, "DIV", 'The expected question is not structured properly. (tag name)');

console.log(`Tests finidhed, ${errors.length} errors`);
errors.forEach(x => console.log(`${x}\n`))