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
            <table class="table-default">
                <tr>
                    <td class="middle">
                        <div class="media">
                            <div class="media-left media-middle">
                                <img src="/assets/foto/luffy.jpg"  alt="Gagal Upload" width="120px" height="120px"> 
                            </div>

                            <div class="media-body">
                                <address>
                                    Username: Username <br>
                                    Nama Siswa: Nama Siswa <br>
                                    Jenis Kelamin: Jenis Kelamin <br>
                                    Status: Status <br>
                                    Kelas: Kelas <br>
                                    Nik: Nik
                                </address>
                            </div>
                        </div>         
                    </td>

                    <td class="middle" width="150">
                        <a href="#" class="btn btn-circle btn-danger" title="Edit">
                            <i class="fa fa-pencil-alt"></i>
                        </a> 
                        <a href="#" class="btn btn-circle btn-danger" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-circle btn-danger" title="Aktif">
                            <i class="fa fa-check"></i>
                        </a>
                        <a href="#" class="btn btn-circle btn-danger" title="Non Aktif">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</template>