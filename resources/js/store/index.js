import { createStore } from 'vuex';
import Review from './modules/review';
import Teacher from './modules/teacher';
import Language from './modules/language';
const store = createStore({
    modules: { Review, Teacher, Language },
    state() {
        return {
            auth: localStorage.getItem('auth') || null,
            authUser: null,
            reviews: null
        }
    },
    getters: {
        auth: state => state.auth,
        authUser: state => state.authUser,
        reviews: state => state.reviews
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
        updateReviews(state, payload) {
            console.log("Someone is updating my reviews");
            state.reviews = payload
        }
    },
    actions: {
        csrf({ state, commit, rootState }) {
            return new Promise((resolve, reject) => {
                fetch('api/v1/csrf').then(res => res.json()).then(res => {
                    if (res != state.csrf) {
                        console.log("Generate CSRF => ", res)
                        commit('updatecsrf', res)
                        resolve(res);
                    } else reject(state.csrf);
                })
            })
        }
    }
});


export default store;