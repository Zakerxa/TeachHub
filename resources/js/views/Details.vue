<template>
    <div class="container-fluid">

        <div v-if="teacher != null" class="row p-0 position-relative justify-content-center">
            <div class="detailBackground"></div>
            <div class="col-12 col-md-8 col-lg-6 offset-lg-1 d-flex justify-content-start">
                <div class="cover">
                    <div class="teacher-image"
                        :style="{ backgroundImage: `url(${imageDetector(teacher.extra, teacher.token, teacher.pic)})` }">
                        <div v-if="teacher.recommand == 1" class="corner-ribbon">
                            <span class="cr-inner">
                                <span class="cr-text"><i class="icon fa-regular fa-circle-check"></i>
                                    <strong>Recommand</strong></span>
                            </span>
                        </div>
                    </div>

                    <div v-if="teacher != null && teacher.name" class="detail-name-mobile">
                        <h3>{{ (lang == 'English') ? teacher.name : teacher.name_mm }}</h3>
                        <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Verified</p>
                        <p class="badge text-bg-warning p-2 fw-normal">{{ online_or_local }}</p>
                        <p v-if="teacher.class_types" class="badge text-bg-warning p-2 fw-normal ml-2">{{
                            teacher.class_types.desc }}</p>
                    </div>
                </div>
                <div class="detail-name">
                    <h3>{{ (lang == 'English') ? teacher.name : teacher.name_mm }}</h3>
                    <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Verified</p>
                    <p class="badge text-bg-light p-2 fw-normal">{{ online_or_local }}</p>
                    <p v-if="teacher.class_types" class="badge text-bg-light p-2 fw-normal ml-2">{{ teacher.class_types.desc
                    }}</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-5"></div>
        </div>

        <div v-if="teacher != null" class="row position-relative justify-content-center second-details-section"
            :style="{ top: dynamicTop }">
            <div v-if="teacher != null" class="col-12 col-md-5" style="min-height:50px">
                <div v-if="teacher.education_levels.length >= 1" class="border-bottom pb-2 mb-3">
                    <h4>{{ $t('details.education') }}</h4>
                    <p class="mb-1" v-for="edc in teacher.education_levels" :key="edc">
                        {{ edc.name }}
                    </p>
                </div>

                <div v-if="teacher.description">
                    <h4>{{ $t('details.description') }}</h4>
                    <p>{{ description }}</p>
                </div>
            </div>
            <!-- <div v-else class="">
                <h4>{{ $t('details.description') }}</h4>
                <p>Loading . . . </p>
            </div> -->
            <div class="col-12 col-md-5 mt-4 mt-md-0">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-11 col-lg-10">
                        <div class="details-info">
                            <v-list style="border-radius: 8px;">
                                <!-- <v-list-subheader>REPORTS</v-list-subheader> -->

                                <v-list-item v-if="teacher.environment" class="pt-5 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon=""></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-user" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.environment') }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ environment }} </v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon=""></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-book-open" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.subject') }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span v-for="(subject, i) in teacher.subjects" :key="i">
                                            <span v-if="i != 0">,</span>{{ (lang == 'English') ? subject.name :
                                                subject.name_mm }}
                                        </span>
                                    </v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon=""></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-circle-check" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.experience') }}</v-list-item-title>
                                    <v-list-item-subtitle>+{{ teacher.experience }} Years</v-list-item-subtitle>
                                </v-list-item>

                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon=""></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-clock" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.datetime') }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ timetable1 }}</v-list-item-subtitle>
                                    <v-list-item-subtitle class="mt-1">{{ timetable2 }}</v-list-item-subtitle>
                                </v-list-item>

                                <v-list-item v-if="teacher.age" class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon=""></v-icon>
                                        <i class="details-info-icon fa-regular fa-face-smile"></i>
                                    </template>

                                    <v-list-item-title> <span v-if="teacher.extra">Gender -</span> Age</v-list-item-title>
                                    <v-list-item-subtitle><span v-if="teacher.extra">{{ teacher.extra }} - </span> {{
                                        teacher.age }}</v-list-item-subtitle>
                                </v-list-item>

                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-street-view"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-street-view" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.location') }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span v-for="(loc, i) in teacher.locations" :key="i">
                                            <span v-if="i != 0">,</span>{{ (lang == 'English') ? loc.township :
                                                loc.township_mm }}
                                        </span>
                                    </v-list-item-subtitle>
                                </v-list-item>

                                <v-list-item v-if="teacher.salary" class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-dollar-sing"></v-icon>
                                        <font-awesome-icon class="details-info-icon pl-1" icon="fa-solid fa-dollar-sign" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.salary') }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span>{{ teacher.salary }}</span>
                                    </v-list-item-subtitle>
                                </v-list-item>


                            </v-list>
                        </div>
                    </div>
                    <div class="col-11 col-md-11 col-lg-10">
                        <button @click="contactus" class="btn details-info-btn">Contact Us</button>
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="row p-0 position-relative justify-content-center">
            <div class="detailBackground"></div>
            <div class="col-12 col-md-8 col-lg-6 offset-lg-1 d-flex justify-content-start">
                <div class="cover">
                    <img src="/images/hero.png" style="width:200px;height:200px" alt="Loading . . .">
                    <div class="detail-name-mobile">
                        <h3> Loading . . .</h3>
                        <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Loading . . .</p>
                        <p class="badge text-bg-warning p-2 fw-normal">Loading . . .</p>
                    </div>
                </div>
                <div class="detail-name">
                    <h3>Loading . . .</h3>
                    <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Loading . . .</p>
                    <p class="badge text-bg-light p-2 fw-normal">Loading . . .</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-5"></div>
        </div>

    </div>

    <v-divider></v-divider>

    <teacher-rating-vue v-if="teacher != null" :id="teacher.id"></teacher-rating-vue>


    <footer-vue></footer-vue>
