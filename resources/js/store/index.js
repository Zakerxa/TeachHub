import { createStore } from 'vuex';
import Review from './modules/review';
import Teacher from './modules/teacher';
import Language from './modules/language';
import Contactus from './modules/contactus';
const store = createStore({
    modules: { Review, Teacher, Language, Contactus },
    state() {
        return {
            auth: localStorage.getItem('auth') || null,
            authUser: null,
            metrics: null
        }
    },
    getters: {
        auth: state => state.auth,
        authUser: state => state.authUser,
        csrf: state => state.csrf,
        metrics: state => state.metrics
    },
    mutations: {
        updateAuthorize(state, payload) {
            if (payload) localStorage.setItem('auth', payload);
            state.auth = localStorage.getItem('auth') || null;
        },
        removeAuthorize(state) {
            localStorage.removeItem('auth');
            state.auth = null;
            state.authUser = null;
        },
        globalMessage(state, payload) {
            state.globalNoti = payload
        },
        updatecsrf(state, payload) {
            state.csrf = payload
        },
    },
    actions: {
        csrf({ state, commit, rootState }) {
            return new Promise((resolve, reject) => {
                fetch('/api/v1/csrf').then(res => res.json()).then(res => {
                    if (res != state.csrf) {
                        console.log("Generate CSRF => ", res)
                        commit('updatecsrf', res)
                        resolve(res);
                    } else reject(state.csrf);
                })
            })
        },
        async getMetrics({ state }) {
            return await fetch('/api/metrics').then(res => res.json()).then(res => state.metrics = res)
        },
    }
});


export default store;