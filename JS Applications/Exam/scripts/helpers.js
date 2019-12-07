
import { get, post, put, del } from "./requester.js";

export function showNotification(type, msg) {
  let notification = document.getElementById(`${type}Box`);
  notification.style.display = 'block';
  notification.textContent = msg;
  setTimeout(() => {
    notification.style.display = 'none';
    notification.textContent = '';
  }, 3000);
}