</template>
<script>
import trial from '../components/Trial.vue';
import { mapGetters } from 'vuex';
import footerVue from '../components/Footer.vue';
import TeacherRatingVue from '../components/TeacherRating.vue';
export default {
    props: ['id'],
    data() {
        return {
            teacher: null
        }
    },
    components: {
        trial,
        footerVue,
        TeacherRatingVue
    },
    computed: {
        ...mapGetters([
            'lang',
        ]),
        dynamicTop() {
            let maxLength = '10px';

            if(this.teacher.description) maxLength = this.description.length;

            if (maxLength < 80) return `-${60 + (maxLength / 2)}px`;

            else if (maxLength >= 80 && maxLength <= 199) return `-${(maxLength / 2)}px`;

            else if (maxLength >= 200 && maxLength <= 350) return `-${(maxLength / 4)}px`;

            else if (maxLength >= 350) return `-${(maxLength / 6)}px`;

            else return '0px';
        },
        online_or_local() {
            if (this.teacher.online_or_local == 1) return 'Online'
            else if (this.teacher.online_or_local == 2) return 'Local'
            else return 'Online-Local'
        },
        description() {
            return this.teacher.description;
        },
        environment() {
            return (this.lang == 'English') ? this.teacher.environment : this.teacher.environment_mm
        },
        timetable1() {
            return (this.lang == 'English') ? this.teacher.time_table_1 : this.teacher.time_table_1_mm
        },
        timetable2() {
            return (this.lang == 'English') ? this.teacher.time_table_2 : this.teacher.time_table_2_mm
        }
    },
    methods: {
        getTeacherDetails(id) {
            fetch('/api/teachers/details/' + id).then(res => res.json()).then(res => {
                this.teacher = res.teacher
            })
        },
        contactus() {
            window.location.href = "tel:+959777637858";
        },
        imageDetector(gender, token, pic) {
            let imageUrl = '/images/default/teacher.jpg';

            if (gender == 'Male') imageUrl = '/images/default/teacher-men.jpg';
            else imageUrl = '/images/default/teacher.jpg';

            if (pic) imageUrl = '/uploads/profile/' + token + '/' + pic;
            return imageUrl;
        },
    },
    created() {
        this.getTeacherDetails(this.id);
    },
    mounted() {
        console.log(this.$route.params.id);
    }
}
</script>
<style lang="scss" scoped>
.cr-inner {
    position: absolute;
    inset: 0;
    border: 1px solid #ddd !important;
    background: var(--primary);
    color: white;
    border-radius: 16px 8px 0 8px;
    clip-path: polygon(0 0, 100% 0, 0 100%);
}

.detailBackground {
    position: relative;
    top: 0;
    left: 0;
    z-index: 0;
    height: 28vh;
    width: 100%;
    background-color: var(--primary);
}

.details-info-btn {
    width: 100%;
    background-color: var(--primary);
    position: relative;
    top: -10px;
    color: #fff;
    font-weight: bold;
}

.details-info {
    background-color: #FBF9FF;
    min-height: 30vh;
    position: relative;
    top: -50px;
    border-radius: 10px;
    border: 1px solid #d3c5e7;
}


.details-info-icon {
    z-index: 1;
    position: relative;
    left: 10px;
}

.details-info-icon-bg {
    background-color: #d3c5e7;
    border-radius: 50%;
    width: 35px !important;
    height: 35px !important;
    z-index: 0;
    position: absolute;
}

.teacher-image {
    width: 140px;
    height: 160px;
    border-radius: 10px;
    background-color: #ffffff;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    left: 0;
    top: 0;
    border: 1px solid #ddd;

    /* Responsive styles for medium-sized screens and larger */
    @media (min-width: 768px) {
        width: 180px;
        height: 200px;
        background-color: #fff;
    }
}


.cover {
    position: relative;
    top: -20vh;
}

.pic {
    max-height: 200px;
    max-width: 200px;
    border: 1px solid #aaa;
    width: 100%;
    height: 100%;
    border-radius: 8px;
}

.detail-name-mobile {
    display: none;
    padding-top: 20px;

    >h3 {
        color: #1B0D2C;
        font-weight: bold;
    }

    >p {
        color: #281443;
    }
}

.detail-name {
    position: relative;
    top: -18vh;
    left: 20px;

    >h3 {
        color: var(--secondary);
        font-weight: bold;
    }

    >p {
        color: #FFEEAD;
    }
}

@media screen and (min-width:300px) and (max-width:375px) {

    .second-details-section {
        position: relative;
        top: 0;
    }

    .cover {
        top: -15vh;
    }

    .details-info {
        top: 0;
    }

    .detail-name {
        display: none;
    }

    .detail-name-mobile {
        display: block;
    }
}

@media screen and (min-width:376px) and (max-width:767px) {

    .second-details-section {
        position: relative;
        top: 0;
    }

    .cover {
        top: -15vh;
    }

    .details-info {
        top: 0;
    }

    .detail-name {
        display: none;
    }

    .detail-name-mobile {
        display: block;
    }
}

@media screen and (min-width:768px) {
    .details-info-btn {
        top: -50px;
    }
}
</style>
