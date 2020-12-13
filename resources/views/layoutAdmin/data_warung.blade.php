@extends('layoutAdmin.index')
@section('contentAdmin')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if(session ('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Data Akun Pemilik Warung</h6>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Nama Warung</th>
                                    <th>Stok Meja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warung as $index)

                                <tr>
                                    <td>{{$index->name}}</td>
                                    <td>{{$index->alamat}}</td>
                                    <td>{{$index->no_hp}}</td>
                                    <td>{{$index->email}}</td>
                                    <td>{{$index->nama_warung}}</td>
                                    <td>{{$index->stok_meja}}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <a href="#" class="btn btn-success btn-sm"> Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Pemilik Warung</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/warung/create" method="post">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nama</label>
                                                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Alamat</label>
                                                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">No HP</label>
                                                                <input name="no_hp" class="form-control" id="exampleFormControlTextarea1" type="text"></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Nama Warung</label>
                                                                <input name="nama_warung" class="form-control" id="exampleFormControlTextarea1" type="text" ></input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Stok Meja</label>
                                                                <input name="stok_meja" class="form-control" id="exampleFormControlTextarea1" type="number"></input>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
</div>

@endsection
