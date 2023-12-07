<template>
    <div class="explore-container container-fluid">
        <div class="row justify-content-center text-center p-0 m-0">
            <!-- EXplore Title -->
            <div class="ml-5 ml-sm-0 col-12 text-center">
                <h3 class="ml-3 ml-sm-0 content-title" v-html="$t('explore.title')"> </h3>
            </div>

            <!-- Multi Filter Section & Search -->
            <MultiFilter />

        </div>
    </div>

    <!-- Teacher List Filters -->
    <div class="container pt-5 mt-3">
        <div class="row justify-content-center gx-4 gy-3">
            <div class="text-center col-11 col-md-5 col-lg-4 col-xl-3" style="cursor: pointer;" v-for="teacher in teachers">

                <div @click="routeTo(teacher.id)" class="row justify-content-start">
                    <div class="col-6 col-md-12 text-start">
                        <img width="100%" src="/images/hero.png" class="teacher-image" alt="...">
                    </div>
                    <div class="col-6 col-md-12 text-start">
                        <div class="specialist mt-2 mb-2">
                            <span v-for="subject in teacher.subjects" class="bg-warning badge mr-2">
                                {{ (lang == 'English') ? subject.name : subject.name_mm  }}
                            </span>
                        </div>
                        <p class="teacher-name pt-2">{{ teacher.name }}</p>
                        <div>
                            <div class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-calendar-days" />
                                {{ teacher.time_table_1 }}</div>
                            <div class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-calendar-days" />
                                {{ teacher.time_table_2 }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Pagination -->
        <div class="row jsutify-content-center pb-4 pt-4">
            <div v-if="paginations" class="col-12 mb-5 mt-4 text-center">
                <vue-pagination @event="vuePaginate" :meta-data="paginations" :onSides="1" :style="style"></vue-pagination>
            </div>
        </div>


    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
import MultiFilter from './MultiFilter.vue';
export default {
    data() {
        return {
            items: [4],
            style: {
                color: 'rgb(106, 106, 114)',
                activeColor: '#fff',
                background: '#fff',
                activeBackground: '#8642DE',
                fontFamily: 'sans-serif',
                hover: '#8642DE 1px -1px 5px inset',
                border: '0.5px solid #6644DE',
                borderBar: '1px solid #6644DE',
                next: '&raquo;',
                prev: '&laquo;'
            }
        }
    },
    components: { MultiFilter },
    computed: mapGetters(['teachers', 'paginations', 'filtersQuery', 'lang']),
    methods: {

        ...mapActions(['defaultTeacher', 'gettingTeacher']),

        ...mapMutations(['updatePerPage']),

        routeTo(id) {
            this.$router.push({ name: 'details', params: { id } });
        },

        vuePaginate(e) {

            location.href = '#filter-teacher';

            if (Object.values(this.filtersQuery).some(value => value !== '')) this.gettingTeacher(e[0]);

            else this.defaultTeacher('?page=' + e[0] + e[1]);

        }
    },
    created() {
        this.updatePerPage(this.items);
        this.defaultTeacher('?page=1&per_page=' + this.items);
    }
}
</script>


<style lang="scss">
.explore-container {
    background-color: var(--bg);
    padding: 30px 0;
}


.teacher-time {
    font-size: 13px;
    color: #555;
}

.teacher-image {
    width: 100%;
}

.content-title {
    font-weight: 900;
    font-family: sans-serif, Courier, monospace;
    font-size: 3.4vw;
    line-height: 5vw;
    align-items: center;
    margin-bottom: 20px;
    padding: 0;
}


@media screen and (min-width:300px) and (max-width : 375px) {
    .content-title {
        font-size: 5vw;
    }
}

@media screen and (min-width:376px) and (max-width : 500px) {
    .content-title {
        font-size: 7vw;
    }
}

@media screen and (min-width:501px) and (max-width : 767px) {
    .content-title {
        font-size: 5vw;
    }
}
</style>
