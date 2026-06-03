import http from './http';

export const ProductAPI = {
    list: (params = {}) => http.get('/products',{params}),
};