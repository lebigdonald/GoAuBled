import Vue from 'vue';

import Vuex from 'vuex';

Vue.use(Vuex);

import booking from './booking';

export default new Vuex.Store({
    strict: true,
    modules: {
        booking,
    },
});
