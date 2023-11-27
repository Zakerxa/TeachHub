
<template>
    <!-- <div class="dropdown-center p-0 m-0">
        <button class="btn dropdown-toggle lang-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <font-awesome-icon icon="fa-solid fa-globe" style="color: #8642DE;" /> {{ lang }}
        </button>
        <ul class="dropdown-menu">
            <li @click="setLanguage(item.code, item.name)" v-for="(item, i) in items" :key="i">
                <a class="dropdown-item" href="#">{{ item.name }}</a>
            </li>
        </ul>
    </div> -->


    <div>
        <v-menu :style="{ zIndex: 9999 }">
            <template v-slot:activator="{ props }">
                <v-btn class="lang-btn p-0" v-bind="props">
                    <div class="dropdown-toggle">
                        <span class="fw-bold" style="font-size: 13px;" top=""><font-awesome-icon icon="fa-solid fa-globe"
                                style="color: #8642DE;" /> {{ lang }}</span>
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
import LanguageService from '../lang/LanguageService';
export default {
    data() {
        return {
            lang: '',
            items: null,
        }
    },
    methods: {
        setLanguage(code, name) {
            this.lang = name;
            LanguageService.setLanguage(code);
            this.$i18n.locale = code;
            this.items = this.langcode()
        },
        langcode() {
            return [
                { title: this.$t('language.mm'), code: 'mm', name: 'Myanmar' },
                { title: this.$t('language.en'), code: 'en', name: 'English' }
            ];
        },
        checkLang() {
            if (LanguageService.getLanguage() == 'mm') this.lang = 'Myanmar'
            else this.lang = 'English'
        }
    },
    mounted() {
        this.$i18n.locale = LanguageService.getLanguage();
        this.items = this.langcode();
        this.checkLang();
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
}
</style>
