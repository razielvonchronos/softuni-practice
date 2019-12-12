import { Notification } from "./utilities.js";

const baseUrl = 'https://baas.kinvey.com';
const appKey = 'kid_HyLYq81RH';
const appSecret = '276fdd77aa4649a58ca8501b3e0ea8c9';

function makeAuth(type) {
    return type === 'Basic'
        ? 'Basic ' + btoa(`${appKey}:${appSecret}`)
        : 'Kinvey ' + sessionStorage.getItem('authtoken');
}

function makeHeaders(method, data, type) {
    const headers = {
        method,
        headers: {
            'Content-Type': 'application/json',
            Authorization: makeAuth(type),
        },
    };

    if (method === 'POST' || method === 'PUT') {
        headers.body = JSON.stringify(data);
    }

    return headers;
}

function handleError(res) {
    if (res.status === 401) {
        Notification('error', 'Invalid credentials. Please retry your request with correct credentials!');
    }
    if (res.status === 404) {
        Notification('error', 'This entity not found in the collection');
    }
    if (res.status === 409) {
        Notification('error', 'This username is already used!');
    }
    if (!res.ok) {
        throw new Error(`Something went wrong! Status: ${res.status}, Status text: ${res.statusText}`);
    }
    if (res.status === 204) {
        return res;
    }
    return res.json();
}

function fetchData(module, endpoint, headers) {
    return fetch(`${baseUrl}/${module}/${appKey}/${endpoint}`, headers)
        .then(handleError);
}

export function get(module, endpoint, type) {
    const headers = makeHeaders('GET', type);
    return fetchData(module, endpoint, headers);
}

export function post(module, endpoint, data, type) {
    const headers = makeHeaders('POST', data, type);
    return fetchData(module, endpoint, headers);
}

export function put(module, endpoint, data, type) {
    const headers = makeHeaders('PUT', data, type);
    return fetchData(module, endpoint, headers);
}

export function del(module, endpoint, type) {
    const headers = makeHeaders('DELETE', type);
    return fetchData(module, endpoint, headers);
}


