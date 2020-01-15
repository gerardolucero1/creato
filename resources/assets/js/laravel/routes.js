import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./views/Home.vue').default,
        },
        {
            path: '/about',
            name: 'about',
            component: require('./views/About.vue').default,
        },
        {
            path: '*',
            component: require('./views/Home.vue').default,
        },
    ],
    //mode: 'history',
})