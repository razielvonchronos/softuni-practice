
export function toggleLoading(show = false) {
  let loadingBox = document.getElementById('loadingBox');
  loadingBox.style.display = show ? 'block' : 'none';
}

export function Notification(type, msg, ms = 3000) {
  let notification = document.getElementById(`${type}Box`);
  notification.style.display = 'block';
  notification.innerHTML = msg;
  setTimeout(() => {
    notification.style.display = 'none';
    notification.innerHTML = '';
  }, ms);
}

export function redirect(context, path, ms) {
  setTimeout(() => {
    context.redirect(path)
  }, ms)
}

export function saveAuth(userInfo) {
  localStorage.setItem('authtoken', userInfo._kmd.authtoken);
  localStorage.setItem('user_id', userInfo._id);
  localStorage.setItem('username', userInfo.username);
}