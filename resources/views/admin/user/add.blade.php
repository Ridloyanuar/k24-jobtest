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
                  <li class="breadcrumb-item"><a href="{{url('admin/user')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
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
                  <h3 class="mb-0">Tambah Admin </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="{{ url('admin/user/added') }}">
                {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">member information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Email</label>
                        <input type="email" id="input-first-name" class="form-control" placeholder="Email" name="email">
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

                </div>

                

                <div class="text-right">
                  <input type="submit" class="btn btn-primary my-4" value="Tambah User">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection