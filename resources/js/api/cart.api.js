import http from './http';

export const CartAPI = {
    get: () => http.get('/cart'),
    add: (data) => http.post('/cart/add', data),
};