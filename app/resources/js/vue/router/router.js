import {createRouter, createWebHistory} from 'vue-router';

import Home from "../../vue/views/Home";
import VerifyMail from "../../vue/views/VerifyMail"
import Login from "../../vue/views/Login";
import Category from "../../vue/views/Category";
import Catalog from "../../vue/views/Catalog";
import Product from "../../vue/views/Product";
import Filter from "../../vue/views/Filter";
import Show from "../../vue/views/Show";
import Character from "../../vue/views/Character";
import Review from "../../vue/views/Review";
import Chat from "../../vue/views/Chat";

const routes = [

    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/verificationMail',
        name: 'VerifyMail',
        component: VerifyMail,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/category',
        name: Category,
        component: Category,
    }, {
        path: '/catalog',
        name: Catalog,
        component: Catalog,
    },
    {
        path: '/product',
        name: Product,
        component: Product,
    },
    {
        path: '/product/filter',
        name: 'Filter',
        component: Filter
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
    },
    {
        path: '/chat',
        name: 'Chat',
        component: Chat,
    },
    {
        path: '/auth/:provider/callback',
        component: {
            template: '<div class="auth-component"></div>'
        }
    },
    ];


    const router = createRouter({
        history: createWebHistory(process.env.BASE_URL),
        routes,
    })

    export default router;
