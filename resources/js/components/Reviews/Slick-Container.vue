<template>
    <div v-if="reviews" :ref="slider" class="slickSlider mt-2 mt-md-5 pb-3">
        <div v-for="(review, i) in reviews" :key="i" class="text-center">
            <Review-Card :review="review"></Review-Card>
        </div>
    </div>
</template>
<script>
import ReviewCard from './Review-Card.vue';
export default {
    props: ['reviews', 'slider'],
    data() {
        return {
            slickSlider: null,
            options: {
                dots: true,
                infinite: false,
                speed: 300,
                arrows: false,
                centerMode: false,
                centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 2,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: false,
                            centerPadding: '40px',
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            arrows: false,
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            mobileFirst: true
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            mobileFirst: true
                        }
                    }
                ]
            }
        }
    },
    components: {
        ReviewCard
    },
    methods: {
        initializeSlider() {

            (this.slider == 'detailSlider') ? this.slickSlider = this.$refs.detailSlider : this.slickSlider = this.$refs.homePageSlider;

            if ($(this.slickSlider).hasClass('slick-initialized')) $(this.slickSlider).slick('unslick');

            $(this.slickSlider).slick(this.options)
        },
    },
    watch: {
        reviews: {
            handler(value) {
                if (value && value.length >= 1) {
                    this.$nextTick(() => this.initializeSlider())
                }
                else return null;
            },
            deep: true,
        }
    }
}
</script>

<style lang="scss">
/* Slider */

.slick-slider {
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

.slick-list:focus {
    outline: none;
}

.slick-list.dragging {
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.slick-track {
    position: relative;
    top: 0;
    left: 0;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.slick-track:before,
.slick-track:after {
    display: table;
    content: '';
}

.slick-track:after {
    clear: both;
}

.slick-loading .slick-track {
    visibility: hidden;
}

.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}

[dir='rtl'] .slick-slide {
    float: right;
}

.slick-slide img {
    display: block;
}

.slick-slide.slick-loading img {
    display: none;
}

.slick-slide.dragging img {
    pointer-events: none;
}

.slick-initialized .slick-slide {
    display: block;
}

.slick-loading .slick-slide {
    visibility: hidden;
}

.slick-vertical .slick-slide {
    display: block;
    height: auto;
    border: 1px solid transparent;
}

.slick-arrow.slick-hidden {
    display: none;
}



.slick-dots {
    position: relative !important;
    display: flex;
    justify-content: center;
    padding: 0;
}

.slick-dots li {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    margin: 0 5px;
    padding: 0;
    cursor: pointer;
    padding: 0;
}

.slick-dots li button {
    font-size: 0;
    line-height: 0;
    display: block;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    padding: 5px;
    margin: 5px;
    cursor: pointer;
    color: transparent;
    border: 0;
    outline: none;
    opacity: .7;
    background: #484848;
}

.slick-dots li button:hover,
.slick-dots li button:focus {
    outline: none;
}

.slick-dots li button:hover:before,
.slick-dots li button:focus:before {
    opacity: 1;
}

.slick-active {
    >button {
        opacity: 1;
        background: #212121 !important;
    }
}

.slick-dots li button:hover,
.slick-dots li button:focus {
    outline: none;
}

.slick-dots li button:hover:before,
.slick-dots li button:focus:before {
    opacity: 1;
}

.slick-dots li.slick-active button:before {
    opacity: .75;
    color: rgb(0, 0, 0) !important;
}
</style>
