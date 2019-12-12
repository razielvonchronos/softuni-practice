
import { get, post, put, del } from "./requester.js";
import * as kinvey from "./database.js";
import { Notification, redirect, saveAuth, toggleLoading } from "./utilities.js";

import * as Data from './data.js';

export function UserValidation(data) {
  const { firstName, lastName, username, password, repeatPassword } = data;
  let errors = []
  if (firstName.length < 2 || lastName.length < 2) {
    errors.push('The first and last name should be at least 2 characters long')
  }
  if (username.length < 3) {
    errors.push('The username should be at least 3 characters long');
  }
  if (password.length < 6) {
    errors.push('The password should be at least 6 characters long');

  }
  if (password !== repeatPassword) {
    errors.push('The repeat password should be equal to the password');
  }
  return errors;
}

export function recipeValidation(data) {

  const { meal, ingredients, prepMethod, description, foodImageURL, category } = data;
  let errors = []
  if (meal.length < 4) {
    errors.push('The meal ("string") should be at least 4 characters long')
  }
  if (ingredients.split(',').length < 2) {
    errors.push('The ingredients ("array") should at least 2 (2 elements/2 ingredients)');
  }
  if (prepMethod.length < 10 || description.length < 10) {
    errors.push('The preparation method and description ("strings") should be at least 10 characters long each');
  }
  if (!foodImageURL.startWith('http://') && !foodImageURL.startWith('https://')) {
    errors.push('foodImageURL should start either with http or https'); ДФ
  }
  if (!Object.keys(Data.categories).includes(category)) {
    errors.push('Invalid category');
  }
  return errors;
}

export function Register(ctx) {
  toggleLoading();
  const errors = UserValidation(ctx.params);
  if (errors.length === 0) {
    const { firstName, lastName, username, password } = ctx.params;
    kinvey.userRegister({ firstName, lastName, username, password }).then(userInfo => {
      saveAuth(userInfo);
      Notification('success', 'User registration successful.', 1000);
      toggleLoading();
      redirect(ctx, '/#/', 1000);
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
    Notification('success', 'Successfully logged user.', 1000);
    toggleLoading();
    redirect(ctx, '#/', 1000);
  });
}

export function Logout(ctx) {
  toggleLoading(true);
  kinvey.userLogout().then(() => {
    sessionStorage.clear();
    Notification('success', 'Successfully logged out.', 1000);
    toggleLoading();
    redirect(ctx, '#/', 1000);
  })
}

export function recipeCreate(ctx) {
  toggleLoading(true);
  const errors = recipeValidation(ctx.params);
  if (errors.length === 0) {
    const { meal, ingredients, prepMethod, description, foodImageURL, category } = ctx.params;
    const ingredients_array = ingredients.split(',').map(x => x.trim());
    kinvey.recipeCreate({ meal, ingredients: ingredients_array, prepMethod, description, foodImageURL, category, categoryImageURL: Data.categories[category], likesCounter: 0 })
      .then(() => {
        Notification('success', 'Recipe shared successfully.', 1000);
        toggleLoading();
        redirect(ctx, '#/', 1000);
      });
  } else {
    toggleLoading();
    Notification('error', errors.join('<br>'));
  }
}

export function recipeEdit(ctx) {
  toggleLoading(true);
  const errors = recipeValidation(ctx.params);
  if (errors.length === 0) {
    const { id, meal, ingredients, prepMethod, description, foodImageURL, category, likesCounter } = ctx.params;
    const ingredients_array = ingredients.split(',').map(x => x.trim());
    kinvey.recipeUpdate({ _id: id, meal, ingredients: ingredients_array, prepMethod, description, foodImageURL, category, categoryImageURL: Data.categories[category], likesCounter })
      .then(res => {
        Notification('success', "successfully edited recipe", 1000);
        toggleLoading();
        redirect(ctx, `#/`, 1000)
      })
  } else {
    toggleLoading();
    Notification('error', errors.join('<br>'));
  }
}

export function recipeArchive(ctx) {
  toggleLoading(true);
  kinvey.recipeDelete(ctx.params.id).then(() => {
    Notification('success', "Your recipe was archived", 1000);
    toggleLoading();
    redirect(ctx, `#/`, 1000)
  })
}

export async function recipeLike(ctx) {
  toggleLoading(true);
  let { _id, meal, ingredients, prepMethod, description, foodImageURL, category, categoryImageURL, likesCounter } = await kinvey.recipeFindOne(ctx.params.id);
  kinvey.recipeUpdate({ _id, meal, ingredients, prepMethod, description, foodImageURL, category, categoryImageURL, likesCounter: Number(likesCounter) + 1 })
    .then((res) => {
      Notification('success', "You liked that recipe", 1000);
      toggleLoading();
      redirect(ctx, `#/recipe/${_id}`, 1000);
    })
}