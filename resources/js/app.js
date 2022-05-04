import { createApp } from "vue";
require("./bootstrap");

// Alpine.start();
// window = require("vue");

const app = createApp({});

app.component(
    "example-component",
    require("./components/ExampleComponents").default
);
app.component(
    "product-add",
    require("./components/products/ProductAdd").default
);

import store from "./store";

app.mount("#app", store);