<form action="" method="post">  
    @csrf
    <input type="hidden" name="jumlah_soal" value="{{ $soals->count() }}">
    @foreach($soals as $key => $soal)
    <div class="panel panel-primary">
        <div class="panel-heading">
            {{ $key+1 }}. {{ $soal->soal }}
        </div>
        
        <div class="panel-body">
                <input type="hidden" name="id[]" value="{{ $soal->id }}">
                <input type="radio" name="jawabanSoal[{{ $soal->id }}]" id="jawaban_a" value="a"> A. {{ $soal->jawaban_a }} <br>
                <input type="radio" name="jawabanSoal[{{ $soal->id }}]" id="jawaban_b" value="b"> B. {{ $soal->jawaban_b }} <br>
                <input type="radio" name="jawabanSoal[{{ $soal->id }}]" id="jawaban_c" value="c"> C. {{ $soal->jawaban_c }} <br>
                <input type="radio" name="jawabanSoal[{{ $soal->id }}]" id="jawaban_d" value="d"> D. {{ $soal->jawaban_d }} <br>
            </div>
        </div>
    @endforeach
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <input type="submit" value="Submit" class="btn btn-success btn-sm">
            <input type="reset" value="Reset" class="btn btn-danger btn-sm">  
        </div>
    </div>
</form>