<template lang="">
    <div class="explore-container container-fluid">
       <div class="row justify-content-center p-0 m-0">

          <div class="col-12 text-center">
            <h3 class="content-title" v-html="$t('explore.title')"> </h3>
          </div>

          <MultiFilter />

       </div>

       <!-- Teacher Filters -->
       <div class="row pt-5 p-5">
                <div class="col-12 col-md-6 col-lg-3 mt-2 mb-2" v-for="teacher in teachers.teachers">
                    <div class="row border-0">
                        <div class="col-6 col-md-12">
                            <img src="/images/hero.png" class="card-img-top teacher-image" alt="...">
                        </div>
                        <div class="col-6 col-md-12 pr-0">
                            <div class="specialist mt-2 mb-2">
                                <span v-for="subject in teacher.subjects" class="bg-warning badge mr-2">{{subject.name}}</span>
                            </div>
                            <div class="location" v-for="loc in teacher.locations">
                                {{loc.region_state_mm}} - {{ loc.township_mm}}
                            </div>
                            <p class="teacher-name pt-2">{{teacher.name}}</p>
                            <div class="teacher-time">
                              <li>Mon-Tue <span>( 8:00 - 9:00 PM)</span></li>
                              <li>Sat-Sun <span>( 8:00 - 9:00 PM)</span></li>
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
</style>
