
<template>
    <div>
        <v-menu :style="{ zIndex: 9999 }">
            <template v-slot:activator="{ props }">
                <v-btn class="lang-btn p-0" v-bind="props">
                    <div class="dropdown-toggle">
                        <span v-if="lang" class="fw-bold" style="font-size: 13px;" top=""><font-awesome-icon
                                class="lang-icon" icon="fa-solid fa-globe" /> {{ lang }}</span>
                    </div>
                </v-btn>
            </template>

            <v-list :style="{ zIndex: 9999 }">
                <v-list-item @click="setLanguage(item.code, item.name)" v-for="(item, i) in items" :key="i">
                    <v-list-item-title>{{ item.name }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>
<script>
import { mapGetters, mapMutations } from 'vuex';
export default {
    computed: mapGetters(['lang', 'items']),
    methods: {
        ...mapMutations(['updateLanguage', 'checkLanguage', 'getLanguage']),
        setLanguage(code, name) {
            this.updateLanguage({ code: code, name: name, $i18n: this.$i18n, $t: this.$t })
        }
    },
    mounted() {
        this.getLanguage({ $i18n: this.$i18n, $t: this.$t })
        this.checkLanguage();
    }
}
</script>

<style lang="scss" scoped>
.lang-btn {
    min-width: 120px !important;
    max-width: 140px;
    border: none;
    box-shadow: 1px 3px 5px #ddd;
    text-align: start;
    position: relative;

    .lang-icon {
        color: var(--primary);
    }
}
</style>
