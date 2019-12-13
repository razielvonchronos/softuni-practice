
import * as kinvey from "./database.js";
import { Notification, redirect, saveAuth, toggleLoading, resetForm } from "./utilities.js";

export function UserValidation(data) {
  const { username, password, repeatPassword } = data;
  let errors = []
  if (username.length < 3) {
    errors.push('The username should be at least 3 characters long');
  }
  if (password.length < 3) {
    errors.push('The password should be at least 6 characters long');

  }
  if (password !== repeatPassword) {
    errors.push('The repeat password should be equal to the password');
  }
  return errors;
}

export function ideaValidation(data) {
  const { title, description, imageURL } = data;
  let errors = []
  if (title.length < 6) {
    errors.push('The idea name should be at least 6 characters long');
  }
  if (description.length < 10) {
    errors.push('The description should be at least 10 characters long');
  }
  if (!imageURL.startsWith('http://') && !imageURL.startsWith('https://')) {
    errors.push('The image should start with "http://" or "https://".');
  }
  return errors;
}

export function Register(ctx) {
  toggleLoading();
  const errors = UserValidation(ctx.params);
  if (errors.length === 0) {
    const { username, password } = ctx.params;
    kinvey.userRegister(username, password).then(userInfo => {
      resetForm();
      saveAuth(userInfo);
      toggleLoading();
      Notification('success', 'User registration successful.');
      redirect(ctx, '#/');
    });
  } else {
    Notification('error', errors.join('<br>'));
  }
}

export function Login(ctx) {
  toggleLoading(true);
  const { username, password } = ctx.params;
  kinvey.userLogin(username, password).then(userInfo => {
    resetForm();
    saveAuth(userInfo);
    toggleLoading();
    Notification('success', 'Login successful.');
    redirect(ctx, '#/');
  });
}

export function Logout(ctx) {
  toggleLoading(true);
  kinvey.userLogout().then(() => {
    localStorage.clear();
    toggleLoading();
    Notification('success', 'Logout successful.');
    redirect(ctx, '#/');
  })
}

export function ideaCreate(ctx) {
  toggleLoading(true);
  const errors = ideaValidation(ctx.params);
  if (errors.length === 0) {
    const username = localStorage.getItem('username');
    const { title, description, imageURL } = ctx.params;
    kinvey.ideaCreate({ name: title, description, imageURL, organizer: username, comments: [], likes: 0 })
      .then(res => {
        resetForm();
        toggleLoading();
        Notification('success', 'Idea created successfully.');
        redirect(ctx, '#/');
      });
  } else {
    toggleLoading();
    Notification('error', errors.join('<br>'));
  }
}

export async function ideaComment(ctx, data) {
  toggleLoading(true);
  const { id, username, newComment, form } = data;
  let idea_data = await kinvey.ideaFindOne(id);
  idea_data.comments.push({
    from: username,
    comment: newComment
  });

  return kinvey.ideaUpdate(idea_data).then(res => {
    toggleLoading();
    resetForm();
    Notification('success', 'Successfully commented an idea .');
    return res;
  });
}

export async function ideaLike(ctx) {
  toggleLoading();
  let idea_data = await kinvey.ideaFindOne(ctx.params.id);
  if (idea_data) {
    idea_data.likes = Number(idea_data.likes) + 1;
    kinvey.ideaUpdate(idea_data).then(() => {
      toggleLoading();
      Notification('success', "You successfully liked an idea!");
      redirect(ctx, `#/idea/${idea_data._id}`)
    })
  }
}

export function ideaDelete(ctx) {
  kinvey.ideaDelete(ctx.params.id).then(() => {
    Notification('success', "Idea deleted successfully")
    redirect(ctx, `#/`)
  })
}