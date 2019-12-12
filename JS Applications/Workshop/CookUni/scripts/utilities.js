
export function toggleLoading(show = false) {
  let loadingBox = document.getElementById('loadingBox');
  loadingBox.style.display = show ? 'block' : 'none';
}

export function Notification(type, msg, ms = 1000) {
  let notification = document.getElementById(`${type}Box`);
  notification.style.display = 'block';
  notification.innerHTML = msg;
  setTimeout(() => {
    notification.style.display = 'none';
    notification.innerHTML = '';
  }, ms);
}

export function redirect(context, path, ms = 1000) {
  setTimeout(() => {
    context.redirect(path)
  }, ms)
}

export function saveAuth(userInfo) {
  sessionStorage.setItem('authtoken', userInfo._kmd.authtoken);
  sessionStorage.setItem('user_id', userInfo._id);
  sessionStorage.setItem('username', userInfo.username);
  sessionStorage.setItem('fullName', `${userInfo.firstName} ${userInfo.lastName}`)
}