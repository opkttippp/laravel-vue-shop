import {createRouter, createWebHashHistory} from 'vue-router';

import Products from "../../vue/views/Products";
import Show from "../../vue/views/Show";
import Character from "../../vue/views/Character";
import Review from "../../vue/views/Review";

const routes = [

    {
        path: '/',
        name: 'Products',
        component: Products,
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

    export default router;
