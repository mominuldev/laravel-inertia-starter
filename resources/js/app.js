import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layouts from './Layouts/Layouts.vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';


createInertiaApp({
    title: title => `${title} - App Name`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page =  pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layouts
        return page
    },
    setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(ZiggyVue)
        .component('Head', Head)
        .component('Link', Link)
        .mount(el)
    }
})