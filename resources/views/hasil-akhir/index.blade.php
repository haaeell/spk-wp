@extends('layouts.dashboard')

@section('judul', 'Keputusan Akhir')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    @if (isset($errorMessage))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <div>
                                {{ $errorMessage }}
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-between">
                            <h5>Keputusan Akhir</h5>
                            <a href="{{ route('hasil-akhir.pdf') }}" class="btn btn-info mb-3">Cetak PDF</a>
                        </div>
                        <p>Keputusan ini didasarkan pada nilai akhir yang diperoleh dari proses perhitungan. Nilai tertinggi menempati peringkat pertama karena memiliki faktor-faktor yang lebih unggul dibandingkan lainnya.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Nama Poli</th>
                                    <th>Nilai Akhir</th>
                                    <th>Alasan Pemilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranking as $index => $kode)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kode }}</td>
                                        <td>{{ number_format($vectorV[$kode], 4) }}</td>
                                        <td>
                                            @if($index == 0)
                                                Poli ini memiliki nilai tertinggi karena memenuhi semua kriteria utama secara optimal.
                                            @else
                                                Poli ini memiliki nilai lebih rendah dibandingkan yang di atasnya karena faktor tertentu.
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
