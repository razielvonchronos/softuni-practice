

class Forum {

  constructor() {
    this.users = [];
    this.questions = [];
    this.id = 1;
    this.sessions = [];
  }
  usernameExists(username) {
    return this.users.find((x) => x.username === username)
  }
  emailExists(email) {
    return this.users.find((x) => x.email === email)
  }
  isLogged(username) {
    return this.sessions.find((x) => x === username)
  }
  questionExists(questionId) {
    return this.questions.find((x) => x.id === questionId)
  }

  register(username, password, repeatPassword, email) {
    if (!username || !password || !repeatPassword || !email) {
      throw new Error("Input can not be empty");
    }
    if (password != repeatPassword) {
      throw new Error("Passwords do not match")
    }
    if (this.usernameExists(username) || this.emailExists(email)) {
      throw new Error("This user already exists!")
    }

    let new_user = {};
    new_user.username = username;
    new_user.password = password;
    new_user.email = email;
    this.users.push(new_user)
    return `${username} with ${email} was registered successfully!`;
  }

  login(username, password) {
    let user = this.usernameExists(username);
    if (!user) {
      throw new Error("There is no such user");
    }

    if (password === user.password) {
      this.sessions.push(username);
      return "Hello! You have logged in successfully";
    }
  }

  logout(username, password) {
    let user = this.usernameExists(username);
    if (!user) {
      throw new Error("There is no such user");
    }

    if (password === user.password) {
      let user_id = this.sessions.findIndex(x => x.username === username);
      this.sessions.splice(user_id, 1);
      return "You have logged out successfully";
    }
  }
  postQuestion(username, question) {
    if (!this.usernameExists(username) || !this.isLogged(username)) {
      throw new Error("You should be logged in to post questions");
    }
    if (!question) {
      throw new Error("Invalid question");
    }
    let new_question = {};
    new_question.id = this.id;
    new_question.author = username;
    new_question.content = question;
    new_question.answers = [];
    this.questions.push(new_question);
    this.id++;
    return "Your question has been posted successfully";
  }

  postAnswer(username, questionId, answer) {
    if (!this.usernameExists(username) || !this.isLogged(username)) {
      throw new Error("You should be logged in to post answers");
    }
    if (!answer) {
      throw new Error("Invalid answer");
    }

    let question = this.questionExists(questionId);
    if (!question) {
      throw new Error("There is no such question");
    }

    let new_answer = {};
    new_answer.author = username;
    new_answer.content = answer;
    question.answers.push(new_answer);
    return "Your answer has been posted successfully";
  }

  showQuestions() {
    let string = [];
    this.questions.forEach((x) => {
      string.push(`Question ${x.id} by ${x.author}: ${x.content}`);
      x.answers.forEach((y) => string.push(`---${y.author}: ${y.content}`))
    })
    return string.join('\n');
  }
}

let forum = new Forum();

forum.register('Michael', '123', '123', 'michael@abv.bg');
forum.register('Stoyan', '123ab7', '123ab7', 'some@gmail@.com');
forum.login('Michael', '123');
forum.login('Stoyan', '123ab7');

forum.postQuestion('Michael', "Can I rent a snowboard from your shop?");
forum.postAnswer('Stoyan', 1, "Yes, I have rented one last year.");
forum.postQuestion('Stoyan', "How long are supposed to be the ski for my daughter?");
forum.postAnswer('Michael', 2, "How old is she?");
forum.postAnswer('Michael', 2, "Tell us how tall she is.");

console.log(forum.showQuestions());
