@extends('layouts.dashboard')
@section('judul', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @for ($i = 0; $i < 3; $i++)
                <div class="col-md-4">
                    <div class=" card">
                        <div class="card-header">Data {{ rand(1, 100) }}</div>
    
                        <div class="card-body">
                            {{ rand(1, 10) }}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
