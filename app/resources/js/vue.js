import {createApp} from "vue";
import {createRouter, createWebHashHistory} from 'vue-router';


import Main from "./components/Main";
import Character from "./components/Character";
import Review from "./components/Review";

const app = createApp({});

const routes = [
    {
        path: '/',
        name: 'Main',
        component: Main,
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
// app.component("product-show", Main)
// app.component("product-char", Character)
    app.use(router).mount("#app");
