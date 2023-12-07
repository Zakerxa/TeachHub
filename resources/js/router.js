import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./views/Home.vue').default
    },
    {
        path: "/explore",
        name: "explore",
        component: require('./views/Explore.vue').default
    },
    {
        path: "/detail/:id",
        name: "details",
        component: require('./views/Details.vue').default,
        props: true
    },
    {
        path: "/contact",
        name: "contact",
        component: require('./views/ContactUs.vue').default
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: require('./components/PageNotFound.vue').default
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASH_URL),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active"
});

export default router;