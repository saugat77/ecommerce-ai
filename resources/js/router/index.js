import { createRouter, createWebHistory } from 'vue-router';

// Pages
import HomePage from '../src/pages/home/HomePage.vue';
import CartPage from '../src/pages/cart/CartPage.vue';
import Login from '../src/pages/auth/Login.vue';
// import Dashboard from '../src/pages/admin/Dashboard.vue';
import NotFound from '../src/pages/NotFound.vue';

const routes = [
    // 🌐 Public routes
    {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/cart',
        name: 'cart',
        component: CartPage
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },

    // 🔐 Protected routes (admin / inventory system)
    // {
    //     path: '/dashboard',
    //     name: 'dashboard',
    //     component: Dashboard,
    //     meta: { requiresAuth: true }
    // },
     {
        path: '/:pathMatch(.*)*',
        name: 'not-found',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


// 🔐 AUTH GUARD (VERY IMPORTANT)
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');

    // If route requires auth
    if (to.meta.requiresAuth && !token) {
        next({ name: 'login' });
    }

    // If user already logged in and tries to access login
    else if (to.name === 'login' && token) {
        next({ name: 'dashboard' });
    }

    else {
        next();
    }
});

export default router;