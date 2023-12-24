export default {
    state() {
        return {
            perPage: 8,
            teachers: null,
            topTeachers: null,
            teacherCount: null,
            searchCount: null,
            paginations: {
                current_page: 1,
                last_page: '',
                prev_page_url: '',
                next_page_url: '',
                per_page: ''
            },
            filtersQuery: {
                per_page: '',
                page: '',
                name: '',
                region: '',
                townships: '',
                subjects: '',
                status: '',
                environment: ''
            }
        }
    },
    getters: {
        perPage(state) {
            return state.perPage;
        },
        teachers(state) {
            return state.teachers;
        },
        paginations(state) {
            return state.paginations;
        },
        filtersQuery(state) {
            return state.filtersQuery;
        },
        topTeachers(state) {
            return state.topTeachers;
        },
        teacherCount(state) {
            return state.teacherCount;
        },
        searchCount(state) {
            return state.searchCount;
        }
    },
    mutations: {
        updatePerPage(state, res) {
            state.perPage = res;
        },
        updateFiltersQuery(state, res) {
            state.filtersQuery = {
                per_page: '',
                page: '',
                name: res.name,
                region: res.region,
                townships: res.townships,
                subjects: res.subjects,
                status: res.status,
                environment: res.environment
            }
        },
        updatePagination(state, res) {
            state.paginations = {
                current_page: res.current_page,
                last_page: res.last_page,
                prev_page_url: res.prev_page_url,
                next_page_url: res.next_page_url,
                per_page: state.perPage
            }
        },
        clearFilterQuery(state) {
            // state.teachers = '';
            state.filtersQuery = {
                per_page: '',
                page: '',
                name: '',
                region: '',
                townships: '',
                subjects: '',
                status: '',
                environment: ''
            };
            state.searchCount = null;
        }
    },
    actions: {
        gettingTeacher({ commit, state, Rootstate }, payload) {
            // Get Paginate Page Query Before Fetch
            state.filtersQuery.page = payload;
            state.filtersQuery.per_page = state.perPage[0];
            return new Promise((resolve, reject) => {
                fetch('/api/teachers/search', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(state.filtersQuery)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.message == 'CSRF token mismatch.') reject('CSRF TOKEN MISMATCH');
                        else {
                            commit('updatePagination', res.teachers);
                            state.searchCount = res.searchCount;
                            resolve(state.teachers = res.teachers.data);
                        }
                    })
                    .catch(err => reject(commit('registerError', err.errors)))
            })
        },
        defaultTeacher({ commit, state, rootState }, payload) {
            // console.log("Getting Default Teacher . . .")
            return new Promise((resolve, reject) => {
                fetch('/api/teachers' + payload).then(res => res.json())
                    .then(res => {
                        commit('updatePagination', res.teachers)
                        state.teacherCount = res.count;
                        resolve(state.teachers = res.teachers.data);
                    });
            })
        },
        gettingTopTeachers({ commit, state }) {
            // console.log("Getting Top Teacher . . .")
            return new Promise((resolve, reject) => {
                fetch('/api/topteachers').then(res => res.json()).then(res => resolve(state.topTeachers = res.teachers));
            })
        }
    }

}