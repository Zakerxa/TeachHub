const DEFAULT_LANG = "mm"; // default language

const LanguageService = {
    setLanguage(lang) {
        localStorage.setItem("lang", lang);
    },
    getLanguage() {
        return localStorage.getItem("lang") || DEFAULT_LANG;
    },
};

export default LanguageService;