@extends('layoutWarung.index')
@section('contentWarung')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Tambah Menu</h1>
            <hr>
            <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            <!-- <form action="{{ url('/tambahMenuBaru') }}" method="post"> -->
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">nama menu:</label>
                    <input type="text" class="form-control" id="namamenu" name="namamenu">
                </div>
                <div class="form-group">
                    <label for="nohp">jenis menu:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="jenismenu">
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">harga:(Rp.)</label>
                    <input type="number" class="form-control" id="harga" name="harga"></input>
                </div>
                <div class="form-group">
                    <label for="alamat">stok:(/porsi)</label>
                    <input type="number" class="form-control" id="stok" name="stok"></input>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <label class="custom-file-label" for="inputGroupFile04">Pilih Foto</label>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <a type="reset" href="/daftar-menu"class="btn btn-md btn-danger">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
