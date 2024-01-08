<template>
    <div class="footer-container container-fluid">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="row footer-row pt-5 pb-5 p-3 d-flex align-items-center">
            <div class="col-12 col-md-3 col-lg-3 text-md-center footer-image">
                <img style="width: 200px;" src="/images/logoforbottomnav.svg" alt="">
            </div>
            <div class="col-10 col-md-6 col-lg-5 text-start footer-content">
                <p v-html="$t('content.banner')"></p>
            </div>
            <div class="col-10 col-md-3 col-lg-4 text-start footer-brands-container">
                <div class="row pb-0 d-flex align-items-center footer-icon-container">
                    <div class="brands col-2">
                        <i @click="openInFacebookApp()" class="brands-color fa-brands fa-facebook"></i>
                    </div>
                    <div class="brands col-2">
                        <i @click="openInTelegram()" class="brands-color fa-brands fa-telegram"></i>
                    </div>
                    <div class="brands col-2">
                        <i @click="openInWhatsApp()" class="brands-color fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="brands col-2">
                        <i @click="openInPhone()" class="brands-color fa-solid fa-phone-flip"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex align-items-center" style="background-color: #FFD32B;height:50px">
            <div class="col text-center">
                <p class="m-0">All Rights Reserved. Copyright @ 2024 <span class="fw-bold">TeachHub</span></p>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    methods: mapActions(['openInFacebookApp', 'openInWhatsApp', 'openInTelegram', 'openInPhone'])
}
</script>

<style lang="scss" scoped>
.footer-container {
    background-color: #0D0716;
    position: relative;
    overflow: hidden;
}

.footer-row {
    min-height: 40vh;
}

.footer-content {
    color: #fff;
    font-size: 30px;
    font-weight: bold;
}

.footer-brands-container {
    position: absolute;
    bottom: 5vh;
    right: -10%;
}

.brands {
    width: 45px;
    text-align: start;
    align-items: start;
}

.brands-color {
    color: #dedede;
    border: 1px solid #e8e8e8;
    font-size: 17px;
    border-radius: 50%;
    padding: 5px;
    cursor: pointer;
}

.line1,
.line2 {
    position: absolute;
    bottom: 0;
    z-index: 0;
    right: -7%;
    width: 100%;
    height: 20px;
    background-color: #6A39B121;
    transform-origin: bottom right;
}

.line1 {
    transform: rotate(-30deg);
    top: -50%;
}

.line2 {
    transform: rotate(-30deg);
    top: -30%;
}


@media screen and (min-width:300px) and (max-width : 768px) {

    .footer-brands-container {
        position: relative;
        bottom: 0;
        left: 0;
    }

    .footer-content {
        font-size: 18px;
    }

    .line1,
    .line2 {
        position: absolute;
        bottom: 0;
        z-index: 0;
        right: -3%;
        width: 100%;
        height: 18px;
        background-color: #6A39B121;
        transform-origin: bottom right;
    }

    .line1 {
        transform: rotate(-45deg);
        top: 40%;
    }

    .line2 {
        transform: rotate(-45deg);
        top: 60%;
    }
}
</style>
