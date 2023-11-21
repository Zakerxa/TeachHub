import { createStore } from 'vuex';


const store = createStore({

    state() {
        return {
            auth: localStorage.getItem('auth') || null,
            globalNoti: '',
            authUser: null
        }
    },
    getters: {
        auth(state) {
            return state.auth;
        },
        authUser(state) {
            return state.authUser;
        },
        globalNoti(state) {
            return state.globalNoti;
        }
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
        }
    }
});


export default store;