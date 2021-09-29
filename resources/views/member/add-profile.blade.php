@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('profile/created') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="string" type="text" class="form-control @error('email') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="string" type="date" class="form-control @error('email') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">

                            <select class="form-control form-control-alternative" name="jenis_kelamin" id="produk" required>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                            </select>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('No KTP') }}</label>

                            <div class="col-md-6">
                                <input id="string" type="text" class="form-control @error('email') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Foto Diri') }}</label>

                            <div class="col-md-6">
                                <input id="string" type="file" class="form-control @error('email') is-invalid @enderror" name="foto_diri" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
