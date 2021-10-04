import Vue from 'vue'
import VueRouter from 'vue-router'

import Soal from './components/soal/SoalComponent.vue'
import Home from './components/home/HomeComponent.vue'
import Hasil from './components/hasil/HasilComponent.vue'
import Pengaturan from './components/pengaturan/PengaturanComponent.vue'
import Siswa from './components/siswa/SiswaComponent.vue'

const routes = [
    {
        name: 'soal',
        path: '/soal',
        component: Soal
    },
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'hasil',
        path: '/hasil',
        component: Hasil
    },
    {
        name: 'pengaturan',
        path: '/pengaturan',
        component: Pengaturan
    },
    {
        name: 'siswa',
        path: '/siswa',
        component: Siswa
    },
]

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router