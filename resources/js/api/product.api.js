import http from './http';

export const ProductAPI = {
    list: () => http.get('/products'),
};