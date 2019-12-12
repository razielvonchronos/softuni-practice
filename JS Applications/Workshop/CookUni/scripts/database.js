
import { get, post, put, del } from "./requester.js";

export function userRegister(data) {
  return post('user', '', data, 'Basic');
}

export function userLogin(username, password) {
  return post('user', 'login', { username, password }, 'Basic')
}

export function userLogout() {
  return post('user', '_logout', {}, 'Kinvey')
}

export async function recipeFindAll() {
  return get('appdata', 'recipes', {}, 'Kinvey');
}

export function recipeFindOne(id) {
  return get('appdata', `recipes/${id}`, {}, 'Kinvey');
}

export function recipeCreate(data) {
  return post('appdata', 'recipes', data, 'Kinvey');
}

export function recipeUpdate(data) {
  const { _id, meal, ingredients, prepMethod, description, foodImageURL, category, categoryImageURL, likesCounter } = data;
  return put('appdata', `recipes/${_id}`, { meal, ingredients, prepMethod, description, foodImageURL, category, categoryImageURL, likesCounter }, 'Kinvey');
}

export function recipeDelete(id) {
  return del('appdata', `recipes/${id}`, {}, 'Kinvey');
}