import {createRouter, createWebHistory} from 'vue-router';

import Products from "../../vue/views/Products";
import Show from "../../vue/views/Show";
import Character from "../../vue/views/Character";
import Review from "../../vue/views/Review";

const routes = [

    {
        path: '/product',
        name: 'Products',
        component: Products,
    },
    {
        path: '/product/show/:id',
        name: 'Show',
        component: Show,
        props: true,
    },
    {
        path: '/product/char/:id',
        name: 'Character',
        component: Character,
        props: true
    },
    {
        path: '/product/review/:id',
        name: 'Review',
        component: Review,
        props: true
    }
    ];


    const router = createRouter({
        history: createWebHistory(process.env.BASE_URL),
        routes,
    })

    export default router;
