import {createApp} from "vue";
import {createRouter, createWebHashHistory} from 'vue-router';


import Main from "./components/Main";
import Character from "./components/Character";

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
    }
    ];

    const router = createRouter({
        history: createWebHashHistory(),
        routes,
    })
// app.component("product-show", Main)
// app.component("product-char", Character)
    app.use(router).mount("#app");
