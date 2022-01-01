import Vue from "vue";
import Router from "vue-router";
import CreateAddress from "./components/apis/CreateAddress.vue";
import UserAddresses from "./components/apis/UserAddresses.vue";

Vue.use(Router);

const routes = [
    {
        path: "/",
        name: "Home",
        component: {
            template: "<router-view/>",
        },
        children: [
            {
                path: "CreateAddress",
                name: "CreateAddress",
                component: CreateAddress,
            },
            {
                path: "UserAddresses",
                name: "UserAddresses",
                component: UserAddresses,
            },
        ],
    },
];

export default new Router({
    routes,
});
