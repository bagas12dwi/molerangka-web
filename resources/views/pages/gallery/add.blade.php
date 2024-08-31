@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Tambah {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('galeri') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea class="form-control" name="caption" id="caption" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Video Link</label>
            <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId"
                placeholder="Video Link" />
            <small id="helpId" class="form-text text-muted">Inputkan link untuk video</small>
        </div>

        <div class="mb-3">
            <label for="img_path" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Pilih Gambar" required />
        </div>
        <a href="{{ url('galeri') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
