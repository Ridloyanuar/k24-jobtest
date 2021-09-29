@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Profile') }}

                    <a href="/profile/edit" style="text-align: right;">Edit Profile</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="{{url('profile/', $member->profile->foto_diri)}}" alt="Image" width="150" height="100"/>
                    <h4>Name: {{$member->name}}</h4>
                    <h4>Email: {{$member->email}}</h4>
                    <h4>No HP: {{$member->profile->no_hp}}</h4>
                    <h4>Tanggal Lahir: {{$member->profile->tanggal_lahir}}</h4>
                    <h4>Jenis Kelamin: {{$member->profile->jenis_kelamin}}</h4>
                    <h4>No KTP: {{$member->profile->no_ktp}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
