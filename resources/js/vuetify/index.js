import 'vuetify/styles'
import '@fortawesome/fontawesome-free/css/all.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, fa } from 'vuetify/iconsets/fa'

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
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
            fa
        }
    },
    components,
    directives
});


export default vuetify;