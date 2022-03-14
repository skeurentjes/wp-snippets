import { createRouter, createWebHistory } from "vue-router";

export const router = new createRouter({
    base: '/',
    mode: 'history',
    history: createWebHistory(),
    routes: [
        {
            path: '/wordpress/',
            name: 'dashboard',
            component: () => import('./components/Dashboard'),
        },
        {
            path: '/wordpress/posts/:id',
            name: 'post',
            component: () => import('./components/Post'),
        },
    ]
});