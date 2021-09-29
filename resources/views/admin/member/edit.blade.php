@extends('admin-master')

@section('content')

<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{url('admin/home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{url('admin/member')}}">Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Member </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="edited" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">member information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="Name" name="name" value="{{$member->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Email</label>
                        <input type="email" id="input-first-name" class="form-control" placeholder="Email" name="email" value="{{$member->email}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="input-first-name" class="form-control" placeholder="Password" name="password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Confirm Password</label>
                        <input type="password" id="input-first-name" class="form-control" placeholder="Password Confirmation" name="password_confirmation">
                      </div>
                    </div>
                  </div>

                <hr class="my-4" />

                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">No Handphone</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="No Handphone" name="no_hp" value="{{$member->profile->no_hp}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Tanggal Lahir</label>
                        <input type="date" id="input-first-name" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{$member->profile->tanggal_lahir}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Jenis Kelamin</label>
                        <select class="form-control form-control-alternative" name="jenis_kelamin" id="produk" required>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">No KTP</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="No KTP" name="no_ktp" value="{{$member->profile->no_ktp}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Foto Diri</label>
                        <input type="file" id="input-first-name" class="form-control" placeholder="Foto Diri" name="foto_diri" value="{{$member->profile->foto_diri}}">
                      </div>
                    </div>
                  </div>

                </div>

                

                <div class="text-right">
                  <input type="submit" class="btn btn-primary my-4" value="Edit User">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection