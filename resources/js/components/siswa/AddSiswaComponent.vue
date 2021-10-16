<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                Tambah Siswa
            </div>

            <div class="panel-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kelamin">Jenis Kelamin</label>
                                <select name="kelamin" id="kelamin" class="form-control">
                                    <option value=""></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Email Siswa</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control">
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
                            value="Simpan"
                            @click="simpan()">
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
export default {
    data(){
        return {

        }
    },
    
    methods: {
        simpan(){
            console.log('ee')
        }
    }
}
</script>