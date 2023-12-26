<template>
    <div>

        <div class="container">
            <div class="row mt-5">
                <h3 class="fw-bold pt-5">Reviews From Parents</h3>
            </div>
            <div class="row pt-3" style="align-items: center">
                <slick-container slider="detailSlider" :reviews="teareviews"></slick-container>
            </div>

            <div class="row pt-5 pb-5 mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <v-dialog v-model="dialog" persistent width="auto">
                        <template v-slot:activator="{ props }">
                            <v-btn class="review-btn fw-bold" v-bind="props">{{ $t('btn.review') }}
                                <font-awesome-icon icon="fa-solid fa-angle-right"
                                    style="font-size: 17px; top: 0px; right: 0"></font-awesome-icon>
                            </v-btn>
                        </template>
                        <template v-slot:default="{ }">
                            <v-card>
                                <v-toolbar class="text-center" color="white" title="">
                                    <v-toolbar-title class="fw-bold">Write A Review</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-toolbar-items>
                                        <v-btn variant="text" @click="dialog = false">
                                            <v-icon class="details-info-icon-bg" icon="fa-solid fa-xmark"></v-icon>
                                        </v-btn>
                                    </v-toolbar-items>
                                </v-toolbar>
                                <v-card-text>
                                    <div class="text-center">
                                        <v-rating v-model="rating" hover half-increments color="#EABA00"
                                            active-color="#FFD32B"></v-rating>
                                        <div class="p">Choose a start rating</div>
                                    </div>
                                    <div class="pa-2">
                                        <div class="mb-3">
                                            <input v-model="name" type="text" class="form-control" id="name"
                                                aria-describedby="name" placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <textarea v-model="message" name="" class="form-control"
                                                placeholder="Write your review" id="" cols="30" rows="4"></textarea>
                                        </div>
                                        <div class="">
                                            <button :disabled="name.length < 3 || message.length < 10 || disableSubmit"
                                                @click="review()" class="btn w-100 fw-bold"
                                                style="background:var(--secondary)">Submit</button>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-card>
                        </template>
                    </v-dialog>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
import {
    mapGetters,
    mapActions
} from 'vuex'
import SlickContainer from './Reviews/Slick-Container.vue'
export default {
    props: ['id'],
    data: () => ({
        dialog: false,
        rating: 1.5,
        disableSubmit: false,
        name: '',
        message: ''
    }),
    computed: {
        ...mapGetters(['teareviews']),
    },
    watch: {
        dialog(value) {
            console.log("Dialog ", value);
        },
    },
    components: {
        SlickContainer
    },
    mounted() {
        this.getTeaReviews(this.id).then(res=>console.log("Getting Teacher Reviews . . .")).catch(err=>console.log(err));
    },
    methods: {
        ...mapActions(['csrf', 'getTeaReviews', 'postTeaReview']),
        review() {
            this.disableSubmit = true;
            // Get Session If Exist
            let session = null;
            if (localStorage.getItem("TeachubGlobalReviewToken")) session = localStorage.getItem("TeachubGlobalReviewToken")
            else session = 'new';
            // Post Review With CSRF
            this.csrf().then((token) => {
                console.log("CSRF Token ",token);
                this.postTeaReview({ teacher_id: this.id, name: this.name, message: this.message, rating: this.rating, _token: token, token: session })
                    .then(res => {
                        this.clear();
                        if (res.response == 'success') {
                            this.dialog = false;
                            // Set New Session
                            if (res.token) localStorage.setItem('TeachubGlobalReviewToken', res.token);
                        }
                    });
            }).catch(res => console.log("Error => ", res));
        },
        clear() {
            this.name = '';
            this.message = '';
            this.rating = 1.5;
            this.disableSubmit = false;
        }
    }
}
</script>

<style scoped>
.v-btn.v-btn--density-default {
    height: auto !important;
}
</style>

<style lang="scss">

.rating-title {
    font-size: 3.4vw;
    line-height: 4vw;
    font-weight: bold;
    position: relative;
    display: inline-block;

    >span {
        color: #8642de;
    }
}

.rating-title-image {
    width: 70px;
    position: relative;
    top: -20px;
    left: -20px;
    transform: rotate(-10deg);
}

.rating-description {
    font-size: 18px;
    font-weight: 400;
}

.writeareviewbtn {
    border-radius: 40px;
    padding: 10px 20px;
    font-weight: bold;
    border: 1px outset #139cd2;
}

.review-btn {
    background-color: #ffd32b !important;
    padding: 12px 16px !important;
    border: none;
}

@media screen and (min-width: 300px) and (max-width: 375px) {
    .rating-title {
        font-weight: bold;
        font-size: 8vw;
        line-height: 9vw;
    }

    .content-title-image {
        width: 40px;
        top: -10px;
        left: -10px;
    }
}

@media screen and (min-width: 376px) and (max-width: 576px) {
    .rating-title {
        font-size: 7vw;
        line-height: 11vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}

@media screen and (min-width: 577px) and (max-width: 992px) {
    .rating-title {
        font-size: 5vw;
        line-height: 7vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}
</style>
