<template>
  <div class="container-lg">
    <nav-bar></nav-bar>
    <router-view />
    <!-- <create-address></create-address> -->
    <footer-bar></footer-bar>
  </div>
</template>

<script>
console.log("app vue");
import NavBar from "./global/NavBar.vue";
import FooterBar from "./global/FooterBar.vue";
import CreateAddress from "./apis/CreateAddress.vue";
import router from "../router";

export default {
  el: "#app",
  router,
  data() {
    return {
      title: "Root Component",
    };
  },
  components: { NavBar, FooterBar, CreateAddress },
};
</script>

<style scoped>
.container-lg {
  max-width: 100%;
}
</style>