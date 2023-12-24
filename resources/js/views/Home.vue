<template>

    <hero></hero>

    <divider />

    <top-teacher />

    <home-rating />

    <trial />

    <footer-vue></footer-vue>
</template>

<script>
import hero from '../components/Hero.vue';
import divider from '../components/Divider.vue';
import topTeacher from '../components/TopTeacher.vue';
import homeRating from '../components/Home-Rating.vue';
import trial from '../components/Trial.vue';
import footerVue from '../components/Footer.vue';
export default {
    components: {
        hero,
        divider,
        topTeacher,
        homeRating,
        trial,
        footerVue
    }
}
</script>

<style lang="scss">
body {
    scroll-behavior: smooth !important;
}
</style>
