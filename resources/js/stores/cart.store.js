import { defineStore } from 'pinia';
import http from '../api/http';

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: []
    }),

    actions: {
        async loadCart() {
            // const res = await http.get('/cart');
            // this.items = res.data.data;
        },

        async addToCart(productId) {
            alert(productId);
            // await http.post('/cart/add', {
            //     product_id: productId,
            //     quantity: 1
            // });

            // await this.loadCart();

        }
    }
});