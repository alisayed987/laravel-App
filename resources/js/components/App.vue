<template>
    <div>
        <nav-bar></nav-bar>
        <h1>{{ title }}</h1>
        <router-view />
        <footer-bar></footer-bar>
    </div>
</template>

<script>
import store from "../store";
import router from "../router";
import CreateAddress from "./apis/CreateAddress.vue";
import UserAddresses from "./apis/UserAddresses.vue";
import NavBar from "./global/NavBar.vue";
import FooterBar from "./global/FooterBar.vue";

export default {
    el: "#app",
    store,
    router,
    components: { NavBar, FooterBar, CreateAddress, UserAddresses },
    data() {
        return {
            title: "App Vuex",
        };
    },
};
</script>

<style>
h1 {
    text-align: center;
}
</style>
