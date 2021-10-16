<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Pengaturan Ujian
            </div>

            <div class="panel-body">
                <form action="" method="post">
                    <input type="hidden" name="id" v-model="peraturan.id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama Ujian</label>
                                <input type="text" name="nama" id="nama" class="form-control" v-model="peraturan.nama_ujian">                        
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="waktu">Waktu Pengerjaan</label>
                                <input type="text" name="waktu" id="waktu" class="form-control" v-model="peraturan.waktu">
                            </div>
                        </div>
                  
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nilai">Nilai Minimum</label>
                                <input type="text" name="nilai" id="nilai" class="form-control" v-model="peraturan.nilai_min">
                            </div>
                        </div>
                  
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="peraturan">Peraturan Ujian</label>
                            <textarea name="peraturan" id="peraturan" rows="10" class="form-control" v-model="peraturan.peraturan_ujian">

                            </textarea>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success" @click="simpan()">Simpan</button>
                        <router-link
                            to="/home"
                            class="btn btn-default">Batal
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2'

export default {
    data(){
        return {
            peraturan:{}
        }
    },

    created(){
        axios.get('/api/peraturan')
        .then((response) => {
            this.peraturan = response.data.data[0]
        })
    },

    methods: {
        simpan(){
            axios.put('/api/peraturan/'+this.peraturan.id, this.peraturan)
            .then((response) => {
                Swal.fire({
                    title: 'Sukses',
                    text: 'Data Berhasil Disimpan',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })

            })

        }
    }
}
</script>