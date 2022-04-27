grequire("./bootstrap");

// import Vue from "vue";
// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();
window.Vue = require("vue");
Vue.component(
    "example-component",
    require("./components/ExampleComponents").default);

const app = new Vue({ el: "#app" });