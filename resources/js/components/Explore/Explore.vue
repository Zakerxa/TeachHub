<template lang="">
    <div class="explore-container container-fluid">
       <div class="row justify-content-center p-0 m-0">
          <div class="col-12 text-center">
            <h3 class="content-title" v-html="$t('explore.title')"> </h3>
          </div>

          <MultiFilter />

       </div>
    </div>

    <!-- Teacher Filters -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 p-0 p-sm-1 p-md-2 p-lg-3" v-for="teacher in teachers.teachers">
                <div class="row p-0">
                    <div class="col-6 col-md-12">
                        <img width="100%" src="/images/hero.png" class="teacher-image" alt="...">
                    </div>
                    <div class="col-6 col-md-12 p-0">
                        <div class="specialist mt-2 mb-2">
                            <span v-for="subject in teacher.subjects" class="bg-warning badge mr-2">{{subject.name}}</span>
                        </div>
                        <span class="location" v-for="loc in teacher.locations">
                            - {{ loc.township_mm}}
                        </span>
                        <p class="teacher-name pt-2">{{teacher.name}}</p>
                        <div>
                            <div class="teacher-time"><font-awesome-icon icon="fa-solid fa-calendar-days" />  {{teacher.time_table_1}}</div>
                            <div class="teacher-time"><font-awesome-icon icon="fa-solid fa-calendar-days" />  {{teacher.time_table_2}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
import MultiFilter from './MultiFilter.vue';
export default {
    components: {
        MultiFilter
    },
    computed: {
        ...mapGetters(['teachers'])
    },
    methods: {
        ...mapActions(['defaultTeacher'])
    },
    created() {
        this.defaultTeacher();
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
