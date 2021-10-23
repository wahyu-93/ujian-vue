<div class="panel panel-primary">
    <div class="panel-heading">
        Identias Siswa
    </div>

    <div class="panel-body">
        NIK  : <b>{{ Auth::user()->nik}}</b> <br>
        Nama : <b>{{ Auth::user()->name }}</b> <br>
        Jenis Kelamin : <b>{{ Auth::user()->jenis_kelamin }}</b> <br>
        Kelas : <b>{{ Auth::user()->kelas }}</b> <br>
        <img src="{{ asset('/storage/img/' . Auth::user()->image) }}" alt="Gagal Upload Foto" width="150" height="250" class="img-thumbnail">
    </div>
</div>

@if($nilai)
    <div class="panel panel-primary">
        <div class="panel-heading">
            Ket : {{ $nilai->keterangan  }}
        </div>

        <div class="panel-body">
            <h5>Nilai Anda : </h5>
            <p>Jawaban Benar : <b>{{ $nilai->benar }}</b></p>
            <p>Jawaban salah : <b>{{ $nilai->salah }}</b></p>
            <p>Jawaban kosong : <b>{{ $nilai->kosong }}</b></p>
            <p>Score Anda</p>
            <h3><b>{{ $nilai->score }}</b></h3>
        </div>
    </div>
@endif