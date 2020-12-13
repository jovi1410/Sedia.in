@extends('layoutWarung.index')
@section('contentWarung')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>
            User Profile
        </h3>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama </b> <a class="pull-right">{{auth()->user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="pull-right">{{auth()->user()->alamat}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No HP</b> <a class="pull-right">{{auth()->user()->no_hp}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{auth()->user()->email}}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
