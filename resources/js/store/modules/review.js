export default {
    data() {
        return {
            reviews: null
        }
    },
    getters: {
        reviews: state => state.reviews,
    },
    mutations: {
        updateReviews(state, payload) {
            console.log("Someone is updating my reviews", payload);
            state.reviews = payload
        },
        addReviews(state, payload) {
            console.log("Adding review");
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
                    .catch(err => reject(commit('loginError', err.errors)))
            })
        },
        getReviews({ state, commit, rootState }) {
            let token = localStorage.getItem("TeachubGlobalReviewToken") ? localStorage.getItem("TeachubGlobalReviewToken") : 'null';
            console.log(token, "MY token ");
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
        },
        deleteReview({ state, commit, rootState }, forms) {
            return new Promise((resolve, reject) => {
                fetch('api/client/deleteReview', {
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
                        console.log(res);
                        if (res.message == 'CSRF token mismatch.') return reject('CSRF token mismatch.');
                        else if (res.response == 'success') return resolve(res.response);
                        else return resolve('error');
                    })
                    .catch(err => reject(commit('loginError', err.errors)))
            })
        }
    }
}