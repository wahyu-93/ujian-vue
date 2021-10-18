<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                Edit Soal
            </div>

            <div class="panel-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea name="soal" id="soal" rows="5" class="form-control" v-model="form.soal"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jawaban_a">Jawaban A</label>
                                <input type="text" name="jawaban_a" id="jawaban_a" class="form-control" v-model="form.jawaban_a">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jawaban_b">Jawaban B</label>
                                <input type="text" name="jawaban_b" id="jawaban_b" class="form-control" v-model="form.jawaban_b">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jawaban_c">Jawaban C</label>
                                <input type="text" name="jawaban_c" id="jawaban_c" class="form-control" v-model="form.jawaban_c">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jawaban_d">Jawaban D</label>
                                <input type="text" name="jawaban_d" id="jawaban_d" class="form-control" v-model="form.jawaban_d">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kunci_jawaban">Kunci Jawaban</label>
                                <select name="kunci_jawaban" id="kunci_jawaban" class="form-control" v-model="form.kunci_jawaban">
                                    <option value=""></option>
                                    <option value="a">Jawaban A</option>
                                    <option value="b">Jawaban B</option>
                                    <option value="c">Jawaban C</option>
                                    <option value="d">Jawaban D</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" v-model="form.status">
                                    <option value=""></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="NonAktif">Non Aktif</option>
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
                            to="/soal"
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
        return{
            form:{}
        }
    },

    created(){
        axios.get('/api/soal/' + this.$route.params.id)
        .then((res) => {
            this.form = res.data.data
        })
    },

    methods: {
        simpan(){
            axios.put('/api/soal/' + this.$route.params.id, this.form)
            .then((res) => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Berhasil Ubah Data',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })

                this.$router.push({
                    path: '/soal'
                })
            })
        }
    }
}
</script>