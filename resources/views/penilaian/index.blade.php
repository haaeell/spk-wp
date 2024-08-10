@extends('layouts.dashboard')

@section('judul', 'Data Penilaian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- Table penilaian -->
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Kode Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->kode }}</th>
                                    @endforeach
                                    <th width="280px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $alternatif)
                                    <tr>
                                        <td>{{ $alternatif->kode }}</td>
                                        @foreach ($kriterias as $kriteria)
                                            @php
                                                $nilai = $rataRataPenilaian[$alternatif->id][$kriteria->id] ?? 0;
                                            @endphp
                                            <td>{{ $nilai }}</td>
                                        @endforeach
                                        <td>
                                           <form action="{{ route('penilaian.destroy', $alternatif->id) }}" method="POST">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="btn btn-danger">Delete</button>
                                           </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
