<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                Edit Siswa
            </div>

            <div class="panel-body">
                <form action="">
                    <input type="hidden" name="android_id" v-model="form.android_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" v-model="form.nik">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" id="nama" class="form-control" v-model="form.name">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" v-model="form.kelas">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kelamin">Jenis Kelamin</label>
                                <select name="kelamin" id="kelamin" class="form-control" v-model="form.jenis_kelamin">
                                    <option value=""></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="5" class="form-control" v-model="form.alamat"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Email Siswa</label>
                                <input type="email" name="email" id="email" class="form-control" v-model="form.email">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control" v-model="form.password">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="status">Jenis Kelamin</label>
                                <select name="status" id="status" class="form-control" v-model="form.status">
                                    <option value=""></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak-Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button
                            class="btn btn-primary" 
                            @click="simpan()">
                            Simpan
                        </button>
                        <router-link
                            to="/siswa"
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
            form: {}
        }
    },

    created(){
        axios.get('/api/user/' + this.$route.params.id)
        .then((res) => {
            console.log(res.data)
            this.form = res.data
        })
    },
    
    methods: {
        simpan(){
            Swal.fire({
                title: 'Apakah Yakin Data Akan Diubah ? ',
                icon: 'warning',
                confirmButtonText: 'OK',
                showCancelButton: true,
                cancelButtonText: 'Batal'
            })
            .then((update) => {
                if(update.isConfirmed){
                    axios.put('/api/user/'+this.$route.params.id, this.form)
                    .then((res) => {
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Berhasil Diubah',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        })

                        this.$router.push({
                            path: '/siswa'
                        })
                    })
                }
                else {
                    Swal.fire({
                        title: 'Gagal Ubah Data',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            })
            
        }
    }
}
</script>