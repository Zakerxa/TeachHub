<template>
    <div class="explore-main">

        <div class="explore-container container-fluid">
            <div class="row justify-content-center text-center p-0 m-0">
                <!-- EXplore Title -->
                <div class="col-12 text-center">
                    <h3 class="ml-3 mb-1 ml-sm-0 content-title" v-html="$t('explore.title')"> </h3>
                </div>
            </div>

            <!-- Multi Filter Section & Search -->
            <MultiFilter />

        </div>


        <!-- Teacher List Filters -->
        <div class="container pt-5 mt-3">
            <div v-if="teachers" class="row justify-content-center justify-content-md-start gy-2">

                <div v-for="(teacher, i) in teachers" :key="i" class="text-start col-11 col-md-6 col-lg-4 col-xl-3 p-0"
                    style="cursor: pointer;">

                    <div @click="routeTo(teacher.token)" class="row justify-content-start mx-md-2 p-0"
                        style="background:#fff">
                        <div class="col-6 col-md-12 text-start p-md-0">
                            <div class="teacher-image"
                                :style="{ backgroundImage: `url(${imageDetector(teacher.extra, teacher.token, teacher.pic)})` }">
                                <div v-if="teacher.recommand == 1" class="corner-ribbon">
                                    <span class="cr-inner">
                                        <span class="cr-text"><i class="icon fa-regular fa-circle-check"></i>
                                            <strong>Recommand</strong></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-12 text-start pl-0 pl-sm-2">
                            <div class="details-info-container">
                                <div class="specialist mt-2 mb-2">
                                    <span v-for="(subject, i) in teacher.subjects" :key="i" class="bg-warning badge mr-2">
                                        {{ (lang == 'English') ? subject.name : subject.name_mm }}
                                    </span>
                                </div>
                                <p class="teacher-name pt-2">{{ (lang == 'English') ? teacher.name : teacher.name_mm }}</p>
                                <div class="">
                                    <span class="fw-normal"><i class="fa-solid fa-location-dot"
                                            style="color:var(--primary)"></i> {{ (lang == 'English') ?
                                                teacher.locations[0].region_state : teacher.locations[0].region_state_mm }}</span>
                                </div>
                                <div>
                                    <div class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)"
                                            icon="fa-solid fa-calendar-days" />
                                        {{ (lang == 'English') ? teacher.time_table_1 : teacher.time_table_1_mm }}
                                    </div>
                                    <div v-if="teacher.time_table_2 && teacher.time_table_2 != 'null'"
                                        class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)"
                                            icon="fa-solid fa-calendar-days" />
                                        {{ (lang == 'English') ? teacher.time_table_2 : teacher.time_table_2_mm }}</div>
                                </div>
                                <div class="d-block mb-2 pb-1">
                                    <span class="bg-primary badge mr-2" style="font-size:12px;font-weight:normal" v-for="edc in teacher.education_levels" :key="edc">
                                        {{ displayText(edc.name) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div v-else class="row d-flex align-items-center" style="min-height:40vh">
                <div class="text-center col-11 col-md-6 col-lg-4 col-xl-3">
                    <span>Loading . . .</span>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row jsutify-content-center pb-4 pt-4">
                <div v-if="paginations" class="col-12 mb-5 mt-4 text-center">
                    <vue-pagination @event="vuePaginate" :meta-data="paginations" :onSides="1"
                        :style="style"></vue-pagination>
                </div>
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
            items: [36],
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
        imageDetector(gender ,token, pic) {
            let imageUrl = '/images/default/teacher.jpg';

            if(gender == 'Male') imageUrl = '/images/default/teacher-men.jpg';
            else imageUrl = '/images/default/teacher.jpg';

            if (pic) imageUrl = '/uploads/profile/' + token + '/' + pic;
            return imageUrl;
        },
        vuePaginate(e) {

            location.href = '#filter-teacher';

            if (Object.values(this.filtersQuery).some(value => value !== '')) this.gettingTeacher(e[0]);

            else this.defaultTeacher('?page=' + e[0] + e[1]);

        },
        displayText(text) {
            if(text.includes('GRADE')) return text.replace('GRADE', 'G');
            if(text.includes('YEAR')) return text.replace('YEAR', 'Y');
            return text;
        },
    },
    created() {
        this.updatePerPage(this.items);
        this.defaultTeacher('?page=1&per_page=' + this.items);
    }
}
</script>


<style lang="scss" scoped>
.explore-main {
    background-color: var(--bg);
}

.explore-container {
    background-color: var(--bg);
    padding-top: 30px;
}

.details-info-container {
    min-height: 180px;
    max-height: 250px;
}

.teacher-name {
    font-size: 18px;
    font-weight: 700;
    color: #141414;
    margin-bottom: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.teacher-image {
    width: 100%;
    min-height: 200px;
    border-radius: 0x;
    background-color: #ffffff;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    left: 0;
    top: 0;

    /* Responsive styles for medium-sized screens and larger */
    @media (min-width: 768px) {
        max-height: 300px;
        height: 280px;
        background-color: #fff;
    }
}

.recommand-heart {
    top: 0;
    background: linear-gradient(to bottom, #00000041, #1b1b1b3f, #1b1b1b2d, #50505016, #60606001);
    width: 100%;
    height: 90px;
    padding-top: 5px;
    z-index: -1;

    >i {
        position: relative;
        top: 5px;
        left: 8px;
        color: rgb(255, 255, 255);
    }

    >span {
        position: relative;
        top: 5px;
        color: rgb(255, 255, 255);
        font-weight: bold;
        font-size: 17px;
    }
}

.backdropTop {
    position: absolute;
    top: 0;
    background: linear-gradient(to bottom, #000000e0, #000000c6, #000000ab, #0000008f, #1b1b1b67, #1b1b1b3d, #50505013, #50505003);
    ;
    width: 100%;
    height: 100px;
    padding-top: 10px;
    z-index: -1;
}

.backdrop {
    position: absolute;
    bottom: 0;
    background: linear-gradient(to top, #000000e0, #000000c6, #000000ab, #0000008f, #1b1b1b67, #1b1b1b3d, #50505013, #50505005);
    ;
    color: #fff;
    width: 100%;
    height: 80px;
    padding-top: 10px;
    font-weight: bold;
    z-index: 0;
}

.teacher-time {
    font-size: 13px;
    color: #555;
}

.content-title {
    font-weight: 900;
    font-family: sans-serif, Courier, monospace;
    font-size: 3.4vw;
    line-height: 5vw;
    align-items: center;
    margin-bottom: 20px;
    left: 20px;
    display: inline-block;
    padding: 0;
}


@media screen and (min-width:300px) and (max-width : 375px) {
    .explore-main {
        background-color: #fff;
    }

    .content-title {
        font-size: 7vw;
    }
}

@media screen and (min-width:376px) and (max-width : 500px) {
    .explore-main {
        background-color: #fff;
    }

    .content-title {
        font-size: 7vw;
    }
}

@media screen and (min-width:501px) and (max-width : 767px) {
    .explore-main {
        background-color: #fff;
    }

    .content-title {
        font-size: 5vw;
    }
}
</style>
