<template>
    <div v-if="loading" class="loading">
        <!-- Show Loading if Data not ready yet -->
        <div class="row d-flex align-items-center p-0 m-0" style="height:100vh;width:100vw;">
            <div class="col-12 text-center p-0">
                <img style="width: 140px;height:50px" src="/images/logo.svg" alt="">
            </div>
        </div>
    </div>
    <div v-else>

        <Navigation />

        <transition name="bounce" appear>
            <router-view />
        </transition>


    </div>
</template>

<script>
import Navigation from './components/Navigation.vue';
import Footer from './components/Footer.vue';
import { mapGetters, mapActions } from 'vuex';
export default {
    data() {
        return {
            loadingIcon: '<Teach-Hub/>',
            loading: true,
            fetchMetrics: false,
            DOMContentLoaded: false
        }
    },
    components: {
        Navigation,
        Footer
    },
    watch: {
        $route(to, from) {

        }
    },
    computed: mapGetters(['perPage']),
    methods: {
        ...mapActions(['defaultTeacher', 'getMetrics']),
        waitingDomContentLoaded() {
            return new Promise((res, rej) => {
                document.addEventListener('DOMContentLoaded', () => {
                    res(console.log("DOMContentLoaded => ", 200));
                });
            })
        },
        async watingMetricsLoaded() {
            return await this.getMetrics().then(res => console.log("MetricsLoaded => ", 200));
        }
    },
    async mounted() {

        await this.waitingDomContentLoaded();

        await this.watingMetricsLoaded();

        await this.defaultTeacher('?page=1&per_page=' + this.perPage);

        this.$nextTick(() => {
            console.log("Render has been loaded");
            this.loading = false;
        });
    }
}
</script>

<style lang="scss">
* {
    padding: 0;
    margin: 0;
}

:root {
    --font: "Inter", sans-serif;
    --primary: #8642DE;
    --secondary: #FFD32B;
    --bg: #F9F5FF;
}

$primary-color : #d6f0ff;

.divider {
    min-height: 15vh;
}

.loading {
    background: #fcfaff;
    z-index: 10;
    position: fixed;
    height: 100vh;
    width: 100vw;
}

.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}


.bounce-enter-active {
    animation: bounce-in 0.5s;
}

.bounce-leave-active {
    animation: bounce-in 0.5s reverse;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }

    50% {
        transform: scale(1.25);
    }

    100% {
        transform: scale(1);
    }
}
</style>
