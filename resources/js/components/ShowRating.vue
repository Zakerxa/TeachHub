<template lang="">
    <div>
        <div class="container">
           <div class="row pt-4 d-flex align-items-center text-start" style="min-height:40vh">
              <div class="col-12 col-sm-6">
                 <p class="rating-title">What They Say About <span>Our Teachers</span>
                    <img class="rating-title-image" src="/images/Particle.png" alt="">
                 </p>

              </div>
              <div class="col-12 col-sm-6">
                 <p class="rating-description">
                    Discover qualified teachers based upon our available subjects on the platform in short time. Just explore with your own perception on the platform now
                 </p>
              </div>
           </div>
        </div>

        <div class="container py-2">
            <div class="ex1 row pt-3" style="align-items:center;">

                <div v-if="reviews" class="slickSlider mt-2 mt-md-5 pb-3">
                    <div v-for="(review, i) in reviews" :key="i" class="text-center">
                            <Review-Card :review="review"></Review-Card>
                    </div>
                </div>

            </div>


            <div class="row pt-5 pb-5 mb-5 justify-content-center">
                <div class="col-12 text-center">
                    <button class="review-btn fw-bold">Write a Review <font-awesome-icon icon="fa-solid fa-angle-right"
                                style="font-size: 17px;top:0px;right:0;"></font-awesome-icon></button>
                </div>
            </div>

        </div>

    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
import ReviewCard from '../components/Reviews/card.vue';
export default {
    data: () => ({
        readyCarousel: false,
        owlCarouselInstance: null,
        options: {
            dots: true,
            infinite: false,
            speed: 300,
            arrows: true,
            centerMode: false,
            centerPadding: '20px',
            slidesToShow: 3,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: true,
                        centerPadding: '40px',
                        slidesToShow: 2,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        mobileFirst: true,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        }
    }),
    computed: {
        ...mapGetters(['reviews'])
    },
    components: { ReviewCard },
    mounted() {
        this.getReviews().then(res => {
            $('.slickSlider').slick(this.options);
        })

    },
    methods: {
        ...mapActions(['csrf', 'getReviews']),
        refresh() {
            this.getReviews();
        }
    },
};
</script>
<style lang="scss">
.rating-title {
    font-size: 3vw;
    line-height: 4vw;
    font-weight: bold;
    position: relative;

    >span {
        color: #8642DE;
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
    background-color: #FFD32B;
    padding: 13px 16px;
    border: none;
}

@media screen and (min-width:300px) and (max-width : 375px) {
    .rating-title {
        font-size: 8vw;
        line-height: 12vw;
    }

    .content-title-image {
        width: 40px;
        top: -10px;
        left: -10px;
    }
}

@media screen and (min-width:376px) and (max-width : 576px) {
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

@media screen and (min-width:577px) and (max-width : 992px) {
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
