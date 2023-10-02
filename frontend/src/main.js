import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import {router} from "./routes/rotes.js";
import PrimeVue from "primevue/config";
import "primevue/resources/themes/lara-light-indigo/theme.css";
import {store} from "./store/index.js";
import ToastService from "primevue/toastservice";
import Toast from 'primevue/toast';
import 'primeicons/primeicons.css';
import ConfirmationService from "primevue/confirmationservice";
import Button from 'primevue/button';

const app = createApp(App);
app.use(PrimeVue,{ ripple: true  });
app.component('Button', Button);
app.use(router);
app.use(store);
app.use(ToastService);
app.use(ConfirmationService);
app.component('Toast', Toast);
app.mount('#app');
