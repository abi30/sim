import { createApp } from "vue";
import Vuex from "vuex";
// import { createStore } from "vuex";

const app = createApp({});
// createApp.use(Vuex);

app.use(Vuex);

import categories from "./modules/categories";
export default new Vuex.Store({
    modules: { categories },
});