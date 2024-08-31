@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Edit {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('quiz-sub-materi/' . $question->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="material_id" class="form-label">Sub Materi</label>
            <select class="form-select form-select" name="sub_material_id" id="sub_material_id" required>
                <option selected>Pilih Sub Materi</option>
                @foreach ($submateri as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $question->sub_material_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question_text" class="form-label">Pertanyaan</label>
            <textarea class="form-control" name="question_text" id="question_text" rows="3" required>{{ $question->question_text }}</textarea>
        </div>
        <h5 class="form-label">Jawaban</h5>
        <hr>
        @foreach ($question->option as $option)
            <div class="mb-3">
                <label for="{{ 'option_text' . $option->id }}" class="form-label">Jawaban</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="{{ 'is_correct' . $option->id }}"
                        id="flexRadioDefault1" {{ $option->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Jawaban Benar
                    </label>
                </div>
                <textarea class="form-control" name="{{ 'option_text' . $option->id }}" id="{{ 'option_text' . $option->id }}"
                    rows="2" required>{{ $option->option_text }}</textarea>
            </div>
        @endforeach
        <a href="{{ url('quiz-sub-materi') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
