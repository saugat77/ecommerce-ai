import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap'; 
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/vue-splide/css'


// Main root component
import App from './src/App.vue';

// Global CSS
import '../css/app.css';

// Create Vue app
const app = createApp(App);

// State management
app.use(createPinia());
app.component('Splide', Splide)
app.component('SplideSlide', SplideSlide)
// Router
app.use(router);

// Mount app
app.mount('#app');