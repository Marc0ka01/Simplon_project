import './assets/main.css'
import router from './router'

import { createApp } from 'vue'
import App from './App.vue'

// importation de bootstrap
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
// importation de boxicons pour les icons
import './assets/boxicons/css/boxicons.min.css'


const app = createApp(App)

app.use(router)
app.mount('#app')
