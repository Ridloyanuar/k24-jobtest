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
                  <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Admin</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('admin/user/add')}}" class="btn btn-sm btn-primary">Tambah Data Admin</a>
                </div>
              </div>
            </div>

            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nama</th>
                    <th scope="col" class="sort" data-sort="budget">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($admins as $admin)
                  <tr>
                    <th scope="row">
                        <div class="media-body">
                          {{$admin->name}}
                        </div>
                    </th>
                    <td class="budget">
                      {{$admin->email}}
                    </td>
                    

                    <td>
                      <a class="btn btn-sm btn-warning" href="user/{{$admin->id}}/edit">edit</a>
                      <a class="btn btn-sm btn-danger" href="user/{{$admin->id}}/deleted">delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

@endsection
