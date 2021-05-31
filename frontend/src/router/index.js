import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../components/Home'
import Login from '../components/Login'
import Register from '../components/Register'
import Forgot from '../components/Forgot'
import Reset from '../components/Reset'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/login',
            component: Login
        },
        {
            path: '/register',
            component: Register
        },
        {
            path: '/forgot',
            component: Forgot
        },
        {
            path: '/reset/:token',
            component: Reset
        }
    ]
})