@extends('layouts.dashboard')

@section('judul', 'Data Perhitungan')

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
                        <h4 class="card-title">Data Perhitungan </h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Alternatif</th>
                                    <th>Vector S</th>
                                    <th>Vector V</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $kode => $nilai)
                                    <tr>
                                        <td>{{ $kode }}</td>
                                        <td>{{ $vectorS[$kode] }}</td>
                                        <td>{{ $vectorV[$kode] }}</td>
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
