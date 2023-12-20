<template>
    <div class="mb-5" style="border-bottom: 2px solid #8642DE;background: #F9F5FF;padding-bottom: 8%" id="topTeacher">

        <div class="container-fluid pt-5 pb-5">
            <div class="row m-0 p-0 mt-0 mt-md-3 pt-5 content-header justify-content-center text-center">
                <div class="col-1 col-sm-1">
                    <img class="left-effect" src="/images/effect.png" alt="">
                </div>
                <div class="col-10 pt-5 pb-5 col-sm-10 col-md-10">
                    <h3 class="content-title" v-html="$t('content.topTeacher')">
                    </h3>
                </div>
                <div class="col-1 col-sm-1 p-0">
                    <img class="right-effect" src="/images/effect.png" alt="">
                </div>
            </div>
        </div>


        <div class="container">

            <div class="row pt-5" v-if="topTeachers">

                <div class="col-12 col-md-6 col-lg-3 mt-2 mb-2" style="cursor: pointer!important;" v-for="(teacher, i) in topTeachers" :key="i">
                    <div @click="routeTo(teacher.id)" class="row border-0">
                        <div class="col-6 col-md-12">
                            <div class="teacher-image" :style="{ backgroundImage: `url(${imageDetector(teacher.token, teacher.pic)})` }">
                                <div class="recommand-heart">
                                    <span v-if="teacher.recommand == 1" class="ml-3">Recommand</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-12 pl-0 pl-sm-2">
                            <div class="details-info-container">
                                <div class="specialist mt-2 mb-2">
                                    <span v-for="(subject, i) in teacher.subjects" :key="i" class="bg-warning badge mr-2">
                                        {{ (lang == 'English') ? subject.name : subject.name_mm }}
                                    </span>
                                </div>
                                <p class="teacher-name pt-2">{{ teacher.name }}</p>
                                <div class="">
                                    <span class="fw-normal">
                                        <i class="fa-solid fa-location-dot" style="color:var(--primary)"></i> {{ (lang == 'English') ? teacher.locations[0].region_state : teacher.locations[0].region_state_mm }}
                                    </span>
                                </div>
                                <div>
                                    <div class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-clock" />
                                        {{ (lang == 'English') ? teacher.time_table_1 : teacher.time_table_1_mm }}
                                    </div>
                                    <div v-if="teacher.time_table_2" class="teacher-time mt-2 mb-1"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-clock" />
                                        {{ (lang == 'English') ? teacher.time_table_2 : teacher.time_table_2_mm }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    data() {
        return {
            msg: 'Hello World',
        }
    },
    computed: mapGetters(['topTeachers', 'lang']),
    methods: {
        ...mapActions(['gettingTopTeachers', 'defaultTeacher']),
        routeTo(id) {
            this.$router.push({ name: 'details', params: { id } });
        },
        imageDetector(token, pic) {
            let imageUrl = '/images/default/hero.png';
            if (pic) imageUrl = '/uploads/profile/' + token + '/' + pic;
            return imageUrl;
        },
    },
    created() {
        this.gettingTopTeachers();
    },
    mounted() {
        this.$nextTick(() => {
            console.log('Top Teacher Working ', this.topTeachers);
        })
        console.log(this.msg);
    }
}
</script>

<style lang="scss" scoped>

.left-effect,
.right-effect {
    width: 30px;
    position: relative;
    display: inline-block;
}

.right-effect {
    top: -20%;
    left: -10px;
}

.content-title {
    font-size: 3.7vw;
    font-weight: bold;
    position: relative;
    display: inline-block;

    >span {
        color: #8642DE;
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
        text-transform: uppercase;
    }
}


.content-title-image {
    width: 80px;
    position: relative;
    top: -30px;
    left: -20px;
    transform: rotate(-10deg);
}

.details-info-container{
    min-height: 180px;
    max-height: 200px;
}

.specialist {
    >span {
        background-color: #FFEDAA;
        color: #1B0D2C;
        font-size: 12px;
        font-weight: 600;
    }
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
        min-height: 280px;
        background-color: #fff;
    }
}

.teacher-time {
    font-size: 13px;
    color: #555;
}

@media screen and (min-width:300px) and (max-width : 375px) {
    .content-title {
        font-weight: bold;
        font-size: 8vw;
        line-height: 10vw;
        display: inline-block;
    }

    .content-title-image {
        width: 30px;
        top: -10px;
        left: -10px;
    }
}

@media screen and (min-width:376px) and (max-width : 576px) {
    .content-title {
        font-size: 7vw;
        line-height: 11vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}

@media screen and (min-width:577px) and (max-width : 992px) {
    .content-title {
        font-size: 5vw;
        line-height: 11vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}</style>
