<template>
    <div class="container-fluid">
        <div class="row p-0 contact-us-row justify-content-center align-items-center d-flex">

            <div class="col-12 col-md-7 contact-left-section p-0">
                <div class="row d-flex p-0 m-0">

                    <div class="col offset-md-1">

                        <div class="position-relative">
                            <p class="hero-title" v-html="$t('contactus.title')"></p>
                        </div>
                        <p class="hero-subtitle mr-5">
                            {{ $t('hero.heroSubTitle') }}
                        </p>
                        <div class="row pb-0 d-flex align-items-center footer-icon-container">
                            <div class="brands col-2">
                                <font-awesome-icon class="brands-color" icon="fa-brands fa-facebook" />
                            </div>
                            <div class="brands col-2">
                                <font-awesome-icon class="brands-color" icon="fa-brands fa-twitter" />
                            </div>
                            <div class="brands col-2">
                                <font-awesome-icon class="brands-color" icon="fa-brands fa-instagram" />
                            </div>
                            <div class="brands col-2">
                                <font-awesome-icon class="brands-color" icon="fa-brands fa-youtube" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 p-0 contact-right-section">
                <div class="hero-image-container">
                    <div class="image-box">
                        <div class="image_1 image">
                            <div class="image-box-inner">
                                <img src="/images/contactus1.jpg" alt="">
                            </div>
                        </div>
                        <div class="image_2 image">
                            <div class="image-box-inner">
                                <img src="/images/contactus.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer-vue></footer-vue>
</template>
<script>
import trial from '../components/Trial.vue';
import footerVue from '../components/Footer.vue';
export default {
    components: {
        trial,
        footerVue
    },
    methods:{
        contactus(){
            window.location.href = "tel:+959777637858";
        }
    }
}
</script>
<style lang="scss" scoped>
.image {
    position: absolute;
    overflow: hidden;
    border-radius: 10%;
}

.image .image-box-inner {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 83%;
    cursor: pointer;
    border-radius: 10px;
    overflow: hidden;
}

.image .image-box-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    padding: 0;
    margin: 0;
    border-radius: 0;
}

.image .image-box-inner div {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    color: #fff;
}

.image_1 {
    width: 90%;
    padding: 4px;
    z-index: 3;
    bottom: -100px;
    left: 0;
}

.image_2 {
    width: 100%;
    padding: 4px;
    z-index: 2;
    top: 80px;
    left: 124px;
}

.contact-us-row {
    max-height: 730px;
    align-items: center;
    padding: 0;
    margin: 0;
}

.image-box {
    width: 280px;
    height: 55vh;
    /* background-color: red; */
    position: relative;
}


.contact-left-section {

    .hero-title {
        font-weight: 900;
        font-family: sans-serif, Courier, monospace;
        font-size: 3.5vw;
        line-height: 5vw;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    .hero-subtitle {
        padding-top: 15px;
        font-size: 1.5vw;
        align-items: start;
        line-height: 2.2vw;
    }
}

.contact-right-section {

    // height: 105vh;
    .hero-image-container {
        height: 110vh;
        overflow: hidden;
        position: relative;

        .hero-image {
            width: 100%;
            height: auto;
            position: absolute;
            top: 15px;
        }
    }
}

@media screen and (min-width:300px) and (max-width : 375px) {

    .contact-us-row {
        max-height: 120vh;
    }

    .hero-title-image {
        width: 13%;
        top: -20px;
    }

    .contact-left-section {
        min-height: 20vh;

        .hero-title {
            margin-top: 30px;
            font-size: 6vw;
            line-height: 7vw;
        }

        .hero-subtitle {
            font-size: 14px;
            line-height: 23px;
        }
    }

    .contact-right-section {
        max-height: 70vh;

        .hero-image-container {
            min-height: 50vh;
            max-height: 100vh;

            .image_1 {
                bottom: -50px;
                border-radius: 10px;
            }
        }
    }
}

@media screen and (min-width:376px) and (max-width : 500px) {

    .contact-us-row {
        max-height: 100vh;
    }

    .hero-title-image {
        width: 14%;
        top: -15px;
        left: -12px;
    }

    .contact-left-section {
        min-height: 10vh;

        .hero-title {
            margin-top: 40px;
            font-size: 7vw;
            line-height: 10vw;
        }

        .hero-subtitle {
            font-size: 14px;
            line-height: 23px;
        }
    }

    .contact-right-section {
        max-height: 55vh;

        .hero-image-container {
            min-height: 30vh;
            max-height: 100vh;
        }

        .image_1 {
            bottom: 45px;
            border-radius: 10px;
        }
    }
}

@media screen and (min-width:501px) and (max-width : 767px) {
    .contact-us-row {
        max-height: 140vh;
    }

    .hero-title-image {
        width: 13%;
        top: -15px;
        left: -10px;
    }

    .contact-left-section {
        min-height: 10vh;

        .hero-title {
            margin-top: 40px;
            font-size: 6vw;
            line-height: 5vw;
        }

        .hero-subtitle {
            font-size: 3vw;
            line-height: 4vw;
            margin-bottom: 30px;
        }
    }


    .contact-right-section {
        max-height: 80vh;

        .hero-image-container {
            height: 70vh;

            .hero-image {
                height: 100%;
                width: 100%;
                left: 5%;
            }
        }
    }
}



@media screen and (min-width:768px) and (max-width : 992px) {
    .contact-us-row {
        height: 80vh;
    }

    .contact-left-section {
        height: 70vh;
        padding: 0;

        .hero-title {
            font-size: 3.9vw;
            line-height: 4.8vw;
        }

        .hero-subtitle {
            font-size: 1.8vw;
            line-height: 2.4vw;
        }
    }
}

@media screen and (min-width:993px) {
    .contact-left-section {
        height: 70vh;
    }
}

@media screen and (aspect-ratio: 820/1180),
screen and (aspect-ratio: 1024/1366),
screen and (aspect-ratio: 912/1368) {
    .contact-us-row {
        height: 40vh;
    }

    .contact-left-section {
        max-height: 20vh;
        padding: 0;
    }

    .contact-right-section {
        height: 100%
    }

    .image_1 {
        bottom: 205px;
        border-radius: 10px;
    }
}

@media screen and (aspect-ratio: 768/1024) {
    .contact-us-row {
        height: 50vh;
    }

    .contact-left-section {
        max-height: 25vh;
        padding: 0;
    }

    .contact-right-section {
        max-height: 100%
    }

    .image_1 {
        bottom: 175px;
        border-radius: 10px;
    }
}
</style>
