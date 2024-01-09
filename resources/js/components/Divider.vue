<template lang="">
    <div class="container-fluid" style="background:#FFD32B;">
        <div class="row pt-4 pb-4 justify-content-center text-center">
            <div class="col-md-0 col-lg-2"></div>
            <div class="col-12 col-md-3 col-lg-2 pt-3 pb-3">
               <CountdownVue :number="metrics.learners"></CountdownVue>
               <div class="dig-text">{{ $t('divider.sec1') }}</div>
            </div>
            <div class="col-12 col-md-3 col-lg-2 pt-3 pb-3">
                <CountdownVue :number="metrics.teachers"></CountdownVue>
               <div class="dig-text">{{ $t('divider.sec2') }}</div>
            </div>
            <div class="col-12 col-md-3 col-lg-2 pt-3 pb-3">
                <CountdownVue :number="metrics.subjects"></CountdownVue>
               <div class="dig-text">{{ $t('divider.sec3') }}</div>
            </div>
            <div class="col-12 col-md-3 col-lg-2 pt-3 pb-3">
                <CountdownVue :number="metrics.grades"></CountdownVue>
               <div class="dig-text">{{ $t('divider.sec4') }}</div>
            </div>
            <div class="col-md-0 col-lg-2"></div>
        </div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
import CountdownVue from './CountDown/Countdown.vue';
export default {
    components: {
        CountdownVue
    },
    computed: mapGetters(['metrics']),
}
</script>
<style lang="scss" scoped>
.dig {
    font-size: 38px;
    font-weight: bold;
}

.dig-text {
    font-size: 19px;
}
</style>
