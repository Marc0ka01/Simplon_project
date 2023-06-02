import {createRouter, createWebHistory} from 'vue-router'
import Home from "./views/Home.vue"
import CreateUser from './views/CreateUser.vue'
import ShowUser from './views/ShowUser.vue'
import Success from './views/Success.vue'

const routes = [
    {path:'/', component:Home},
    {path:'/create-participant', component:CreateUser},
    {path:'/show-participants', component:ShowUser},
    {path:'/success', component:Success},
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
})

export default router