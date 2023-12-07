<template>
    <div class="mb-5" style="border-bottom: 2px solid #8642DE;background: #F9F5FF;padding-bottom: 8%" id="topTeacher">
        <div class="container-fluid pt-5">
            <div class="row m-0 p-0 mt-0 mt-md-3 pt-5 content-header justify-content-center text-center">
                <div class="col-1 col-sm-1">
                    <img class="left-effect" src="/images/effect.png" alt="">
                </div>
                <div class="col-10 pt-5 pb-5 col-sm-10 col-md-10">
                    <h3 class="content-title" v-html="$t('content.topTeacher')">
                    </h3>
                </div>
                <div class="col-1 col-sm-1">
                    <img class="right-effect" src="/images/effect.png" alt="">
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row pt-5">
                <div v-if="topTeachers" class="col-12 col-md-6 col-lg-3 mt-2 mb-2" style="cursor: pointer!important;"
                    v-for="teacher in topTeachers">
                    <div @click="routeTo(teacher.id)" class="row border-0">
                        <div class="col-6 col-md-12">
                            <img width="100%" src="/images/hero.png" class="teacher-image" alt="...">
                        </div>
                        <div class="col-6 col-md-12 p-0">
                            <div class="specialist mt-2 mb-2">
                                <span v-for="subject in teacher.subjects" class="bg-warning badge mr-2">
                                  {{ (lang == 'English') ? subject.name : subject.name_mm  }}
                                </span>
                            </div>
                            <p class="teacher-name pt-2">{{ teacher.name }}</p>
                            <div>
                                <div class="teacher-time"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-calendar-days" />
                                    {{ (lang == 'English') ? teacher.time_table_1 : teacher.time_table_1_mm }}</div>
                                <div class="teacher-time"><font-awesome-icon style="color:var(--primary)" icon="fa-solid fa-calendar-days" />
                                    {{ (lang == 'English') ? teacher.time_table_2 : teacher.time_table_2_mm }}</div>
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
    computed: mapGetters(['topTeachers','lang']),
    methods: {
        ...mapActions(['gettingTopTeachers', 'defaultTeacher']),
        routeTo(id) {
            this.$router.push({ name: 'details', params: { id } });
        }
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
}

.right-effect {
    top: -20%;
    left: -10px;
}

.content-title {
    font-size: 4vw;
    font-weight: bold;
    position: relative;

    >span {
        color: #8642DE;
    }
}

.content-title-image {
    width: 80px;
    position: relative;
    top: -30px;
    left: -20px;
    transform: rotate(-10deg);
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
    /* Prevent text from wrapping */
    overflow: hidden;
    /* Hide overflowed text */
    text-overflow: ellipsis;
    /* Show ellipsis for overflowed text */
}

.teacher-image {
    border: none;
    box-shadow: 1px 1px 3px #e3e0e6;
    border-left: 1.5px solid #8642DE;
    border-bottom: 1.5px solid #8642DE;
    border-radius: 8px;
}

.teacher-time {
    >li {
        list-style: none;
        font-size: 14px;
        font-weight: 600;
        padding-top: 3px;

        >span {
            font-weight: 400;
        }
    }
}

@media screen and (min-width:300px) and (max-width : 375px) {
    .content-title {
        font-weight: bold;
        font-size: 8vw;
        line-height: 8vw;
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
}
</style>
