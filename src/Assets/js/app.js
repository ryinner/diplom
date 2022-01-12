import { createApp } from "vue"
import axios from "axios"

const app = createApp({})

app.component('header-nav', require('./components/Header-nav').default)

app.mount('#app')