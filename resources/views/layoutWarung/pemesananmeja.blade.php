@extends('layoutWarung.index')
@section('contentWarung')
<div class="row row-cols-1 row-cols-md-3 text-white">

  @foreach ($meja as $stokmeja)
  <div class="col mb-4">
    <!-- SUDAH TIDAK PAKE MODEL, PAKE ARRAY (CARA PANGGIL KOLOM BERBEDA) -->
    @if($stokmeja["status_meja"] == 0)
    <div class="card shadow bg-success" id="{{ $stokmeja['no_meja'] }}">
      <div class="card-body">
        <h1 class="card-title text-center">MEJA {{$stokmeja["no_meja"]}}</h1>
        <p class="">Pemesan : {{$stokmeja["nama_pembeli"]}}</p>
      </div>
    </div>
    @else
    <div class="card shadow bg-danger" id="{{$stokmeja['no_meja']}}">
      <div class="card-body">
        <div class="dropdown no-arrow" style="right: 2vh; position: absolute;">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" onclick="meja(this)">Kosongkan Meja</a>
          </div>
        </div>
        <h1 class="card-title text-center">MEJA {{$stokmeja['no_meja']}}</h1>
        <p class="">Pemesan : {{$stokmeja["nama_pembeli"]}}</p>
      </div>
    </div>
    @endif
  </div>
  @endforeach
  @stack('script')
  <script>
    //  href="{{url('stok_meja/')}}"
    function meja(elm) {
      // alert(elm.id);
      var no_meja = $(elm).parent().parent().parent().parent().attr('id');
      // alert(no_meja);
      var url = `{{url('stok_meja/` + no_meja + `')}}`;
      // alert(url);
      $.ajax({
        url: url,
        type: 'get',
        success: function() {
          $(elm).parent().parent().parent().parent().removeClass('bg-danger');
          $(elm).parent().parent().parent().parent().addClass('bg-success');
          $(elm).parent().parent().parent().parent().find('p').text('Pemesan : -');

        }
      });
    }
  </script>

  <a href="#" class="btn btn-primary btn-circle" style="position:fixed; z-index:4;bottom: 50px; right:50px;">
      <i class="fa fa-plus"></i>
  </a>
</div>
@endsection
