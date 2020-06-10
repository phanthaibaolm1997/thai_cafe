@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý gọi món</h2>
</header>
<br />
<section class="panel p-relative">
    <div class="tabs">
        <ul class="nav nav-tabs nav-justified">
            @foreach($getArea as $area)
            <li class="@if($loop->iteration == 1) active @endif">
                <a href="#area{{$area->khu_id}}" data-toggle="tab" class="text-center">
                    <i class="fa fa-star"></i>
                    {{$area->khu_ten}}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" style="height: calc(100vh - 264px)">
            @foreach($getArea as $area1)
            <div id="area{{$area1->khu_id}}" class="tab-pane @if($loop->iteration == 1) active @endif">
                <div class="row">
                    @foreach ($area1->ban as $ban)
                    <div class="col-md-3">
                        @if($ban->ban_tinhtrang == 1)
                        <div class="ban-active">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center"><i class="fa fa-coffee" aria-hidden="true"></i>
                                        {{$ban->ban_ten}}</h4>
                                    <p class="text-center">
                                        <button class="mb-xs btn-sm mt-xs mr-xs modal-sizes btn btn-default"
                                            href="#orderFull{{$ban->ban_id}}">Order</button>
                                        <button class="mb-xs btn-sm mt-xs mr-xs modal-sizes btn btn-warning"
                                            href="#checkOutFull{{$ban->ban_id}}">Thanh toán</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="checkOutFull{{$ban->ban_id}}" class="modal-block mfp-hide" style="max-width: 500px">
                            <section class="panel">
                                <div class="panel-body" style="height: calc(100vh - 200px);">
                                    <form method="POST" action="{{ route('admin.order.checkout')}}">
                                        <div style="height: calc(100vh - 310px);">
                                            <h1 class="text-center"><i class="fa fa-bitcoin"></i> COFFEE THAI</h1>
                                            <p class="text-center">Địa chỉ: 272 Đường 30 Tháng 4, Hưng Lợi, Ninh Kiều,
                                                Cần
                                                Thơ, Việt Nam </p>
                                            <p class="text-right">{{  now()->toDateTimeString() }}</p>
                                            <h4 class="text-center">HÓA ĐƠN THANH TOÁN</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>KHU : {{$area->khu_ten}}</strong></p>
                                                    <p><strong>BÀN : {{$ban->ban_ten}}</strong></p>
                                                </div>
                                            </div>

                                            <table class="table table-thanhtoan table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Mã SP</th>
                                                        <th>Tên SP</th>
                                                        <th>Số lượng</th>
                                                        <th>Đơn giá</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <?php $total = 0; ?>
                                                @if(count($ban->order)>0)
                                                <tbody>
                                                    @foreach ($ban->order[0]->detail_order as $do)
                                                    <tr class="trRM">
                                                        <td>
                                                            #{{$do->mat_hang->mh_ma}}
                                                        </td>
                                                        <td>
                                                            {{$do->mat_hang->mh_ten}}
                                                        </td>
                                                        <td>
                                                            {{$do->dorder_soluong}} /
                                                            {{$do->mat_hang->don_vi->dv_ten}}
                                                        </td>
                                                        <td>
                                                            {{number_format($do->mat_hang->mh_gia)}} đ
                                                        </td>
                                                        <td>
                                                            <?php $total += $do->mat_hang->mh_gia * $do->dorder_soluong; ?>
                                                            {{number_format($do->mat_hang->mh_gia*$do->dorder_soluong)}}
                                                            đ
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endif
                                            </table>
                                            <hr />
                                            <p class="text-right">
                                                <strong>TỔNG :{{number_format($total) }} đ </strong>
                                            </p>
                                            <input type="hidden" name="ban_id" value="{{$ban->ban_id}}" />
                                            <input type="hidden" name="order_id" value="{{$ban->order[0]->order_id}}" />
                                            <input type="hidden" name="tongtien" value="{{$total}}" />
                                            @csrf
                                        </div>
                                        <div class="modal-wrapper">
                                            <div class="modal-text text-right">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-credit-card"></i> Thanh toán
                                                </button>
                                                <button type="button" class="btn btn-default modal-dismiss">
                                                    <i class="fa fa-times"></i> Hủy
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                        <div id="orderFull{{$ban->ban_id}}" class="modal-block modal-block-lg mfp-hide">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="modal-wrapper" style="min-height: 80vh">
                                        <h2 class="text-center">DANH SÁCH ORDER</h2>
                                        <div class="modal-text">
                                            <button class="btn btn-sm btn-primary" style="margin-bottom: 10px"
                                                onclick="openNavChild(`{{$ban->ban_id}}`,`{{$ban->ban_ten}}`)">
                                                <i class="fa fa-bars"></i> Gọi thêm
                                            </button>
                                            <div id="mySidenav1" class="sidenav">
                                                <a href="javascript:void(0)" class="closebtn"
                                                    onclick="closeNavChild()">&times;</a>
                                                <div class="container-fluid">
                                                    <div style="postion: relavetive">
                                                        <div id="mySidenavOrder" class="sidenavOrder">
                                                            <a href="javascript:void(0)" class="closebtn"
                                                                onclick="closeNavOrder()">&times;</a>
                                                            <div class="orderthem">
                                                                <h2 style="color: #fff">THÊM MÓN VÀO BÀN</h2>
                                                                <br />
                                                                <div class="d-flex">
                                                                    <div class="flex-1">
                                                                        <input type="number" class="form-control"
                                                                            placeholder="Nhập số lương..."
                                                                            id="add_mh_soluong" />
                                                                        <input type="hidden" id="add_mh_ma" />
                                                                        <input type="hidden" id="add_mh_gia" />
                                                                        <input type="hidden" id="add_order_id" />
                                                                    </div>
                                                                    <div class="flexAuto">
                                                                        <button class="btn btn-primary ml-2 addNew">
                                                                            Thêm
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="ban_id" name="ban" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="tabs">
                                                                <ul class="nav nav-tabs">
                                                                    @foreach($getProd as $type)
                                                                    <li
                                                                        class="@if($loop->iteration == 1) active @endif">
                                                                        <a href="#type{{ $type->loai_id }}"
                                                                            data-toggle="tab">
                                                                            <i class="fa fa-star"></i>
                                                                            {{ $type->loai_ten }}
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach($getProd as $type)
                                                                    <div id="type{{ $type->loai_id }}"
                                                                        class="tab-pane @if($loop->iteration == 1) active @endif">
                                                                        <div class="row">
                                                                            @foreach ($type->mat_hang as $prod)
                                                                            <div class="col-md-3">
                                                                                <div class="prod-order">
                                                                                    <div class="img-box">
                                                                                        <img src="{{ asset($prod->chi_tiet_hinh_anh[0]->hinh_anh->ha_url)}}"
                                                                                            width="100%"
                                                                                            class="img-order-img" />
                                                                                        <div class="box-order">
                                                                                            <input type="hidden"
                                                                                                class="prod_src"
                                                                                                value="{{asset($prod->chi_tiet_hinh_anh[0]->hinh_anh->ha_url) }}" />
                                                                                            <input type="hidden"
                                                                                                class="prod_id"
                                                                                                value="{{$prod->mh_ma }}" />
                                                                                            <input type="hidden"
                                                                                                class="prod_price"
                                                                                                value="{{$prod->mh_gia }}" />
                                                                                            <input type="hidden"
                                                                                                class="prod_name"
                                                                                                value="{{$prod->mh_ten }}" />
                                                                                            <button type="button"
                                                                                                class="btn btn-default btn-order"
                                                                                                onclick="openNavOrder(`{{$prod->mh_ma }}`,`{{$prod->mh_gia }}`,`{{ $ban->order[0]->order_id }}`)">Đặt
                                                                                                thêm</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="content-box">
                                                                                        <h5>{{$prod->mh_ten }}</h5>
                                                                                        <h5 class="text-right">
                                                                                            <span class="bagde-custom">
                                                                                                {{number_format($prod->mh_gia) }}
                                                                                                đ
                                                                                            </span>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-config">
                                                @if(count($ban->order)>0)
                                                @foreach ($ban->order[0]->detail_order as $do)
                                                <tr class="trRM">
                                                    <td style="width: 100px">
                                                        <img src='{{ asset($do->mat_hang->chi_tiet_hinh_anh[0]->hinh_anh->ha_url)}}'
                                                            class="img-100" />
                                                    </td>
                                                    <td>
                                                        {{$do->mat_hang->mh_ten}}
                                                    </td>
                                                    <td class="updateHere">
                                                        <div class="content-default">
                                                            {{$do->dorder_soluong}} /
                                                            {{$do->mat_hang->don_vi->dv_ten}}
                                                        </div>
                                                        <div class="content-update">
                                                        </div>
                                                        <input type="hidden" class="order_id"
                                                            value="{{ $ban->order[0]->order_id }}" />
                                                        <input type="hidden" class="mh_ma"
                                                            value="{{ $do->mat_hang->mh_ma }}" />
                                                        <input type="hidden" class="donvi"
                                                            value="{{ $do->mat_hang->don_vi->dv_ten }}" />
                                                    </td>
                                                    <td>
                                                        {{number_format($do->mat_hang->mh_gia)}} đ
                                                    </td>
                                                    <td>
                                                        <button class='btn btn-outline-danger delBtn'>
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <button class='btn btn-outline-primary updateSoLuong'><i
                                                                class="fa fa-edit"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="{{ url()->current() }}"><button class="btn btn-default">
                                                    Đóng lại
                                                </button></a>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                        @else
                        <div class="ban-disactive">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center"><i class="fa fa-coffee" aria-hidden="true"></i>
                                        {{$ban->ban_ten}}</h4>
                                    <p class="text-center">
                                        <button class="btn btn-sm btn-default"
                                            onclick="openNav(`{{$ban->ban_id}}`,`{{$ban->ban_ten}}`)">
                                            Đặt bàn
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <h3 class="headingOrder"></h3> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <form method="POST" action="{{ route('admin.order.datban') }}">
            @csrf
            <div class="container">
                <input type="hidden" id="ban_id" name="ban" />
                <div class="row">
                    <div class="col-md-9">
                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                @foreach($getProd as $type)
                                <li class="@if($loop->iteration == 1) active @endif">
                                    <a href="#type{{ $type->loai_id }}" data-toggle="tab">
                                        <i class="fa fa-star"></i>
                                        {{ $type->loai_ten }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach($getProd as $type)
                                <div id="type{{ $type->loai_id }}"
                                    class="tab-pane @if($loop->iteration == 1) active @endif">
                                    <div class="row">
                                        @foreach ($type->mat_hang as $prod)
                                        <div class="col-md-3">
                                            <div class="prod-order">
                                                <div class="img-box">
                                                    <img src="{{ asset($prod->chi_tiet_hinh_anh[0]->hinh_anh->ha_url)}}"
                                                        width="100%" class="img-order-img" />
                                                    <div class="box-order">
                                                        <button type="button"
                                                            class="mb-xs mt-xs mr-xs modal-basic btn btn-default btn-order"
                                                            href="#exampleModalCenter{{$prod->mh_ma}}">Chọn</button>
                                                    </div>
                                                </div>
                                                <div class="content-box">
                                                    <h5>{{$prod->mh_ten }}</h5>
                                                    <h5 class="text-right"><span
                                                            class="bagde-custom">{{number_format($prod->mh_gia) }}
                                                            đ</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="exampleModalCenter{{$prod->mh_ma}}" class="modal-block mfp-hide">
                                            <section class="panel">
                                                <div class="panel-body">
                                                    <div class="modal-wrapper">
                                                        <h4 class="mb-3">
                                                            {{$prod->mh_ten }} -
                                                            <span class="bagde-custom">
                                                                {{number_format($prod->mh_gia) }} đ
                                                            </span>
                                                        </h4>
                                                        <div class="d-flex">
                                                            <input type="number" placeholder="Nhập số lượng"
                                                                class="form-control flex-1 order_number" />
                                                            <input type="hidden" class="prod_src"
                                                                value="{{asset($prod->chi_tiet_hinh_anh[0]->hinh_anh->ha_url) }}" />
                                                            <input type="hidden" class="prod_id"
                                                                value="{{$prod->mh_ma }}" />
                                                            <input type="hidden" class="prod_price"
                                                                value="{{$prod->mh_gia }}" />
                                                            <input type="hidden" class="prod_name"
                                                                value="{{$prod->mh_ten }}" />
                                                            <button type="button"
                                                                class="btn btn-success ml-2 flexAuto ordered modal-confirm">Ok</button>
                                                        </div>
                                                        <br />
                                                        <div class="modal-text text-center">
                                                            <button type="button"
                                                                class="btn btn-default modal-dismiss">Hủy</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Món đã order</h4>
                        <div id="order-list"></div>
                        <div class="">
                            <input type="hidden" name="arrKey[]" id="arrKey">
                            <input type="hidden" name="arrNumber[]" id="arrNumber">
                            <small>Tiến hành đặt bàn khi mọi thứ đã hoàn tất...</small>
                            <button type="submit" class="btn btn-primary w-100" style="width: 100%">Đặt bàn</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="panel" style="margin-bottom: 0px">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <span style="background-color: #e47070; width: 20px; height: 20px; display: inline-block;"></span>
                <strong style="vertical-align: super;">: Đang có khách</strong>
            </div>
            <div class="col-md-4">
                <span style="background-color: #4dc03a; width: 20px; height: 20px;display: inline-block;"></span>
                <strong style="vertical-align: super;">: Bàn Trống</strong>
            </div>
            <div class="col-md-4">
                <span style="background-color: #f1ce13; width: 20px; height: 20px;display: inline-block;"></span> :
                <strong style="vertical-align: super;">: Khách đặt trước</strong>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="{{ ('/assets/vendor/jquery/jquery.js') }}"></script>
<script type="text/javascript">
    function openNav(id,name) {
        $('.headingOrder').html(name);
        $('#ban_id').val(id);
        document.getElementById("mySidenav").style.width = "100%";
        document.getElementById("mySidenav").style.height = "calc(100vh - 90px)";
    }

    function openNavChild(id,name) {
        $('.headingOrder').html(name);
        $('#ban_id').val(id);
        document.getElementById("mySidenav1").style.width = "100%";
        document.getElementById("mySidenav1").style.height = "calc(100vh - 193px)";
    }

    function closeNavChild() {
        document.getElementById("mySidenav1").style.width = "0";
        document.getElementById("mySidenav1").style.height = "calc(100vh - 193px)";
    }

    function openNavOrder(mh_ma,mh_gia,order_id) {
        $('#add_mh_ma').val(mh_ma);
        $('#add_mh_gia').val(mh_gia);
        $('#add_order_id').val(order_id);
        document.getElementById("mySidenavOrder").style.width = "100%";
        document.getElementById("mySidenavOrder").style.height = "calc(100vh - 193px)";
    }

    function closeNavOrder() {
        document.getElementById("mySidenavOrder").style.width = "0";
        document.getElementById("mySidenavOrder").style.height = "calc(100vh - 193px)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mySidenav").style.height = "calc(100vh - 90px)";
    }
