
import { get, post, put, del } from "./requester.js";
import * as kinvey from "./database.js";
import { Notification, redirect, saveAuth, toggleLoading } from "./utilities.js";

export function UserValidation(data) {
  const { username, password, rePassword } = data;
  let errors = []
  if (username.length < 3) {
    errors.push('The username should be at least 3 characters long');
  }
  if (password.length < 6) {
    errors.push('The password should be at least 6 characters long');

  }
  if (password !== rePassword) {
    errors.push('The repeat password should be equal to the password');
  }
  return errors;
}

export function TrekValidation(data) {
  const { location, description } = data;
  let errors = []
  if (location.length < 6) {
    errors.push('The trek name should be at least 6 characters long');
  }
  if (description.length < 10) {
    errors.push('The description should be at least 10 characters long');
  }
  return errors;
}

export function Register(ctx) {
  toggleLoading();
  const errors = UserValidation(ctx.params);
  if (errors.length === 0) {
    const { username, password } = ctx.params;
    kinvey.userRegister(username, password).then(userInfo => {
      saveAuth(userInfo);
      console.log(userInfo)
      toggleLoading();
      Notification('success', 'Successfully registered user.', 2000);
      redirect(ctx, '/#/', 2000);
    });
  } else {
    Notification('error', errors.join('<br>'));
  }
}

export function Login(ctx) {
  toggleLoading(true);
  const { username, password } = ctx.params;
  kinvey.userLogin(username, password).then(userInfo => {
    saveAuth(userInfo);
    toggleLoading();
    Notification('success', 'Successfully logged user.', 2000);
    redirect(ctx, '#/', 2000);
  });
}

export function Logout(ctx) {
  toggleLoading(true);
  kinvey.userLogout().then(() => {
    localStorage.clear();
    toggleLoading();
    Notification('success', 'Successfully logged out.', 2000);
    redirect(ctx, '#/', 2000);
  })
}

export function trekCreate(ctx) {
  toggleLoading(true);
  const errors = TrekValidation(ctx.params);
  if (errors.length === 0) {
    const username = localStorage.getItem('username');
    const { location, dateTime, description, imageURL } = ctx.params;
    kinvey.trekCreate({ location, date: dateTime, description, image: imageURL, likes: 0, organizer: username })
      .then(res => {
        toggleLoading();
        Notification('success', 'Trek created successfully.', 2000);
        redirect(ctx, '#/', 2000);
      });
  } else {
    toggleLoading();
    Notification('error', errors.join('<br>'));
  }
}

export function trekEdit(ctx) {
  toggleLoading(true);
  const errors = TrekValidation(ctx.params);
  if (errors.length === 0) {
    const { id, location, dateTime, description, imageURL, likes, organizer } = ctx.params
    kinvey.trekUpdate({ _id: id, location, date: dateTime, description, image: imageURL, likes, organizer })
      .then(res => {
        toggleLoading();
        Notification('success', "Trek edited successfully")
        redirect(ctx, `#/`, 2000)
      })
  } else {
    toggleLoading();
    Notification('error', errors.join('<br>'));
  }
}