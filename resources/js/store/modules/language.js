import LanguageService from '../../lang/LanguageService';
export default {
    state() {
        return {
            lang: null,
            items: null
        }
    },
    getters: {
        lang(state) {
            return state.lang
        },
        items(state) {
            return state.items;
        }
    },
    mutations: {
        updateLanguage(state, payload) {
            state.lang = payload.name;
            LanguageService.setLanguage(payload.code);
            payload.$i18n.locale = payload.code;
            state.items = [
                { title: payload.$t('language.mm'), code: 'mm', name: 'Myanmar' },
                { title: payload.$t('language.en'), code: 'en', name: 'English' }
            ]
        },
        checkLanguage(state) {
            if (LanguageService.getLanguage() == 'mm') state.lang = 'Myanmar'
            else state.lang = 'English'
        },
        getLanguage(state, payload) {
            payload.$i18n.locale = LanguageService.getLanguage();
            state.items = state.items = [
                { title: payload.$t('language.mm'), code: 'mm', name: 'Myanmar' },
                { title: payload.$t('language.en'), code: 'en', name: 'English' }
            ]
        }
    }
}