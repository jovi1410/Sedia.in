@extends('layoutWarung.index')
@section('contentWarung')
<style>
    .panel-transaksi {
        width: 35em;
        z-index: 2;
        position: fixed;
        right: 0;
        top: 10vh;
    }

    .card {
        min-width: 150px;
        max-width: 150px;
        min-height: 170px;
        max-height: 170px;
        cursor: pointer;
    }

    .card:hover {
        -webkit-box-shadow: 9px 7px 62px -17px rgba(0, 0, 0, 0.55);
        -moz-box-shadow: 9px 7px 62px -17px rgba(0, 0, 0, 0.55);
        box-shadow: 9px 7px 62px -17px rgba(0, 0, 0, 0.55);
    }

    .card img {
        /* width: 200px; */
        object-fit: cover;
        height: 90px;
    }

    .card .product-status {
        position: absolute;
        top: -3vh;
        right: -2vh;
        display: none;
    }

    #pilih-meja {
        max-width: 200px;
        cursor: pointer;
    }

    #pilih-meja a {
        text-decoration: none;
    }

    #pilih-meja #no-meja:hover {
        font-weight: bolder;
    }

    #product-checkout {
        max-height: 30vh;
        overflow-y: auto;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .fade {
        transition: opacity 0.2s linear !important;
    }
</style>
<div role="alert" id="success-toast" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-delay="2500" style="position: absolute;z-index: 5;width: 40vh;">
    <div class="toast-header">
        <img src="{{asset('brand-logo.png')}}" height="25" class="rounded mr-2" alt="...">
        <strong class="my-0 mr-auto h5 font-weight-bold">Sedia.in</strong>
        <button type="button" class="ml-5 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body text-success h6 px-3">
        <i class="fa fa-check-circle mx-2" aria-hidden="true"></i> Transaksi Berhasil !!
    </div>
</div>
<div role="alert" id="failed-toast" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-delay="2500" style="position: absolute;z-index: 5;width: 40vh;">
    <div class="toast-header">
        <img src="{{asset('brand-logo.png')}}" height="25" class="rounded mr-2" alt="...">
        <strong class="my-0 mr-auto h5 font-weight-bold">Sedia.in</strong>
        <button type="button" class="ml-5 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body text-danger h6 px-3">
        <i class="fa fa-exclamation-circle mx-2" aria-hidden="true"></i> Transaksi Gagal !!
    </div>
</div>
<div class="alert alert-success alert-dismissible shadow fade show p-3" role="alert" style="position: absolute;z-index: 5;">
    <strong>Transaksi Berhasil</strong> Have A Nice Day {{Auth::user()->name}} ;)
    <button type="button" class="btn btn-outline-dark ml-5" onclick="location.reload()">
        Transaksi Baru
    </button>
