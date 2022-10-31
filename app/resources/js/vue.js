import {createApp} from "vue";

import {createRouter, createWebHashHistory, createWebHistory} from 'vue-router';
import axios from "axios";
import store from './vue/store/store';
import "bootstrap/dist/js/bootstrap.bundle.min";

import App from "./vue/App";
import Products from "./vue/views/Products";
import Show from "./vue/views/Show";
import Character from "./vue/views/Character";
import Review from "./vue/views/Review";
import CartButton from "./vue/components/Cart/CartButton";
import CartModal from "./vue/components/Cart/CartModal";

const app = createApp({App});

app.component("cart-button", CartButton);
app.component("cart-modal", CartModal);

const routes = [

    {
        path: '/',
        name: 'Products',
        component: Products,
        props: true,
    },
    {
        path: '/show/:id',
        name: 'Show',
        component: Show,
        props: true,
    },
    {
        path: '/char/:id',
        name: 'Character',
        component: Character,
        props: true
    },
    {
        path: '/review/:id',
        name: 'Review',
        component: Review,
        props: true
    }
    ];


    const router = createRouter({
        history: createWebHashHistory(),
        routes,
    })
    app.use(store)
    app.use(router)
    app.config.globalProperties.axios = axios
    app.mount('#app')