</script>
<script>
    $(document).ready(function () {
        let keys = new Array();
		let numbers = new Array();
        $('.ordered').click(function (e) { 
            var prod_id = $(this).siblings('.prod_id').val();
            if(keys.includes(prod_id)){
                bootbox.alert('Mặt hàng đã tồn tại!');
            }else{
                var number = $(this).siblings('.order_number').val();
                var gia = $(this).siblings('.prod_price').val();
                var name = $(this).siblings('.prod_name').val();
                var src = $(this).siblings('.prod_src').val();
                var total_gia = gia*number;
                var elements = "<div class='fakeOrder'><div class='d-flex'><div class='flexAuto'><img src='"+src+"' width='100px'/></div><div class='flex-1'><h5>"+name+"</h5><h6>"+gia +" x "+number+" = "+total_gia+" đ</h6></div></div><button class='btn btn-xs btn-danger killfakeOrder'>X</button></div>";
                $('#order-list').append(elements);
                keys.push(prod_id);	
                numbers.push(number);
                $('#arrNumber').val(numbers);
                $('#arrKey').val(keys);
            }
        });
        $('body').on('click', '.killfakeOrder', function(event) {
			$(this).parents('.fakeOrder').remove();
		});
        $('.updateSoLuong').click(function(e){
            var html = '<input type="number" class="form-control number"style="width: 70px; margin-right:5px; display: inline-block" /><button type="button" class="btn btn-success ajaxUpdate"> <i class="fa fa-check"></i></button>';
            $(this).parents('td').siblings('.updateHere').find('.content-default').html('');
            $(this).parents('td').siblings('.updateHere').find('.content-update').html(html);
            $(this).parents('.updateHere').remove();
        });
        $('.delBtn').click(function(e){
            $(this).parents('.trRM').remove();
            var order_id = $(this).parents('td').siblings('.updateHere').find('.order_id').val()
            var mh_ma = $(this).parents('td').siblings('.updateHere').find('.mh_ma').val()
            $.ajax({
                type: "GET",
                url: `{{ route('admin.order.delMH') }}`,
                data: {
                    mh_ma: mh_ma,
                    order_id: order_id
                },
                success: function (response) {
                   alert("Xóa Thành công");
                }
            });
        });

        $('body').on('click', '.ajaxUpdate', function(event) {
            var soluong = $(this).siblings('.number').val();
            var divUpdate = $(this).parents('.content-update');
            var divDefault = $(this).parents('.content-default');
            var order_id = $(this).parents('.content-update').siblings('.order_id').val();
            var mh_ma = $(this).parents('.content-update').siblings('.mh_ma').val();
            var donvi = $(this).parents('.content-update').siblings('.donvi').val();
            $.ajax({
                type: "GET",
                url: `{{ route('admin.order.updateNum') }}`,
                data: {
                    soluong: soluong,
                    order_id: order_id,
                    mh_ma: mh_ma
                },
                success: function (response) {
                    var res = soluong+' / '+ donvi;
                    
                    divDefault.html(res);
                    divUpdate.html(res);
                   alert("Update Thành công");
                }
            });
        });

        $('.addNew').click(function(e){
            var order_id = $('#add_order_id').val();
            var mh_ma = $('#add_mh_ma').val();
            var mh_soluong = $('#add_mh_soluong').val();
            var mh_gia = $('#add_mh_gia').val();

            $.ajax({
                type: "GET",
                url: `{{ route('admin.order.addNew') }}`,
                data: {
                    mh_gia: mh_gia,
                    mh_soluong: mh_soluong,
                    order_id: order_id,
                    mh_ma: mh_ma
                },
                success: function (response) {
                    closeNavOrder();
                    alert("Thêm Thành Công");
                }
            });
        });
    });
</script>