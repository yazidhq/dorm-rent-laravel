@extends('admin.layout.template')

@section('konten')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">{{ Auth()->user()->name }}</h6>
                </div>
                <div class="card-body">
                    <style>
                        body {
                            background: -webkit-linear-gradient(left, #ececec, #d4d4d4);
                        }

                        .emp-profile {
                            padding: 0%;
                            margin-top: 3%;
                            margin-bottom: 3%;
                            border-radius: 0.5rem;
                            background: #fff;
                        }

                        .profile-img {
                            text-align: center;
                        }

                        .profile-img img {
                            width: 70%;
                            height: 100%;
                        }

                        .profile-img .file {
                            position: relative;
                            overflow: hidden;
                            margin-top: -20%;
                            width: 70%;
                            border: none;
                            border-radius: 0;
                            font-size: 15px;
                            background: #212529b8;
                        }

                        .profile-img .file input {
                            position: absolute;
                            opacity: 0;
                            right: 0;
                            top: 0;
                        }

                        .profile-head h5 {
                            color: #333;
                        }

                        .profile-head h6 {
                            color: #0062cc;
                        }

                        .profile-edit-btn {
                            border: none;
                            border-radius: 1.5rem;
                            width: 70%;
                            padding: 2%;
                            font-weight: 600;
                            color: #6c757d;
                        }

                        .proile-rating {
                            font-size: 12px;
                            color: #818182;
                            margin-top: 5%;
                        }

                        .proile-rating span {
                            color: #495057;
                            font-size: 15px;
                            font-weight: 600;
                        }

                        .profile-head .nav-tabs {
                            margin-bottom: 5%;
                        }

                        .profile-head .nav-tabs .nav-link {
                            font-weight: 600;
                            border: none;
                        }

                        .profile-head .nav-tabs .nav-link.active {
                            border: none;
                            border-bottom: 2px solid #0062cc;
                        }

                        .profile-work {
                            padding: 14%;
                            margin-top: -15%;
                        }

                        .profile-work p {
                            font-size: 12px;
                            color: #818182;
                            font-weight: 600;
                            margin-top: 10%;
                        }

                        .profile-work a {
                            text-decoration: none;
                            color: #495057;
                            font-weight: 600;
                            font-size: 14px;
                        }

                        .profile-work ul {
                            list-style: none;
                        }

                        .profile-tab label {
                            font-weight: 600;
                        }

                        .profile-tab p {
                            font-weight: 600;
                            color: #0062cc;
                        }
                    </style>

                    <div class="container emp-profile">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Terdapat field yang belum diisi..
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img"
                                    style="width: 350px; height: 350px; overflow: hidden; border-radius: 50%;">
                                    <img src="{{ auth()->user()->avatar == NULL ? asset('user-assets/img/noimage.jpg') : asset('storage/profile/'.auth()->user()->avatar) }}"
                                        alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h5>
                                        {{ Str::ucfirst(auth()->user()->name) }}
                                    </h5>
                                    <h6>
                                        {{ auth()->user()->email }}
                                    </h6>
                                    <p class="proile-rating" style="margin-bottom: 60px"></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Ganti
                                                Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Str::ucfirst(auth()->user()->name) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ auth()->user()->jekel == NULL ? '-' : auth()->user()->jekel }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ auth()->user()->alamat == NULL ? '-' : auth()->user()->alamat }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>WhatsApp</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ auth()->user()->number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ auth()->user()->pekerjaan == NULL ? '-' :
                                                    auth()->user()->pekerjaan }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ auth()->user()->status }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="col-12">
                                            <form action="{{ route('password_admin') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            
                                                <label for="password" class="form-label mb-2">Password Baru</label>
                                                <input type="password" name="password" class="form-control mb-2" required>
                                            
                                                <label for="password_confirmation" class="form-label mb-2">Konfirmasi Password Baru</label>
                                                <input type="password" name="password_confirmation" class="form-control mb-2" required>
                                            
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="profile-edit-btn" data-toggle="modal"
                                    data-target="#editProfile{{ auth()->user()->id }}">Edit
                                    Profile</button>
                                <div class="modal fade" id="editProfile{{ auth()->user()->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="lihatModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="lihatModalLabel">Edit Profile {{
                                                    Str::ucfirst(auth()->user()->name) }}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update-profile') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input hidden type="text" class="form-control" name="role"
                                                        value="admin">
                                                    <input hidden type="text" class="form-control" name="status"
                                                        value="Akun Aktif">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" class="form-control mb-3" name="name"
                                                                placeholder="Nama Lengkap"
                                                                value="{{ auth()->user()->name }}" required>
                                                            <select class="form-control mb-3" name="jekel">
                                                                <option
                                                                    value="{{ auth()->user()->jekel == NULL ? '' : auth()->user()->jekel }}">
                                                                    {{ auth()->user()->jekel == NULL ? 'Jenis Kelamin' :
                                                                    auth()->user()->jekel }}</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            <input type="text" class="form-control mb-3" name="number"
                                                                placeholder="Whatsapp"
                                                                value="{{ auth()->user()->number }}" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control mb-3" name="email"
                                                                placeholder="Email" value="{{ auth()->user()->email }}"
                                                                required>
                                                            <input type="text" class="form-control mb-3" name="alamat"
                                                                placeholder="Alamat"
                                                                value="{{ auth()->user()->alamat }}">
                                                            <input type="text" class="form-control mb-3"
                                                                name="pekerjaan" placeholder="Pekerjaan"
                                                                value="{{ auth()->user()->pekerjaan }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="password" name="password"
                                                                class="form-control mb-3"
                                                                value="{{ substr(auth()->user()->password, 0, 8) }}"
                                                                required>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="file" name="avatar" class="form-control mb-3"
                                                                value="{{ auth()->user()->avatar }}">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection