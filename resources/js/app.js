import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "jquery";
import "popper.js";
import App from "./components/App.vue";

window.Vue = require("vue").default;
// Vue.component("App", require("./components/App.vue").default);

// Vue.component("nav-bar", require("./components/global/NavBar.vue").default);
// Vue.component(
//     "footer-bar",
//     require("./components/global/FooterBar.vue").default
// );

window.addEventListener("load", function () {
    // const app = new Vue({
    //     el: "#app",
    //     router: Router,
    //     components: { "app-main": App },
    // });
    const app = new Vue(App);
});
