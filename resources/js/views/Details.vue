<template>
    <div class="container-fluid">
        <div class="row p-0 position-relative justify-content-center">
            <div class="detailBackground"></div>
            <div class="col-12 col-md-8 col-lg-6 offset-lg-1 d-flex justify-content-start">
                <div class="cover">
                    <img class="pic" :src="/images/ + teacher.pic" alt="">
                    <div class="detail-name-mobile">
                        <h3>{{ teacher.name }}</h3>
                        <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Verified</p>
                        <p class="badge text-bg-warning p-2 fw-normal">{{ online_or_local }}</p>
                    </div>
                </div>
                <div class="detail-name">
                    <h3>{{ teacher.name }}</h3>
                    <p class="mb-2"><font-awesome-icon icon="fa-solid fa-circle-check" /> Verified</p>
                    <p class="badge text-bg-light p-2 fw-normal">{{ online_or_local }}</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-5"></div>
        </div>

        <div class="row position-relative justify-content-center second-details-section">
            <div class="col-12 col-md-5">
                <h4>{{ $t('details.description') }}</h4>
                <p>{{ description }}</p>
            </div>
            <div class="col-12 col-md-5 mt-4 mt-md-0">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-11 col-lg-10">
                        <div class="details-info">
                            <v-list style="border-radius: 8px;">
                                <!-- <v-list-subheader>REPORTS</v-list-subheader> -->

                                <v-list-item class="pt-5 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-solid fa-user"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-user" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.environment') }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ environment }} </v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-solid fa-book-open"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-book-open" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.subject') }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span v-for="subject in teacher.subjects">
                                            <span v-if="i == 1">,</span>{{ (lang == 'English') ? subject.name : subject.name_mm }}
                                        </span>
                                    </v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-solid fa-briefcase"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-circle-check" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.experience') }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ teacher.experience }}</v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-solid fa-calendar-check"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-calendar-check" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.datetime') }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ timetable1 }}</v-list-item-subtitle>
                                    <v-list-item-subtitle class="mt-1">{{ timetable2 }}</v-list-item-subtitle>
                                </v-list-item>


                                <v-list-item class="pt-2 pb-5" color="primary" rounded="shaped">
                                    <template v-slot:prepend>
                                        <v-icon class="details-info-icon-bg" icon="fa-street-view"></v-icon>
                                        <font-awesome-icon class="details-info-icon" icon="fa-solid fa-street-view" />
                                    </template>

                                    <v-list-item-title>{{ $t('details.location') }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span v-for="(loc, i) in teacher.locations" :key="i">
                                            <span v-if="i == 1">,</span>{{ (lang == 'English') ? loc.township : loc.township_mm }}
                                        </span>
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
    </div>

    <footer-vue></footer-vue>
</template>
<script>
import trial from '../components/Trial.vue';
import { mapGetters } from 'vuex';
import footerVue from '../components/Footer.vue';
export default {
    props: ['id'],
    data() {
        return {
            teacher: []
        }
    },
    components: {
        trial,
        footerVue
    },
    computed: {
        ...mapGetters([
            'lang',
        ]),
        online_or_local() {
            if (this.teacher.online_or_local == 1) return 'Online'
            else if (this.teacher.online_or_local == 2) return 'Local'
            else return 'Online-Local'
        },
        description() {
            return (this.lang == 'English') ? this.teacher.description : this.teacher.description_mm
        },
        environment() {
            return (this.lang == 'English') ? this.teacher.environment : this.teacher.environment_mm
        },
        timetable1(){
            return  (this.lang == 'English') ? this.teacher.time_table_1 : this.teacher.time_table_1_mm
        },
        timetable2(){
            return  (this.lang == 'English') ? this.teacher.time_table_2 : this.teacher.time_table_2_mm
        }
    },
    methods: {
        getTeacherDetails(id) {
            fetch('/api/teachers/details/' + id).then(res => res.json()).then(res => this.teacher = res.teacher).then(res => {
                console.log("DOM has been updated", this.teacher);
            })
        },
        contactus(){
            window.location.href = "tel:+959777637858";
        }
    },
    created() {
        this.getTeacherDetails(this.id);
    },
    mounted() {
        // console.log("New Id ", this.$route.params.id);

        this.$nextTick(() => {
            console.log("DOM has been updated", this.teacher);
        });
    }
}
</script>
<style lang="scss" scoped>
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
        top: -80px;
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
        top: -110px;
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
