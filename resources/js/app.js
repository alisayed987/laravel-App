import "bootstrap"
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap"
import Vue from "vue";
import App from "./components/App.vue";
import store from "./store";

window.addEventListener("load", function () {
    console.log("started")
    new Vue(App);
});
