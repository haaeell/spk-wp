@extends('layouts.dashboard')

@section('judul', 'Data Perhitungan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow border-0">
            <div class="card-body">
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
                        @foreach($alternatif as $kode => $nilai)
                            <tr>
                                <td>{{ $kode }}</td>
                                <td>{{$vectorS[$kode] }}</td>
                                <td>{{$vectorV[$kode] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

              
            </div>
        </div>
    </div>
</div>
@endsection
