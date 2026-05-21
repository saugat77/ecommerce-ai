import { defineStore } from 'pinia';
import http from '../api/http';

export const useProductStore = defineStore('product', {
    state: () => ({
        products: [],
        loading: false
    }),

    actions: {
        async fetchProducts() {
            this.loading = true;
            const res = await http.get('/products');
            this.products = res.data.data;
            this.loading = false;
        }
    }
});