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
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="image" 
                                    @change="uploadFoto"
                                    ref="fotoInput"
                                    style="display : none">
                                <button 
                                    class="btn btn-primary btn-sm"
                                    @click.prevent="$refs.fotoInput.click()">
                                    Upload Foto
                                </button><br><br>
                                <img :src="previewFoto" alt="gagal upload foto" width="200px" height="200px">
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
            form: {},
            previewFoto: null
        }
    },

    created(){
        axios.get('/api/user/' + this.$route.params.id)
        .then((res) => {
            console.log(res.data)
            this.form = res.data
            this.previewFoto = '/storage/img/' + this.form.image
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
                    let data = new FormData;
                    data.append('nik', this.form.nik)
                    data.append('name', this.form.name)
                    data.append('kelas', this.form.kelas)
                    data.append('jenis_kelamin', this.form.jenis_kelamin)
                    data.append('alamat', this.form.alamat)
                    data.append('email', this.form.email)
                    data.append('password', this.form.password)
                    data.append('android_id', this.form.android_id)
                    data.append('image', this.form.image)
                    data.append('_method', 'put')
                    
                    axios.post('/api/user/'+this.$route.params.id, data)
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
            
        },

        uploadFoto(event){
            console.log(event.target.files[0])
            this.form.image = event.target.files[0]
            this.previewFoto = URL.createObjectURL(event.target.files[0])
        }
    }
}
</script>