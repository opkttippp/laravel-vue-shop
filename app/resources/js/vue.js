import {createApp} from "vue";
import {createRouter, createWebHashHistory} from 'vue-router';
import axios from "axios";

import Product from "./components/Product";
import Main from "./components/Main";
import Character from "./components/Character";
import Review from "./components/Review";

const app = createApp({});

const routes = [
    {
        path: '/',
        name: 'Product',
        component: Product,
    },
    {
        path: '/show/:id',
        name: 'Main',
        component: Main,
        props: true
    },
    {
        path: '/char',
        name: 'Character',
        component: Character,
    },
    {
        path: '/review',
        name: 'Review',
        component: Review,
    }
    ];

    const router = createRouter({
        history: createWebHashHistory(),
        routes,
    })

    app.use(router)
    app.config.globalProperties.axios = axios
    app.mount('#app')
