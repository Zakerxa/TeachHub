<!-- Countdown.vue -->
<template>
    <div class="countdown" v-if="showCountdown">
        <div class="countdown-number" :class="{ 'animated': isAnimating }">{{ currentNumber }}+</div>
    </div>
</template>

<script>
export default {
    props: {
        number: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            currentNumber: 0,
            duration: 1000, // total duration in milliseconds
            isAnimating: false,
            showCountdown: false,
        };
    },
    methods: {
        startCountdown() {
            this.isAnimating = true;
            const steps = this.number + 1;
            const interval = this.duration / steps;

            const intervalId = setInterval(() => {
                if (this.currentNumber < this.number) {
                    this.currentNumber++;
                } else {
                    clearInterval(intervalId);
                    this.isAnimating = false;
                }
            }, interval);
        },
        handleScroll() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;

            // Adjust the scroll threshold as needed
            const scrollThreshold = 100;

            if (scrollTop > scrollThreshold && !this.showCountdown) {
                this.showCountdown = true;
                this.startCountdown();
            }
        },
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
    },
};
</script>

<style scoped>
.countdown {
    text-align: center;
}

.countdown-number {
    font-size: 3em;
    font-weight: bold;
    color: #333;
}

.animated {
    /* Add your preferred animation styles here */
    animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}
</style>
