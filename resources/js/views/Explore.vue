<template>

    <Explore></Explore>

    <trial />

    <footer-vue></footer-vue>
</template>
<script>
import trial from '../components/Trial.vue';
import footerVue from '../components/Footer.vue';
import Explore from '../components/Explore/Explore.vue';
export default {
    components: {
        Explore,
        trial,
        footerVue
    }
}
</script>
<style lang="">

</style>
