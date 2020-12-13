@extends('layoutWarung.index')
@section('contentWarung')

<div class="row mb-4">
  <h4 class="col">Daftar Makanan</h4>
  <!-- <div class="col align-self-end"> -->
  <a href="{{ route('menu.create')}}" class="btn btn-primary btn-icon-split" type="button" name="button">
      <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Menu</span>
  </a>
<!-- </div> -->
</div>
<div class="card-deck">
  @foreach($makanan as $product)
  <div class="card shadow" style="width: 200px; max-width: 200px;">
    <img src="{{ url('/avatar_product/'.$product->avatar) }}" style="width: 200px; object-fit: cover; height: 100px;">
    <div class="card-body">
      <h5 class="card-title">{{$product->nama_menu}}</h5>
      <p >Harga: {{$product->harga}}</p>
      <p ><small class="text-muted">Stok: {{$product->stok}}</small></p>
      <a href="/menu/{{$product->id}}/edit" class="btn btn-warning">edit</a>
      <a href="/menu/{{$product->id}}/delete" class="btn btn-danger">Hapus</a>
    </div>
  </div>
  @endforeach
</div>

<div class="row mb-4">
  <h4 class="col">Daftar Minuman</h4>
  <!-- <div class="col align-self-end"> -->
<!-- </div> -->
</div>
<div class="card-deck">
@foreach($minuman as $product)
<div class="card shadow" style="width: 200px; max-width: 200px;">
  <img src="{{asset('/avatar_product/'.$product->avatar)}}" class="card-img-top" style="width: 200px; object-fit: cover; height: 100px;">
  <div class="card-body">
    <h5 class="card-title">{{$product->nama_menu}}</h5>
    <p class="card-text">Harga: {{$product->harga}}</p>
    <p class="card-text"><small class="text-muted">Stok: {{$product->stok}}</small></p>
    <a href="/menu/{{$product->id}}/edit" class="btn btn-warning">edit</a>
    <a href="/menu/{{$product->id}}/delete" class="btn btn-danger">Hapus</a>
  </div>
</div>
@endforeach
</div>
@endsection
