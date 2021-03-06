import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            component: () => import('./template/Template'),
            children: [
                {
                    path: '',
                    name: 'Index',
                    component: () => import('./pages')
                },
            ]
        },
    ]
});

export default router;
