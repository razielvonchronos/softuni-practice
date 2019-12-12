
import { get, post, put, del } from "./requester.js";

export function userRegister(username, password) {
  return post('user', '', { username, password }, 'Basic');
}

export function userLogin(username, password) {
  return post('user', 'login', { username, password }, 'Basic')
}

export function userLogout() {
  return post('user', '_logout', {}, 'Kinvey')
}

export function userTreks(user_id){
  // https://baas.kinvey.com/appdata/app_id/treks?query={"_acl.creator":"${user_id}"}
  return get('appdata', `treks?query={"_acl.creator":"${user_id}"}`, 'Kinvey')
}

export function trekCreate(data) {
  const { location, date, description, image, likes, organizer } = data;
  return post('appdata', 'treks', { location, date, description, image, likes, organizer }, 'Kinvey');
}

export async function trekFindAll() {
  return get('appdata', 'treks', {}, 'Kinvey');
}

export function trekFindOne(id) {
  return get('appdata', `treks/${id}`, {}, 'Kinvey');

}
export function trekUpdate(data) {
  const { _id, location, date, description, image, likes, organizer } = data;
  return put('appdata', `treks/${_id}`, { location, date, description, image, likes, organizer }, 'Kinvey');
}

export function trekDelete(id) {
  return del('appdata', `treks/${id}`, {}, 'Kinvey');
}