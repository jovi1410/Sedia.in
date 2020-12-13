@extends('layoutWarung.index')
@section('contentWarung')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>No Meja</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Metode Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status Meja</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>No Meja</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Metode Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status Meja</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($transaksi as $trk)
                    <tr>
                        <td>{{$trk->nama_pembeli}}</td>
                        @if($trk->no_meja == 99)
                        <td>Take Away</td>
                        @else
                        <td>{{$trk->no_meja}}</td>
                        @endif
                        <td>{{$trk->nama_menu}}</td>
                        <td>{{$trk->jumlah}}</td>
                        <td>Rp.{{$trk->total_harga}}</td>
                        <td>{{$trk->metode_pemesanan}}</td>
                        <td>{{$trk->created_at->format('l F Y H:i:s')}}</td>
                        <td>{{$trk->status_meja}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection