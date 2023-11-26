<template>
    <div class="mt-2">
        <v-switch @click="toggle" v-model="theme.global.current.dark" inset></v-switch>
    </div>
</template>

<script>
import { useTheme } from 'vuetify';
import DarkMode from '../DarkMode';
export default {
    data() {
        return {
            mode: null,
            theme: useTheme()
        }
    },
    methods: {
        toggle() {
            this.mode == 'zplus' ? this.mode = 'dark' : this.mode = 'zplus';
            this.setMode(this.mode);
            DarkMode.setMode(this.mode);
        },
        setMode(mode) {
            this.theme.global.name = mode;
        }
    },
    mounted() {
        this.setMode(this.mode);
    },
    created() {
        this.mode = DarkMode.getMode();
    }
}
</script>

<style lang="scss">
.v-input--density-default {
    --v-input-control-height: 0;
    --v-input-padding-top: 16px;
}
.v-selection-control {
    top:8px;
}
</style>
