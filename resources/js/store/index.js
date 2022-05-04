import { createApp } from "vue";
import Vuex from "vuex";
// import { createStore } from "vuex";

const app = createApp({});
// createApp.use(Vuex);

app.use(Vuex);
export default new Vuex.Store({
    modules: {},
});