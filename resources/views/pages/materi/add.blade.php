@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Tambah {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('materi') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Materi</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="materiId"
                placeholder="Nama Materi" />
            <small id="materiId" class="form-text text-muted">Masukkan nama materi</small>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
