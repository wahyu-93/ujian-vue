<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Home
            </div>

            <div class="panel-body">
                <h2>Selamat Datang</h2>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Siswa Lulus
                            </div>      

                            <div class="panel-body">
                                {{ form.lulus }} Orang
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Siswa Tidak Lulus
                            </div>      

                            <div class="panel-body">
                                {{ form.tdkLulus }} Orang
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Jumlah Siswa
                            </div>      

                            <div class="panel-body">
                                {{ form.user }} Orang
                            </div>
                        </div>
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
            form: {}   
        }
    }, 

    mounted(){
        axios.get('api/dashboard')
        .then((response) => {
            this.form = response.data
        })
    }
}
</script>