// import * as actions from "../../action-types";
import * as mutations from "../../mutation-types";
// import Axios from "axios";

export default {

    [mutations.SET_CATEGORIES](state, payload) {

        state.categories = payload;

    }
};