</div>
<h2 class="mb-5">Pemesanan</h2>
<div class="row">
    <div class="col-8">

        <div class="card-title">
            <h4>Makanan</h4>
        </div>
        <div class="card-deck">
            @foreach ($makanan as $product)
            <div class="card mb-2" onclick="toCheckout(this)">
                <div class="h3 text-success product-status">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <img class="m-0" src="{{ url('/avatar_product/' . $product->avatar) }}">
                <div class="card-footer" id="{{ $product->id }}">
                    <span class="d-block align-middle m-0" id="product-nama">{{ $product->nama_menu }}</span>
                    <span class="align-middle m-0" id="product-harga">{{ $product->harga }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="my-5"></div>
        <div class="card-title">
            <h4>Minuman</h4>
        </div>
        <div class="card-deck">
            @foreach ($minuman as $product)
            <div class="card mb-2" onclick="toCheckout(this)">
                <div class="h3 text-success product-status">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <img class="m-0" src="{{ url('/avatar_product/' . $product->avatar) }}">
                <div class="card-footer" id="{{ $product->id }}">
                    <span class="d-block align-middle" id="product-nama">{{ $product->nama_menu }}</span>
                    <span class="align-middle" id="product-harga">{{ $product->harga }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="panel-transaksi shadow p-3 text-info bg-white col-4" id="panel-transaksi">
        <h4 class="font-weight-bold text-center">ORDER CHECKOUT</h4>


        <hr class="sidebar-divider">

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama Pembeli" name="pseudo_nama_pembeli" id="pseudo_nama_pembeli" required>
        </div>
        <!-- Order Selection -->
        <div class="form-group">
            <select class="form-control" id="order-methode" name="order-method" required>
                <option value="dinein">Dine In</option>
                <option value="takeaway">Take Away</option>
            </select>
        </div>

        <div class="row">

            <div class="dropdown col-lg-6">
                <button class="form-control dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pilih Nomor Meja
                </button>
                <div class="dropdown-menu text-center p-2" id="pilih-meja" aria-labelledby="dropdownMenuButton">
                    @foreach ($meja as $stokmeja)
                    <div class="d-inline-flex btn-success d-inline py-2 px-3 my-2 mx-1" onclick="resvTable(this)">
                        <a class="text-white">{{ $stokmeja->no_meja }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 pt-2">
                <span class="h5 my-0 font-weight-bold">Meja: <span id="no-meja" data-status-meja="" data-meja=""></span></span>
            </div>
        </div>
        <hr class="sidebar-divider">

        <h5>Products Checkout</h5>
        <div class="p-1" style="background-color: #eee;border-radius: 4px;">
            <div class="container-fluid" id="product-checkout">
                <p class="text-muted text-center my-4">Product Checkout Kosong :(</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-dark">
                <h5 class="font-weight-bold">TOTAL</h5>
            </div>
            <div class="col-8 text-dark h5 font-weight-bold text-right">
                Rp.<span id="checkoutTotalHarga">-</span>
            </div>
        </div>
        <button class="btn btn-success btn-block" id="submitCheckoutForm" type="submit">Bayar</button>

    </div>
</div>

@stack('script')
<script>
    $('.alert').hide();
    function resvTable(idMeja) {
        var no_meja = $(idMeja).find('a').text();
        $('#no-meja').html(no_meja);
        $('#no-meja').attr('data-meja', no_meja);
        $('#no-meja').attr('data-status-meja', 1);
    }

    $('select[name="order-method"]').change(function() {
        var order_method = $(this).val();
        if (order_method == 'takeaway') {
            $("#dropdownMenuButton").prop("disabled", true);
            $('#no-meja').addClass('text-secondary');
            $('#no-meja').html('-');
            $('#no-meja').attr('data-meja', 99);
            $('#no-meja').attr('data-status-meja', 0);
        } else {
            $("#dropdownMenuButton").prop("disabled", false);
            $('#no-meja').removeClass('text-secondary');
            $('#no-meja').html('');
            $('#no-meja').attr('data-meja', '');
            $('#no-meja').attr('data-status-meja', '');
        }
    });


    var id_product;
    var harga_product
    var item;
    var countItemCheckout = 0;
    var checkoutTotalHarga = 0;

    function toCheckout(prod) {
        $(prod).css('pointer-events', 'none');
        $(prod).find('.product-status').show();
        var nama_product = $(prod).find('.card-footer #product-nama').text();
        harga_product = $(prod).find('.card-footer #product-harga').text();
        id_product = $(prod).find('.card-footer').attr('id').toString();

        $(document).ready(function() {
            document.getElementById("product-checkout").insertAdjacentHTML("beforeend",
                `<form id="checkoutForm-" class="form" action="{{ route('transaksi.store') }}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" name="warung_id" id="warung_id" value="{{ Auth::user()->warung[0]->id_warung }}" required>
                    <input type="hidden" name="nama_pembeli" id="nama_pembeli" required>
                    <input type="hidden" name="no_meja" id="no_meja" required>
                    <input type="hidden" name="menu_id" id="menu_id" required>
                    <input type="hidden" name="metode_pemesanan" id="metode_pemesanan" value="offline" required>
                    <input type="hidden" name="status_meja" id="status_meja" required>

                    <div class="row bg-light text-dark p-2 align-items-center" id="item-id" style="border-radius: 4px;">
                        <div class="col-md-4 pt-1">
                            <div class="row">
                                <a class="btn btn-secondary px-1 mx-auto col-sm-3 font-weight-bold" onclick="this.parentNode.querySelector('input[type=number]').stepDown();itemDivideHarga(this);">-</a>
                                <div class="col-sm-6">
                                    <input class="quantity form-control" min="1" name="jumlah" id="jumlah" value="1" type="number">
                                </div>
                                <a class="btn btn-warning px-1 mx-auto col-sm-3 d-block d-md-inline font-weight-bold" onclick="this.parentNode.querySelector('input[type=number]').stepUp();itemMultipleHarga(this);" class="plus">+</a>
                            </div>
                        </div>
                        <div class="col-md-7 pt-1 text-truncate">
                            <span class="d-block font-weight-bold" id="item-nama-checkout"></span>
                            <span class="d-block font-weight-bold harga-checkout" id="item-harga-checkout"></span>
                        </div>
                        <div class="col-md-1 btn-sm btn btn-danger text-center item" onclick="fromCheckout(this)">
                            <span class="font-weight-bold align-middle">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                </form>`);

            var itemIdTarget = document.getElementsByClassName('item')[countItemCheckout];
            itemIdTarget.setAttribute('id', id_product);

            var itemNamaTarget = document.getElementById('item-nama-checkout');
            itemNamaTarget.setAttribute('id', "item-nama-checkout-" + id_product);
            $(itemNamaTarget).html(nama_product);

            var itemHargaTarget = document.getElementById('item-harga-checkout');
            itemHargaTarget.setAttribute('id', "item-harga-checkout-" + id_product);
            $(itemHargaTarget).html(harga_product);

            checkoutTotalHarga += parseInt(harga_product);
            $('#checkoutTotalHarga').html(checkoutTotalHarga);

            // READY UPLOAD FORM

            var itemMenuId = document.getElementById('menu_id');
            itemMenuId.setAttribute('id', "menu_id-" + id_product);
            $(itemMenuId).val(id_product);

            var itemMenuHarga = document.getElementById('jumlah');
            // itemMenuHarga.setAttribute('id', "jumlah-" + id_product);
            // $(itemMenuHarga).val(id_product);

            // alert(itemMenuId.value + " " + itemMenuHarga.value);

            countItemCheckout++;

        });
        $('#product-checkout p').hide();

    }

    function fromCheckout(obj) {
        var remove_status = $('.card').find("#" + obj.id);
        remove_status.parent().css('pointer-events', 'auto');
        remove_status.parent().find('.product-status').hide();

        var minusHarga = $(obj).prev().find('.harga-checkout').text();
        checkoutTotalHarga -= parseInt(minusHarga);
        $('#checkoutTotalHarga').html(checkoutTotalHarga);

        obj.parentNode.parentNode.remove();

        countItemCheckout--;
        if (countItemCheckout === 0) {
            $('#product-checkout p').show();
        }

    }

    function itemMultipleHarga(obj) {

        var itemId = $(obj).parent().parent().parent().find('.item').attr('id');
        var itemPrice = $('.card').find("#" + itemId).find('#product-harga').text();
        var itemCount = $(obj).parent().find('input[type=number]').val();
        var subTotal = parseInt(itemPrice) * parseInt(itemCount);
        $(obj).parent().parent().nextUntil().find('.harga-checkout').text(subTotal);


        checkoutTotalHarga += parseInt(itemPrice);
        $('#checkoutTotalHarga').html(checkoutTotalHarga);

    }

    function itemDivideHarga(obj) {

        var itemId = $(obj).parent().parent().parent().find('.item').attr('id');
        var itemPrice = $('.card').find("#" + itemId).find('#product-harga').text();
        var itemCount = $(obj).parent().find('input[type=number]').val();
        var subTotal = parseInt(itemPrice) * parseInt(itemCount);
        $(obj).parent().parent().nextUntil().find('.harga-checkout').text(subTotal);

        checkoutTotalHarga -= parseInt(itemPrice);
        $('#checkoutTotalHarga').html(checkoutTotalHarga);

    }

    function minTotal(total) {
        if (total < 0) {
            return total = 0;
        }
    }

    $('#submitCheckoutForm').on('click', function(e) {
        // READY UPLOAD FORM

        var nama_pembeli = $("#pseudo_nama_pembeli").val();
        var no_meja = $("#no-meja").attr('data-meja');
        var status_meja = $("#no-meja").attr('data-status-meja');

        var readyNamaPembeli = $('input[name="nama_pembeli"]');
        var readyNoMeja = $('input[name="no_meja"]');
        var readyStatusMeja = $('input[name="status_meja"]');
        var readyMetodePemesanan = document.getElementById('metode_pemesanan');
        var itemMenuId = document.getElementById('menu_id');
        var itemMenuHarga = document.getElementById('jumlah');

        readyNamaPembeli.val(nama_pembeli);
        readyNoMeja.val(no_meja);
        readyStatusMeja.val(status_meja);

        if (readyNamaPembeli.val() != "" && readyNoMeja.val() != "") {
            // $('.toast').show();
            // $('.toast').toast('show');
            $(document).ready(function() {
                $('.form').each(function() {
                    //     var that = $(this);
                    //     $.post(that.attr('action'), that.serialize());
                    // });
                    // $('.form').submit();
                    // $('.form').on('submit', function(e) {

                    var form = $(this);
                    var submit = $("#submitCheckoutForm");

                    //     e.preventDefault();
                    var data = form.serialize();
                    var url = form.attr('action');
                    var post = form.attr('method');
                    $.ajax({
                        url: url,
                        type: post,
                        data: data,
                        success: function(data) {
                            $('.alert').show();
                            // $('#success-toast').toast('show');
                        },
                        beforeSend: function() {
                            submit.text("Loading...");
                            submit.prop("disabled", true);
                        },
                        error: function() {
                            $('#failed-toast').toast('show');
                            submit.prop("disabled", false);
                            // show error to end user
                        }
                    });
                    submit.text("Bayar");
                });
            });

            // alert(readyNamaPembeli.value + " " + readyNoMeja.value + " " + readyMetodePemesanan.value + " " + itemMenuId.value + " " + itemMenuHarga.value);
            // alert($('.form').serialize());
        } else alert('Please fill all the field !');

    });
</script>

@endsection