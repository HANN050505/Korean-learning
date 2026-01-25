@extends('admin.layouts.dashboard')

@section('title', 'Bank Soal')

@section('admin.content')
<p></p>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Soal: {{ $lesson->title }}</h1>
        <a href="{{ route('admin.quizzes') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Soal Baru</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.quizzes.store_question', $lesson->id) }}" method="POST">
                        @csrf
                        
                        {{-- Pertanyaan --}}
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <textarea name="question" class="form-control" rows="3" required placeholder="Tulis soal di sini..."></textarea>
                        </div>

                        {{-- Pilihan A & B --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Opsi A</label>
                                <input type="text" name="option_a" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Opsi B</label>
                                <input type="text" name="option_b" class="form-control" required>
                            </div>
                        </div>

                        {{-- Pilihan C & D --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Opsi C</label>
                                <input type="text" name="option_c" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Opsi D</label>
                                <input type="text" name="option_d" class="form-control" required>
                            </div>
                        </div>

                        {{-- Kunci Jawaban --}}
                        <div class="form-group">
                            <label class="font-weight-bold text-success">Kunci Jawaban</label>
                            <select name="correct_answer" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Jawaban Benar --</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <p></p>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Simpan Soal
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Soal Tersedia ({{ $lesson->quiz ? $lesson->quiz->questions->count() : 0 }})</h6>
                </div>
                <div class="card-body">
                    @if($lesson->quiz && $lesson->quiz->questions->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 50%">Soal</th>
                                        <th style="width: 30%">Opsi & Kunci</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lesson->quiz->questions as $index => $q)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $q->question }}</td>
                                        {{-- GANTI BAGIAN <td> OPSI DENGAN INI --}}
                                        <td>
                                            <ul class="list-unstyled mb-0 text-sm">
                                                {{-- LOGIKA UNTUK OPSI A --}}
                                                @php
                                                    // Cek apakah data ada di kolom 'option_a' (Input Manual) atau di tabel relasi (Seeder)
                                                    $textA = $q->option_a ?? ($q->options[0]->option_text ?? '-');
                                                    // Cek apakah ini jawaban benar (Logic Form 'a' ATAU Logic Seeder 'is_correct')
                                                    $isCorrectA = ($q->correct_answer == 'a') || (isset($q->options[0]) && $q->options[0]->is_correct);
                                                @endphp
                                                <li class="{{ $isCorrectA ? 'text-success font-weight-bold' : '' }}">
                                                    A: {{ $textA }}
                                                    @if($isCorrectA) <i class="fas fa-check"></i> @endif
                                                </li>

                                                {{-- LOGIKA UNTUK OPSI B --}}
                                                @php
                                                    $textB = $q->option_b ?? ($q->options[1]->option_text ?? '-');
                                                    $isCorrectB = ($q->correct_answer == 'b') || (isset($q->options[1]) && $q->options[1]->is_correct);
                                                @endphp
                                                <li class="{{ $isCorrectB ? 'text-success font-weight-bold' : '' }}">
                                                    B: {{ $textB }}
                                                    @if($isCorrectB) <i class="fas fa-check"></i> @endif
                                                </li>

                                                {{-- LOGIKA UNTUK OPSI C --}}
                                                @php
                                                    $textC = $q->option_c ?? ($q->options[2]->option_text ?? '-');
                                                    $isCorrectC = ($q->correct_answer == 'c') || (isset($q->options[2]) && $q->options[2]->is_correct);
                                                @endphp
                                                <li class="{{ $isCorrectC ? 'text-success font-weight-bold' : '' }}">
                                                    C: {{ $textC }}
                                                    @if($isCorrectC) <i class="fas fa-check"></i> @endif
                                                </li>

                                                {{-- LOGIKA UNTUK OPSI D --}}
                                                @php
                                                    $textD = $q->option_d ?? ($q->options[3]->option_text ?? '-');
                                                    $isCorrectD = ($q->correct_answer == 'd') || (isset($q->options[3]) && $q->options[3]->is_correct);
                                                @endphp
                                                <li class="{{ $isCorrectD ? 'text-success font-weight-bold' : '' }}">
                                                    D: {{ $textD }}
                                                    @if($isCorrectD) <i class="fas fa-check"></i> @endif
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.questions.delete', $q->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus soal ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-gray-500 mb-0">Belum ada soal untuk materi ini.</p>
                            <small>Silakan input soal melalui formulir di samping.</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection