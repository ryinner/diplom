import { createApp } from "vue"
import _ from "lodash"

const app = createApp({})

app.component('header-nav', require('./components/HeaderNav').default)
app.component('index-requests', require('./components/forms/IndexRequests').default)
app.component('registration', require('./components/forms/Registration').default)

app.mount('#app')