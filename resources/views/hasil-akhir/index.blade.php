@extends('layouts.dashboard')

@section('judul', 'Data Hasil Akhir')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow border-0">
            <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5>Ranking</h5>
                <a href="{{ route('hasil-akhir.pdf') }}" class="btn btn-info  mb-3">Cetak PDF</a>
            </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Kode Alternatif</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking as $index => $kode)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kode }}</td>
                                <td>{{ number_format($vectorV[$kode], 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
