import Vue from 'vue'
import VueRouter from 'vue-router'

import Soal from './components/soal/SoalComponent.vue'
import AddSoal from './components/soal/AddSoalComponent.vue'
import EditSoal from './components/soal/EditSoalComponent.vue'

import Home from './components/home/HomeComponent.vue'
import Hasil from './components/hasil/HasilComponent.vue'
import Pengaturan from './components/pengaturan/PengaturanComponent.vue'

import Siswa from './components/siswa/SiswaComponent.vue'
import AddSiswa from './components/siswa/AddSiswaComponent.vue'

const routes = [
    // soal
    {
        name: 'soal',
        path: '/soal',
        component: Soal
    },
    {
        name: 'add_soal',
        path: '/soal/add',
        component: AddSoal
    },
    {
        name: 'edit_soal',
        path: '/soal/:id',
        component: EditSoal
    },

    // home
    {
        name: 'home',
        path: '/home',
        component: Home
    },

    // hasil
    {
        name: 'hasil',
        path: '/hasil',
        component: Hasil
    },

    // pengaturan
    {
        name: 'pengaturan',
        path: '/pengaturan',
        component: Pengaturan
    },

    // siswa
    {
        name: 'siswa',
        path: '/siswa',
        component: Siswa
    },
    {
        name: 'add_siswa',
        path: '/siswa/add',
        component: AddSiswa
    }
]

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router