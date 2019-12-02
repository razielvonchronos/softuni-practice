

const username = 'razielvonchronos';
const password = 's120023s';
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

function makeHeaders(httpMethod, data) {
  let headers = {
    method: httpMethod,
    headers: {
      'Authorization': `Basic ${btoa(`${username}:${password}`)}`,
    },
  }

  if (httpMethod !== 'GET') {
    headers.headers['Content-type'] = 'application/json';
  }

  if (httpMethod === "POST" || httpMethod === "PUT") {
    headers.body = JSON.stringify(data)
  }
  return headers;
}

function sendFetch(method, module, endpoint, data = {}) {
  const headers = makeHeaders(method, data);
  const url = `${appUrl}/${module}/${appKey}/${endpoint}`;
  return fetch(url, headers).then(handleError).then(serializeData);
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
      return sendFetch('POST', 'appdata', data);
    },
    del: (id) => {
      return sendFetch("DELETE", 'appdata', `books/${id}`);
    },
    update: (id, data) => {
      return sendFetch("PUT", 'appdata', `books/${id}`, data);
    }
  }
}
