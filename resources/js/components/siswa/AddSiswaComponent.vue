<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                Tambah Siswa
            </div>

            <div class="panel-body">
                <form action="">
                    <input type="hidden" name="android_id" v-model="form.android_id = form.nik">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" v-model="form.nik">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama Siswa</label>
                                <input type="text" name="name" id="name" class="form-control" v-model="form.name">
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
            form: {
                nik: null,
                name: null,
                kelas: null,
                jenis_kelamin: null,
                alamat: null,
                email: null,
                password: null,
                android_id: null,
                image: null
            },
            previewFoto: '/storage/img/user.png'
        }
    },
    
    methods: {
        simpan(){
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

            axios.post('/api/user',data)
            .then((res) => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data Berhasil Disimpan',
                    icon: 'success',
                    confirmButtonText: 'ok'
                })

                this.$router.push({
                    path: '/siswa'
                })
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