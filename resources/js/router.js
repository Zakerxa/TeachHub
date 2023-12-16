import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./views/Home.vue').default
    },
    {
        path: "/explore",
        name: "explore",
        component: () =>
            import ('./views/Explore.vue')
    },
    {
        path: "/detail/:id",
        name: "details",
        component: () =>
            import ('./views/Details.vue'),
        props: true
    },
    {
        path: "/contact",
        name: "contact",
        component: () =>
            import ('./views/ContactUs.vue')
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: () =>
            import ('./components/PageNotFound.vue')
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASH_URL),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
            }
        } else {
            // Default behavior for other routes
            return savedPosition || { top: 0 };
        }
    },
});

export default router;
