
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

export function userideas(user_id) {
  // https://baas.kinvey.com/appdata/app_id/ideas?query={"_acl.creator":"${user_id}"}
  return get('appdata', `ideas?query={"_acl.creator":"${user_id}"}`, 'Kinvey')
}

export function ideaCreate(data) {
  return post('appdata', 'ideas', data, 'Kinvey');
}

export async function ideaFindAll() {
  return get('appdata', 'ideas', {}, 'Kinvey');
}

export function ideaFindOne(id) {
  return get('appdata', `ideas/${id}`, {}, 'Kinvey');

}
export function ideaUpdate(data) {
  const { _id, name, description, imageURL, organizer, comments, likes } = data;
  return put('appdata', `ideas/${_id}`, { name, description, imageURL, organizer, comments, likes }, 'Kinvey');
}

export function ideaDelete(id) {
  return del('appdata', `ideas/${id}`, {}, 'Kinvey');
}