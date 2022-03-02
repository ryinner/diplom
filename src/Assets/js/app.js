import { createApp } from "vue"
import _ from "lodash"

const app = createApp({})

app.component('goto', require('./components/GoTo').default)
app.component('header-nav', require('./components/HeaderNav').default)
app.component('index-requests', require('./components/forms/IndexRequests').default)
app.component('registration', require('./components/forms/Registration').default)
app.component('gotomain', require('./components/buttons/GoToMain').default)
app.component('private', require('./components/Private').default)
app.component('housescms', require('./components/forms/HousesCms').default)
app.component('update-requests', require('./components/RequestsUpdate').default)
app.component('change-role', require('./components/ChangeRole').default)
app.component('slider', require('./components/Slider').default)
app.component('createorder', require('./components/buttons/CreateOrder').default)
app.component('controll-orders', require('./components/ControllOrders').default)
app.component('deleteorder', require('./components/buttons/DeleteOrder').default)
app.component('theme-change', require('./components/buttons/ChangeTheme').default)

app.mount('#app')