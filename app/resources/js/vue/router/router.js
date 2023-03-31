import {createRouter, createWebHistory} from 'vue-router';

import Home from "../../vue/views/Home";
import VerifyMail from "../../vue/views/VerifyMail"
import Register from "../../vue/views/Register";
import Login from "../../vue/views/Login";
import Products from "../../vue/views/Products";
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
        path: '/register',
        name: 'Register',
        component: Register,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/product',
        component: Products,
        name: Products,
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
    ];


    const router = createRouter({
        history: createWebHistory(process.env.BASE_URL),
        routes,
    })

    export default router;
