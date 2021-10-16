<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
        <div class="panel-heading clearfix">
            Kelola Soal
            <router-link to="/soal/add" class="btn btn-primary btn-md pull-right" title="Tambah Data">
                <i class="fa fa-plus"></i>
            </router-link>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead class="table-head">
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    <tr v-for="(soal, index) in soals" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>{{ soal.soal }}</td>
                        <td>{{ soal.status }}</td>
                        <td>
                            <router-link 
                                :to="{name: 'edit_soal', params:{id:soal.id}}" 
                                class="btn btn-circle">
                                    <i class="fas fa-pencil-alt"></i>
                            </router-link>

                            <button @click="hapus(soal.id)" class="btn btn-circle">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </thead>

                <tbody>

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
            soals: {}
        }
    },

    mounted(){
       this.getSoal()
    }, 

    methods: {
        hapus(id){
            axios.delete('/api/soal/'+id)
            .then((res) => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data Berhasil Dihapus',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })

               this.getSoal()
            })
        },

        getSoal(){
            axios.get('api/soal')
            .then((response) => {
                this.soals= response.data.data
            })   
        }
    }
}
</script>