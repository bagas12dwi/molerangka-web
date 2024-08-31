@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Tambah {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('quiz-sub-materi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="material_id" class="form-label">Sub Materi</label>
            <select class="form-select form-select" name="sub_material_id" id="sub_material_id" required>
                <option selected>Pilih Sub Materi</option>
                @foreach ($submateri as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question_text" class="form-label">Pertanyaan</label>
            <textarea class="form-control" name="question_text" id="question_text" rows="3" required></textarea>
        </div>
        <h5 class="form-label">Jawaban</h5>
        <hr>
        <div class="mb-3">
            <label for="option_text1" class="form-label">Jawban A</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_correct1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Jawaban Benar
                </label>
            </div>
            <textarea class="form-control" name="option_text1" id="option_text1" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label for="option_text2" class="form-label">Jawban B</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_correct2" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Jawaban Benar
                </label>
            </div>
            <textarea class="form-control" name="option_text2" id="option_text2" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label for="option_text3" class="form-label">Jawban C</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_correct3" id="flexRadioDefault3">
                <label class="form-check-label" for="flexRadioDefault3">
                    Jawaban Benar
                </label>
            </div>
            <textarea class="form-control" name="option_text3" id="option_text3" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label for="option_text4" class="form-label">Jawban D</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_correct4" id="flexRadioDefault4">
                <label class="form-check-label" for="flexRadioDefault4">
                    Jawaban Benar
                </label>
            </div>
            <textarea class="form-control" name="option_text4" id="option_text4" rows="2" required></textarea>
        </div>

        <a href="{{ url('quiz-sub-materi') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
