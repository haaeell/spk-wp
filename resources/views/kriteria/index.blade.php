@extends('layouts.dashboard')

@section('judul', 'Data kriteria')
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

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- Button untuk memunculkan modal create -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
                            Tambah kriteria
                        </button>

                        <!-- Table kriteria -->
                        <table class="table table-bordered mt-3">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Bobot</th>
                                <th>Jenis</th>
                                <th width="280px">Aksi</th>
                            </tr>
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $kriteria->kode }}</td>
                                    <td>{{ $kriteria->nama }}</td>
                                    <td>{{ $kriteria->bobot * 100  }}%</td>
                                    <td>{{ $kriteria->cost_benefit }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editModal{{ $kriteria->id }}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $kriteria->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $kriteria->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit kriteria</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="kode" class="form-label">Kode</label>
                                                        <input type="text" name="kode" class="form-control"
                                                            id="kode" value="{{ $kriteria->kode }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            id="nama" value="{{ $kriteria->nama }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bobot" class="form-label">Bobot</label>
                                                        <input type="number" name="bobot" class="form-control"
                                                            id="bobot" value="{{ $kriteria->bobot * 100 }}" step="0.01">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cost_benefit" class="form-label">Cost/Benefit</label>
                                                        <select name="cost_benefit" id="cost_benefit" class="form-control">
                                                            <option value="cost"
                                                                {{ $kriteria->cost_benefit == 'cost' ? 'selected' : '' }}>
                                                                Cost</option>
                                                            <option value="benefit"
                                                                {{ $kriteria->cost_benefit == 'benefit' ? 'selected' : '' }}>
                                                                Benefit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $kriteria->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus kriteria</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus kriteria ini?</p>
                                                    <p><strong>{{ $kriteria->kode }} - {{ $kriteria->nama }}</strong>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot</label>
                            <input type="number" name="bobot" class="form-control" id="bobot" required step="0.01" min="0" max="100">
                        </div>
                        <div class="mb-3">
                            <label for="cost_benefit" class="form-label">Cost/Benefit</label>
                            <select name="cost_benefit" id="cost_benefit" class="form-control" required>
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
