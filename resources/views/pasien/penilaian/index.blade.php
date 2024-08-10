@extends('layouts.dashboard')

@section('judul', 'Penilaian Pasien')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ $message }}</p>
                        </div>
                        <img src="https://www.pushengage.com/wp-content/uploads/2023/04/How-to-Create-a-Thank-You-Page.png" alt="Terima Kasih" class="img-fluid">
                    @elseif (!$hasRated)
                        <form method="POST" action="{{ route('penilaian.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="alternatif_id" class="col-md-4 col-form-label text-md-end">Ruangan Poli</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="alternatif_id" id="alternatif_id" value="{{ $pasien->poli->id }}">
                                    <input type="text" name="poli_id" id="poli_id" class="form-control" readonly value="{{ $pasien->poli->nama }}">

                                    @error('alternatif_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Kriteria</th>
                                                <th>Penilaian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kriterias as $kriteria)
                                                <tr>
                                                    <td>{{ $kriteria->nama }}</td>
                                                    <td>
                                                        <div class="form-check">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="penilaian[{{ $kriteria->id }}]" id="nilai{{ $kriteria->id }}_{{ $i }}" value="{{ $i }}">
                                                                    <label class="form-check-label" for="nilai{{ $kriteria->id }}_{{ $i }}">
                                                                        {{ $i }}
                                                                    </label>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @error('penilaian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan Penilaian
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info text-center">
                            <p>Anda sudah pernah melakukan penilaian.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
