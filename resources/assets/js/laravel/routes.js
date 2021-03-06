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
            path: '/contact',
            name: 'contact',
            component: require('./views/Contact.vue').default,
        },
        {
            path: '/projects',
            name: 'projects',
            component: require('./views/Projects.vue').default,
        },
        {
            path: '/projects/:id',
            name: 'project',
            component: require('./views/Project.vue').default,
            props: true,
        },
        {
            path: '*',
            component: require('./views/Home.vue').default,
        },
    ],
    //mode: 'history',
})