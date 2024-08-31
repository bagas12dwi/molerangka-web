@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Edit {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('materi/' . $materi->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Materi</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="materiId"
                placeholder="Nama Materi" value="{{ $materi->name }}" />
            <small id="materiId" class="form-text text-muted">Masukkan nama materi</small>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
