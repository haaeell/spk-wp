@extends('layouts.dashboard')

@section('judul', 'Dashboard')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle "></i>
                    <div>
                        <h4 class="fw-semibold mb-0 mx-3">
                            Selamat Datang {{ Auth::user()->name }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role != 'pasien')
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Pasien</div>
                        <div class="card-body">
                            {{ $jumlahPasien }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Poli</div>
                        <div class="card-body">
                            {{ $jumlahPoli }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Kriteria</div>
                        <div class="card-body">
                            {{ $jumlahKriteria }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
