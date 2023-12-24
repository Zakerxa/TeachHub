export default {
    data() {
        return {
            reviews: null,
            teareviews: null
        }
    },
    getters: {
        reviews: state => state.reviews,
        teareviews: state => state.teareviews
    },
    mutations: {
        updateTeaReviews(state, payload) {
            // console.log("Updating Tr.Reviews", payload);
            state.teareviews = payload
        },
        addTeaReviews(state, payload) {
            // console.log("Adding Tea Review");
            state.teareviews.push(payload);
        },
        updateReviews(state, payload) {
            // console.log("Updating Global.Reviews", payload);
            state.reviews = payload
        },
        addReviews(state, payload) {
            // console.log("Adding review");
            state.reviews.push(payload);
        }
    },
    actions: {
        postReview({ state, commit, rootState }, forms) {
            return new Promise((resolve, reject) => {
                fetch('/api/client/review', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(forms)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.response == 'success') {
                            commit('addReviews', res.data);
                            return resolve(res);
                        } else return resolve('error');
                    })
                    .catch(err => reject(res));
            })
        },
        postTeaReview({ state, commit, rootState }, forms) {
            return new Promise((resolve, reject) => {
                fetch('/api/client/teareview', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(forms)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.response == 'success') {
                            commit('addTeaReviews', res.data);
                            return resolve(res);
                        } else return resolve('error');
                    })
                    .catch(err => reject(err))
            })
        },
        getReviews({ state, commit, rootState }) {
            let token = localStorage.getItem("TeachubGlobalReviewToken") ? localStorage.getItem("TeachubGlobalReviewToken") : 'null';
            // console.log(token, "MY token ");
            return new Promise((resolve, reject) => {
                fetch('/api/client/reviews/' + token, {
                        method: 'get',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                        },
                        credentials: "same-origin"
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.data) {
                            commit('updateReviews', res.data);
                            return resolve(res.data);
                        } else return resolve('error');
                    })
                    .catch(err => reject('error'))
            })
        },
        getTeaReviews({ state, commit, rootState }, payload) {
            let token = localStorage.getItem("TeachubGlobalReviewToken") ? localStorage.getItem("TeachubGlobalReviewToken") : 'null';
            // console.log(token, "MY token ");
            return new Promise((resolve, reject) => {
                fetch('/api/client/teareviews/' + token + '/' + payload, {
                        method: 'get',
                        headers: {
                            "Content-Type": 'application/json',
                        },
                        credentials: "same-origin"
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.data) {
                            commit('updateTeaReviews', res.data);
                            return resolve(res.data);
                        } else return resolve('error');
                    })
                    .catch(err => reject('error', err))
            })
        },
        requestReview({ state, commit, rootState }, forms) {
            return new Promise((resolve, reject) => {
                fetch('api/client/requestReview', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(forms)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.response == 'correct') return resolve(res.response);
                        else return resolve(res.response);
                    })
                    .catch(err => reject(commit('loginError', err.errors)))
            })
        }
    }
}