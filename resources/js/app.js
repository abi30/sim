// require("./bootstrap");

// window.Vue = require('vue').default;

// Vue.component('Example-component', require('./components/ExampleComponents').default);


// const app = new Vue({
//     el: "#app"
// });
import { createApp } from "vue";
require("./bootstrap");

let app = createApp({
    el: "#app"
});

app.component(
    "Example-component",
    require("./components/ExampleComponents").default
);

// app.mount("#app");