import { createApp } from "vue"

const app = createApp({})

app.component('header-nav', require('./components/Header-nav').default)

app.mount('#app')