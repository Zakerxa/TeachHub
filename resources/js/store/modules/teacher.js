export default {
    state() {
        return {
            teachers: []
        }
    },
    getters: {
        teachers(state) {
            return state.teachers;
        }
    },
    mutations: {
        loginTimes(state) {
            if (state.loginCount == 5) {
                // console.log("Set Cookie ", state.loginCount);
                state.loginCount = 1;
                cookie.setCookie('loginCount', 'Login Limited', 1 * 60 * 1000);
                state.loginLimit = cookie.getCookie('loginCount');
            }
        },
        clearFilter(state) {
            state.teachers = '';
        }
    },
    actions: {
        gettingTeacher({ commit, state, Rootstate }, payload) {
            return new Promise((resolve, reject) => {
                fetch('/api/teachers/search?', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.json())
                    .then(res => {
                        console.log("Vuex ", res)
                        if (res.message == 'CSRF token mismatch.') reject('CSRF TOKEN MISMATCH');
                        else resolve(state.teachers = res);

                    })
                    .catch(err => reject(commit('registerError', err.errors)))
            })
        },
        defaultTeacher({ commit, state, rootState }) {
            return new Promise((resolve, reject) => {
                fetch('/api/teachers').then(res => res.json())
                    .then(res => state.teachers = res);
            })
        }
    }

}