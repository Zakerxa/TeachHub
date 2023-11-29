<template>

    <Explore></Explore>

    <!-- <show-rating /> -->

    <trial />

    <footer-vue></footer-vue>
</template>
<script>
import showRating from '../components/ShowRating.vue';
import trial from '../components/Trial.vue';
import footerVue from '../components/Footer.vue';
import Explore from '../components/Explore/Explore.vue';
export default {
    components: {
        Explore,
        showRating,
        trial,
        footerVue
    }
}
</script>
<style lang="">

</style>
