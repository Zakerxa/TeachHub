<template>
    <div class="explore-container container-fluid">
        <div class="row justify-content-center p-0 m-0">
            <!-- EXplore Title -->
            <div class="col-12 text-center">
                <h3 class="content-title" v-html="$t('explore.title')"> </h3>
            </div>

            <!-- Multi Filter Section & Search -->
            <MultiFilter />

        </div>
    </div>

    <!-- Teacher List Filters -->
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-6 col-lg-3 p-0 p-sm-1 p-md-2 p-lg-3" v-for="teacher in teachers">
                <div class="row p-0">
                    <div class="col-6 col-md-12">
                        <img width="100%" src="/images/hero.png" class="teacher-image" alt="...">
                    </div>
                    <div class="col-6 col-md-12 p-0">
                        <div class="specialist mt-2 mb-2">
                            <span v-for="subject in teacher.subjects" class="bg-warning badge mr-2">{{ subject.name }}</span>
                        </div>
                        <span class="location" v-for="loc in teacher.locations">
                            - {{ loc.township_mm }}
                        </span>
                        <p class="teacher-name pt-2">{{ teacher.name }}</p>
                        <div>
                            <div class="teacher-time"><font-awesome-icon icon="fa-solid fa-calendar-days" />
                                {{ teacher.time_table_1 }}</div>
                            <div class="teacher-time"><font-awesome-icon icon="fa-solid fa-calendar-days" />
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
    computed: mapGetters(['teachers', 'paginations', 'filtersQuery']),
    methods: {

        ...mapActions(['defaultTeacher', 'gettingTeacher']),

        ...mapMutations(['updatePerPage']),

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

.content-title {
    font-size: 3.8vw;
    font-weight: bold;
    position: relative;
    padding: 30px 0;
}

.teacher-time {
    font-size: 13px;
    color: #555;
}

.teacher-image {
    width: 100%;
}
</style>
