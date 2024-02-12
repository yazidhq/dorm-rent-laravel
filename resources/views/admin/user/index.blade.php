@extends('admin.layout.template')

@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
        <div class="align-item-end">
            <a href="" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Refresh Page
            </a>
        </div>
    </div>

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

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Nomor WhatsApp</th>
                                <th>Status User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user as $item)
                            @if ($item->role == 'user')
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->number }}</td>
                                <td>
                                    <button
                                        class="badge bg-{{ $item->status == 'Tidak Aktif' ? 'warning' : 'success' }} border-0">
                                        {{ $item->status == 'Tidak Aktif' ? 'Tidak Aktif' : 'Akun Aktif' }}
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start gap-2">
                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                            data-target="#showUser{{ $item->id }}"><i class="bi bi-eye"></i></button>
                                        <div class="modal fade" id="showUser{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="lihatModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="lihatModalLabel">Data
                                                            User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item"><strong>Nama User :</strong> {{ $item->name }}</li>
                                                            <li class="list-group-item"><strong>Email :</strong> {{ $item->email }}</li>
                                                            <li class="list-group-item"><strong>Jenis Kelamin :</strong> {{ $item->jekel }}</li>
                                                            <li class="list-group-item"><strong>Alamat :</strong> {{ $item->alamat }}</li>
                                                            <li class="list-group-item"><strong>WhatsApp :</strong> {{ $item->number }}</li>
                                                            <li class="list-group-item"><strong>Pekerjaan :</strong> {{ $item->pekerjaan }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-warning" type="button" data-toggle="modal"
                                            data-target="#editUser{{ $item->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="lihatModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="lihatModalLabel">Edit
                                                            User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('user.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <input type="hidden" name="role" value="user">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="role">Role</label>
                                                                        <select name="role" id="" class="form-control">
                                                                            <option hidden value="{{ $item->role }}">{{
                                                                                $item->role }}</option>
                                                                            <option value="user">User</option>
                                                                            <option value="admin">Admin</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id=""
                                                                            class="form-control">
                                                                            <option hidden value="{{ $item->status }}">
                                                                                {{ $item->status }}</option>
                                                                            <option value="Akun Aktif">Akun Aktif
                                                                            </option>
                                                                            <option value="Tidak Aktif">Tidak Aktif
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="name">Nama Lengkap</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $item->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email" name="email"
                                                                            value="{{ $item->email }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="jekel">Jenis Kelamin</label>
                                                                        <select name="jekel" id="" class="form-control">
                                                                            <option hidden value="{{ $item->jekel }}">{{
                                                                                $item->jekel }}</option>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="alamat">Alamat</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamat" name="alamat"
                                                                            value="{{ $item->alamat }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="pekerjaan">Pekerjaan</label>
                                                                        <input type="text" class="form-control"
                                                                            id="pekerjaan" name="pekerjaan"
                                                                            value="{{ $item->pekerjaan }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group mb-4">
                                                                        <label for="text">WhastApp</label>
                                                                        <input type="text" class="form-control"
                                                                            id="number" name="number"
                                                                            value="{{ $item->number }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-4">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password"
                                                                    value="{{ substr($item->password, 0, 8) }}">
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                            class="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection