<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Hasil Ujian Siswa
            </div>

            <div class="panel-body">
                <table class="table-default">
                    <tr v-for="(form, index) in forms" :key="index">

                        <td class="middle">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <img :src="'storage/img/' + form.image" alt="Gagal Upload" width="120px" height="120px"> 
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">Data Siswa</h4>
                                    <address>
                                        Kelas: <b>{{ form.kelas }}</b> <br>
                                        Nama Siswa: <b>{{ form.name }}</b> <br>
                                        Jenis Kelamin: <b>{{ form.jenis_kelamin }}</b> <br>
                                        NIK: <b>{{ form.nik }}</b>
                                    </address>
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">Total Soal: {{ parseInt(form.benar) + parseInt(form.salah) + parseInt(form.kosong) }}</h4>
                                    <address>
                                        Jawaban Benar: <b>{{ form.benar }}</b> <br>
                                        Jawaban Salah: <b>{{ form.salah }}</b> <br>
                                        Jawaban Kosong: <b>{{ form.kosong }}</b> <br>
                                        Nilai Anda: <b>{{ form.nilai }}</b>
                                    </address>
                                </div>
                            </div>
                        </td>

                        <td class="middle">
                            <a href="#" class="btn btn-circle btn-danger btn-xs" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            forms:{},
        }
    }, 

    created(){
        axios.get('/api/nilai')
        .then((res) => {
            this.forms = res.data.data
            console.log(this.forms)
        })
    }
}
</script>
