import { createRouter, createWebHistory } from 'vue-router';

import HomePage from '../src/pages/home/HomePage.vue';
import CartPage from '../src/pages/cart/CartPage.vue';

const routes = [
    { path: '/', component: HomePage },
    { path: '/cart', component: CartPage },
];

export default createRouter({
    history: createWebHistory(),
    routes
});