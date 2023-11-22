import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'


const zplus = {
    dark: false,
    colors: {
        background: '#fff',
        surface: '#fff',
        primary: '#3E93E2',
        'primary-darken-1': '#3700B3',
        secondary: '#03DAC6',
        'secondary-darken-1': '#018786',
        error: '#B00020',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FB8C00',
        secondaryBg: '#FBFCFC',
        cardBg: '#fff',
        meshColor: '#3E93E2',
    }
}

const dark = {
    dark: true,
    colors: {
        background: '#111',
        surface: '#111',
        primary: '#00f',
        'primary-darken-1': '#3700B3',
        secondary: '#03DAC6',
        'secondary-darken-1': '#018786',
        error: '#B00020',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FB8C00',
        secondaryBg: '#333',
        cardBg: '#283747',
        meshColor: '#000',
    }
}

const vuetify = createVuetify({
    ssr: true,
    display: {
        mobileBreakpoint: 'sm',
        thresholds: {
            xs: 0,
            sm: 576,
            md: 768,
            lg: 992,
            xl: 1200,
            xxl: 1400
        },
    },
    theme: {
        defaultTheme: 'zplus',
        themes: {
            zplus,
            dark
        }
    },
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
            fa,
            mdi,
        }
    },
    components,
    directives
});


export default vuetify;