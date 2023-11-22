<template>

    <hero></hero>

    <divider />

    <top-teacher />

    <show-rating />

    <trial/>
</template>
<script>
import hero from '../components/Hero.vue';
import divider from '../components/Divider.vue';
import topTeacher from '../components/TopTeacher.vue';
import showRating from '../components/ShowRating.vue';
import trial from '../components/Trial.vue';
export default {
    components: {
        hero,
        divider,
        topTeacher,
        showRating,
        trial
    }
}
</script>
<style lang="">

</style>
