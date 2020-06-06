@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý sản phẩm</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            <button class="btn btn-primary" onclick="openNav()">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
        </div>
    </div>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="row">
                @foreach ($allProd as $prod)
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">{{$prod->mh_ten}}</h2>
                            <p class="panel-subtitle">{!! $prod->mh_mota !!}</p>
                        </header>
                        <div class="panel-body">

                            <h5 class="text-semibold text-dark text-uppercase">Ảnh</h5>
                            @foreach ($prod->chi_tiet_hinh_anh as $ha)
                            <a class="image-popup-no-margins" href="{{ asset($ha->hinh_anh->ha_url)}}">
                                <img class="img-responsive" src="{{ asset($ha->hinh_anh->ha_url)}}" width="100">
                            </a>
                            @endforeach
                        </div>
                    </section>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.getElementById("mySidenav").style.marginTop = "10px";
        document.getElementById("mySidenav").style.height = "-webkit-fill-available";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mySidenav").style.height = "-webkit-fill-available";
    }
    function confirmDel($ref){
        bootbox.confirm({
            message: "<h4><i class='fa fa-question-circle' aria-hidden='true'></i> Bạn có chắc chắn muốn xóa?</h4>",
            buttons: {
                confirm: {
                    label: 'Xóa',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Hủy bỏ',
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                if(result){
                    window.location.href = $ref;
                }
            }
        });
    }
</script>