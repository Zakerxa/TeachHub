<template>
    <div>
        <v-card :style="review.status ? 'border:2px solid #eee' : 'border:2px outset #F1DD2B'" class="p-0 m-2">

            <div class="m-3 mb-1 review1" :class="review.status ? 'text-dark' : 'text-muted'">

                <div class="user-info">
                    <span class="clientLogo">
                        <b>{{ Array.from(review.username)[0] }}</b>
                    </span>
                    <div class="info">
                        <h5 class="name">{{ review.username }}</h5>
                        <!-- <h5 class="position">{{ review.created_at }}</h5> -->
                    </div>

                    <div class="ml-auto position-relative" style="top:3px;">
                        <img class="showReviewIcon" :src="review.status ? quoteBlue : quoteYellow" alt="Quote" />
                    </div>
                </div>

                <p class="review-text pl-4">
                    {{ review.message.substr(0, 170) }}
                    <span @click="review.status ? flip() : ''" v-show="review.message.length > 170" class="text-muted" style="cursor:pointer"> . . .</span>
                </p>

                <div class="text-start">
                    <span>* 5.0</span>
                </div>

            </div>

            <v-expand-transition>
                <v-card v-if="reveal" class="v-card--reveal p-2 text-start" style="height: 100%">

                    <!-- <span v-if="review.status" class="">
                        <img class="mr-auto ml-2" style="width:60px;height:60px;" :src="quoteBlue" alt="Quote" />
                    </span> -->

                    <v-card-text class="pt-0" v-if="review.status" @click="reveal = false">
                        <p @click="reveal = false" class="text--primary pt-1">
                            {{ review.message }}
                        </p>
                    </v-card-text>

                </v-card>
            </v-expand-transition>
        </v-card>

    </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
    data() {
        return {
            reveal: false,
            bgDefault: 'background:radial-gradient(circle, rgb(41, 154, 228) 20%, rgb(48, 208, 237) 86%)',
            bgPending: 'background:radial-gradient(circle, rgb(234, 231, 56) 20%, rgb(171, 169, 32) 86%)',
            checkIcon: '/assets/icon/check-blue.png',
            trashIcon: '/assets/icon/trash.png',
            quoteBlue: '/images/icon/quotation-marks1.svg',
            quoteYellow: '/assets/icon/quote-yellow.png',
            disPassword: true,
            checkPassword: 'password',
            eyeCheck: 'fa-solid fa-eye-slash',
            checkState: true,
            password: '',
            pressEnter: false,
            finalState: false,
            loading: false,
            alertMsg: null
        }
    },
    watch: {
        loading(val) {
            if (!val) return
        },
    },
    methods: {
        flip() {
            this.reveal = !this.reveal;
        },
        clear() {
            this.finalState = false;
            this.pressEnter = false;
            this.reveal = false;
            this.password = null;
            this.loading = false;
            this.alertMsg = null;
        }
    },
    props: ['review'],
};
</script>
<style lang="scss" scoped>
.v-card--reveal {
    bottom: 0;
    opacity: 1 !important;
    position: absolute;
    width: 100%;
}

.showReviewIcon {
    width: 60px !important;
    height: 60px;
    margin-right: auto;
}

.review-container {
    display: flex;
    height: 100vh;
    background-color: #f5f5f5;
}

.review1 {
    display: flex;
    flex-direction: column;
    min-height: 235px;
}

@media screen and (max-width: 500px) {
    .review-text {
        text-align: start;
        margin-bottom: 20px;
        min-height: 100px;
    }
}

.review {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border-radius: 25px;
    min-height: 400px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.icon {
    display: flex;
    width: 100%;
    height: 60px;
    color: #fff;
    margin-bottom: 20px;
}

.user-info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}


.clientLogo {
    display: flex;
    align-items: center;
    background-color: #9D7EC6;
    position: relative;
    top: 3px;
    cursor: pointer;
    text-align: center;
    width: 60px;
    height: 60px;
    margin-right: 10px;
    border-radius: 50%;

    b {
        font-size: 30px;
        width: 100%;
        position: relative;
        top: 1px;
        display: block;
        color: #fff;
    }
}

.name {
    font-size: 18px;
    margin: 0;
    position: relative;
    top: 5px;
    font-weight: 700;
}

.position {
    font-size: 13px;
    color: #888;
    margin: 0 0 0 14px;
}

.review-text {
    text-align: start;
    margin-bottom: 20px;
}
</style>
