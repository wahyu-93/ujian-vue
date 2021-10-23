@extends('layouts.content')

@section('content')
    <div class="row">
        <div class="col-md-9">
            @include('soal._listSoal')     
        </div>

        <div class="col-md-3">
            @include('soal._identitas')  
        </div>
    </div>
@endsection