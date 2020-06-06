@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý khu vực</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            {{-- <button class="btn btn-primary"  onclick="openNav()">
                <i class="fa fa-plus"></i> Thêm mới 
            </button> --}}
        <div>
    </div>
</header>
<br/>
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="row">
                @foreach ($getArea as $area)
                    <div class="col-md-6">
                        <div class="area">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('/assets/images/coffee.png')}}" width="100%"/>
                                </div>
                                <div class="col-md-8">
                                    <h3><i class="fa fa-coffee" aria-hidden="true"></i> {{$area->khu_ten}}</h3>
                                    <h5>Tổng số bàn: <strong> {{count($area->ban)}} bàn</strong> </h5>
                                    <hr style="margin: 10px 0"/>
                                    <div>
                                        <button class="btn btn-primary">Quản lý</button>
                                        <button class="btn btn-primary">Sửa</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
