

const username = 'guest';
const password = 'guest';
const appUrl = 'https://baas.kinvey.com'
const appKey = 'kid_SyGcJ9NhS';


function handleError(e) {
  if (!e.ok) {
    throw new Error(e.statusText);
  }
  return e;
}

function serializeData(x) {
  return x.json();
}

function sendFetch(httpMethod, section, endpoint, data) {
  const url = `${appUrl}/${section}/${appKey}/${endpoint}`;
  return fetch(url, {
    method: httpMethod,
    headers: {
      'Authorization': `Basic ${btoa(`${username}:${password}`)}`,
      'Content-type': 'application/json'
    },
    body: JSON.stringify(data)
  }
  ).then(handleError).then(serializeData);
}

export let kinvey = {
  books:
  {
    find:
    {
      one: () => {
        return sendFetch('GET', 'appdata', `books/${id}`);
      },
      all: (id) => {
        return sendFetch('GET', 'appdata', 'books');
      }
    },
    create: (data) => {
      return sendFetch('POST', 'appdata', 'books', data);
    },
    del: (id) => {
      return sendFetch("DELETE", 'appdata', `books/${id}`);
    },
    update: (id, data) => {
      return sendFetch("PUT", 'appdata', `books/${id}`, data);
    }
  }
}
