import AuthPage from "../components/AuthPage.vue";
import AdminPanel from "../components/AdminPanel/AdminPanel.vue";
import DataItem from "../components/AdminPanel/DataItem/DataItem.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    { path: '/', component: AuthPage },
    { path: '/adminPanel', component: AdminPanel },
    { path: '/dataPanel', component: DataItem, name:DataItem },
    { path: '/journalPanel', component: AdminPanel },
    { path: '/reportPanel', component: AdminPanel },
    { path: '/helpPanel', component: AdminPanel },
]

export const router =  createRouter({
    routes,
    history: createWebHistory()
})