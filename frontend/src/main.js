import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import {router} from "./routes/rotes.js";
import PrimeVue from "primevue/config";
import "primevue/resources/themes/lara-light-indigo/theme.css";

const app = createApp(App);
app.use(PrimeVue,{ ripple: true  });
app.use(router);
app.mount('#app');
// createApp(App).use(router).mount('#app')
