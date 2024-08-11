<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-5">
            <div class="col-md-8">
                <div class="card shadow border-success p-3 rounded-4">
                    <h3 class="fw-bold text-center my-3">
                        Register
                    </h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{ __('Nama') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <!-- New fields for pasien -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="no_identitas" class="form-label">{{ __('No Identitas') }}</label>
                                    <input id="no_identitas" type="text" class="form-control @error('no_identitas') is-invalid @enderror" name="no_identitas" value="{{ old('no_identitas') }}" required>
                                    @error('no_identitas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label for="jenis_pasien" class="form-label">{{ __('Jenis Pasien') }}</label>
                                    <select id="jenis_pasien" class="form-select @error('jenis_pasien') is-invalid @enderror" name="jenis_pasien" required>
                                        <option value="bpjs">{{ __('BPJS') }}</option>
                                        <option value="kis">{{ __('KIS') }}</option>
                                        <option value="umum">{{ __('Umum') }}</option>
                                    </select>
                                    @error('jenis_pasien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
                                    <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
                                    <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="poli_id" class="form-label">{{ __('Ruangan Poli') }}</label>
                                    <select id="poli_id" class="form-select @error('poli_id') is-invalid @enderror" name="poli_id" required>
                                        @foreach($alternatifs as $alternatif)
                                            <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('poli_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="p-2 btn btn-primary w-100 d-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
