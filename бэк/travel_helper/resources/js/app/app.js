import axios from 'axios'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.withCredentials = true

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import middlewarePipeline from './middlewarePipeline'

/**
 * use middleware
 */
router.beforeEach(async (to, from, next) => {
  if (!to.meta.middleware) {
    return next()
  }

  const middleware = to.meta.middleware
  const context = { to, from, next }

  return middleware[0]({
    ...context,
    next: middlewarePipeline(context, middleware, 1),
  })
})

const app = createApp(App)

app.config.globalProperties.user = user

app.use(router)
app.use(PrimeVue, { ripple: true })
app.use(ToastService)
app.use(ConfirmationService)

app.component('Button', Button)
app.component('Card', Card)
app.component('DataTable', DataTable)
app.component('Column', Column)
app.component('ColumnGroup', ColumnGroup)
app.component('Row', Row)
app.component('Toolbar', Toolbar)
app.component('InputText', InputText)
app.component('InputSwitch', InputSwitch)
app.component('Dropdown', Dropdown)
app.component('TabView', TabView)
app.component('Tree', Tree)
app.component('TabPanel', TabPanel)
app.component('Toast', Toast)
app.component('ConfirmDialog', ConfirmDialog)
app.component('Chart', Chart)
app.component('SplitButton', SplitButton)

app.mount('#app')
