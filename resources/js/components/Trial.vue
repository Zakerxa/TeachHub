<template>
    <div class="trial">
        <div class="trial container">
            <div class="row d-flex pt-4 pb-4 align-items-center justify-content-center" style="min-height:70vh">
                <div class="col-12 col-md-4">
                    <img class="trial-img" src="/images/trialimg.png" alt="">
                </div>
                <div class="col-12 col-md-7">
                    <p class="trial-text" v-html="$t('content.trial')"> </p>
                    <router-link to="contact" class="trial-btn fw-bold"> {{ $t('btn.contactUs') }} <font-awesome-icon
                            icon="fa-solid fa-angle-right"
                            style="font-size: 17px;top:0px;right:0;"></font-awesome-icon></router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        contactus() {
            window.location.href = "tel:+959777637858";
        }
    }
}
</script>
<style lang="scss" scoped>
.trial {
    background-image: url('/images/trial.png');
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
}

.trial-img {
    width: 80%;
    height: 100%;
}

.trial-text {
    color: #fff;
    font-size: 42px;
    font-weight: 700;
    line-height: 60.9px;

    >span {
        color: #FFD32B;
    }
}

.trial-btn {
    background-color: #FFD32B;
    padding: 13px 16px;
    border: none;
    text-decoration: none;
    color: #111;
}
</style>
