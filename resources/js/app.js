import { createApp } from "vue";
require("./bootstrap");

// Alpine.start();
// window = require("vue");

const app = createApp({});

app.component(
    "example-component",
    require("./components/ExampleComponents").default
);

app.mount("#app");
