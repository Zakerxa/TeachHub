<template>
    <div class="hero-container container-fluid">
        <div class="row hero">
            <div class="col-12 col-md-7 hero-left-section p-0">
                <div class="row d-flex p-0 m-0">

                    <div class="col offset-md-1">

                        <div class="position-relative">
                            <p class="hero-title" v-html="$t('hero.heroTitle')"></p>
                            <!-- <img class="hero-title-image" src="/images/Particle.png" alt=""> -->
                        </div>
                        <p class="hero-subtitle mr-5 mb-4 pt-1">
                            {{ $t('hero.heroSubTitle') }}
                        </p>
                        <router-link to="/explore" class="hero-btn fw-bold">Start Explore <font-awesome-icon
                                icon="fa-solid fa-angle-right"
                                style="font-size: 17px;top:0px;right:0;"></font-awesome-icon></router-link>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 p-0 hero-right-section">
                <div class="hero-image-container">
                    <!-- <v-parallax src="/images/hero-image.png"></v-parallax> -->
                    <img class="hero-image" src="/images/hero-image.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-4" style="background: #F9F5FF;">
        <div class="row justify-content-center text-center">
            <div style="cursor:pointer" class="col-2 pb-0 position-relative text-center">
                <a href="#topTeacher" style="text-decoration: none;">
                    <font-awesome-icon class="fw-bold" style="font-size: 35px;bottom:-10px;right:0;color:#8642DE;"
                        icon="fa-solid fa-angle-down"></font-awesome-icon>
                    <div class="text-dark fw-bold position-relative" style="top:-10px;">Scroll</div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {

        }
    }
}
</script>
<style lang="scss" scoped>
.hero-container {
    background: #F9F5FF;
    padding: 0;
    margin: 0;
    max-height: 100vh;
}

.hero {
    max-height: 730px;
    align-items: center;
    padding: 0;
    margin: 0;
}

.hero-title-image {
    width: 15%;
    position: relative;
    top: -30px;
    left: -20px;
    transform: rotate(-10deg);
}

.hero-left-section {


    .hero-title {
        font-weight: 900;
        font-family: sans-serif, Courier, monospace;
        font-size: 3.7vw;
        line-height: 3vw;
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

    .hero-btn {
        background-color: #FFD32B;
        padding: 13px 16px;
        border: none;
        text-decoration: none;
        color: #000;
        top: 10px;
        position: relative;
    }
}

.hero-right-section {

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

    .hero {
        max-height: 120vh;
    }

    .hero-title-image {
        width: 13%;
        top: -20px;
        left: -10px;
    }

    .hero-left-section {
        min-height: 50vh;

        .hero-title {
            margin-top: 30px;
            font-size: 7vw;
            line-height: 10vw;
        }

        .hero-subtitle {
            font-size: 18px;
            line-height: 23px;
        }
    }

    .hero-right-section {
        max-height: 52vh;

        .hero-image-container {
            height: 52vh;

            .hero-image {
                height: 100%;
                left: 5%;
            }
        }
    }
}

@media screen and (min-width:376px) and (max-width : 500px) {

    .hero {
        max-height: 100vh;
    }

    .hero-title-image {
        width: 14%;
        top: -15px;
        left: -12px;
    }

    .hero-left-section {
        min-height: 40vh;

        .hero-title {
            margin-top: 40px;
            font-size: 7vw;
            line-height: 10vw;
        }

        .hero-subtitle {
            margin: 10px 0;
            font-size: 18px;
            line-height: 24px;
        }
    }

    .hero-right-section {
        max-height: 50vh;

        .hero-image-container {
            max-height: 50vh;

            .hero-image {
                height: 100%;
                left: 5%;
            }
        }
    }
}

@media screen and (min-width:501px) and (max-width : 767px) {
    .hero {
        max-height: 140vh;
    }

    .hero-title-image {
        width: 13%;
        top: -15px;
        left: -10px;
    }

    .hero-left-section {
        min-height: 10vh;

        .hero-title {
            margin-top: 40px;
            font-size: 6vw;
            line-height: 3vw;
        }

        .hero-subtitle {
            font-size: 3vw;
            line-height: 4vw;
            margin-bottom: 30px;
        }
    }


    .hero-right-section {
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
    .hero {
        height: 80vh;
    }

    .hero-left-section {
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
    .hero-left-section {
        height: 70vh;
    }
}

@media screen and (aspect-ratio: 540/720) {
    // .hero {
    //     min-height: 100vh;
    // }

    // .hero-container {
    //     background: #843feb;

    //     max-height: 100vh;

    // }

}


@media screen and (aspect-ratio: 820/1180),
screen and (aspect-ratio: 1024/1366),
screen and (aspect-ratio: 912/1368) {
    .hero {
        height: 40vh;
    }

    .hero-left-section {
        max-height: 20vh;
        padding: 0;
    }

    .hero-right-section {
        height: 100%
    }
}

@media screen and (aspect-ratio: 768/1024) {
    .hero {
        height: 50vh;
    }

    .hero-left-section {
        max-height: 25vh;
        padding: 0;
    }

    .hero-right-section {
        max-height: 100%
    }
}
</style>
