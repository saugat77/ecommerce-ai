import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap'; 

import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
// Main root component
import App from './src/App.vue';

// Global CSS
import '../css/app.css';

// Create Vue app
const app = createApp(App);

// State management
app.use(createPinia());

app.component('Swiper', Swiper)
app.component('SwiperSlide', SwiperSlide)
// Router
app.use(router);

// Mount app
app.mount('#app');