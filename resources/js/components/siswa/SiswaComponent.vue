<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
        <div class="panel-heading clearfix">
            Data Siswa
            <router-link 
                to="/siswa/add" 
                class="btn btn-primary pull-right" 
                title="Tambah Siswa">
                <i class="fa fa-plus"></i>
            </router-link>
        </div>

        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr v-for="(siswa, index) in siswas" :key="index">
                        <td class="middle">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <img v-if="siswa.image" :src="'storage/img/'+siswa.image"  alt="Gagal Upload" width="150px" height="150px">
                                    <img v-else src="storage/img/user.png"  alt="Gagal Upload" width="150px" height="150px">
                                </div>

                                <div class="media-body">
                                    <address>
                                        <b>Username:</b>   {{ siswa.email }}<br>
                                        <b>Nama Siswa:</b> {{ siswa.name }} <br>
                                        <b>Jenis Kelamin:</b> {{ siswa.jenis_kelamin }} <br>
                                        <b>Status:</b> {{ siswa.status }} <br>
                                        <b>Kelas:</b> {{ siswa.kelas }} <br>
                                        <b>Nik:</b> {{ siswa.nik }}
                                    </address>
                                </div>
                            </div>         
                        </td>

                        <td class="middle" width="100">
                            <router-link
                                :to="{name: 'edit_siswa', params:{id:siswa.android_id}}"
                                class="btn btn-circle btn-danger"
                                title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                            </router-link>

                            <button
                                class="btn btn-circle btn-danger" 
                                title="Hapus"
                                @click="hapus(siswa.android_id)">
                                    <i class="fa fa-trash"></i>
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2'

export default {
    data(){
        return {
            siswas:{}
        }
    }, 

    mounted(){
        this.getSiswa()
    },

    methods: {
        hapus(id){
            axios.delete('/api/user/'+ id)
            .then((res) => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data Berhasil Dihapus',
                    icon: 'success',
                    confirmButtonText: 'ok'
                })

                this.getSiswa()
            })
        },
        getSiswa(){
            axios.get('/api/user')
            .then((res) => {
                this.siswas = res.data.data
            })
        }
    }
}
</script>