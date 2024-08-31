@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Detail Sub Materi {{ $sub_materi->name }}
    </h5>
    <hr>
    <h5 class="fw-bold">
        Nama Materi
    </h5>
    <p> {{ $sub_materi->material->name }} </p>
    <h5 class="fw-bold">
        Nama Sub Materi
    </h5>
    <p> {{ $sub_materi->name }} </p>
    <h5 class="fw-bold">
        Isi Materi
    </h5>
    <p> {!! $sub_materi->description !!} </p>
    @if ($sub_materi->img_path != '')
        <h5 class="fw-bold">
            Gambar
        </h5>
        <img src="{{ URL::asset('/storage/' . $sub_materi->img_path) }}" class="mb-3" alt=""> <br>
    @endif
    <a href="{{ url('sub-materi') }}" class="btn btn-warning">Kembali</a>
@endsection
