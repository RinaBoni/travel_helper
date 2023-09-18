import axios from 'axios'




window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.withCredentials = true

import { createApp } from 'vue'
import App from './App.vue'

import PrimeVue from 'primevue/config';
import 'import PrimeVue from primevue/config';
import InputText from 'primevue/inputtext';

const app = createApp(App)
app.use(PrimeVue);
app.component('InputText', InputText);
app.mount('#app')
