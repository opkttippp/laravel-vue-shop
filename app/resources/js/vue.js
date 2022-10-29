import {createApp} from "vue";
import {createRouter, createWebHashHistory} from 'vue-router';
import axios from "axios";

import Products from "./components/Products";
import Main from "./components/Main";
import Character from "./components/Character";
import Review from "./components/Review";

const app = createApp({});

const routes = [
    {
        path: '/',
        name: 'Products',
        component: Products,
    },
    {
        path: '/show/:id',
        name: 'Main',
        component: Main,
        props: true
    },
    {
        path: '/char/:id',
        name: 'Character',
        component: Character,
        props: true
    }
    ,
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

app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app')
