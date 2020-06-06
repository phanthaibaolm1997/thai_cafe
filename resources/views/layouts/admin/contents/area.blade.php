@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý khu vực</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            <button class="btn btn-primary" onclick="openNav()">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
            <div>
            </div>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="row">
                @foreach ($getArea as $area)
                <div class="col-md-6">
                    <div class="area">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('/assets/images/coffee.png')}}" width="100%" />
                            </div>
                            <div class="col-md-8">
                                <h3><i class="fa fa-coffee" aria-hidden="true"></i> {{$area->khu_ten}}</h3>
                                <h5>Tổng số bàn: <strong> {{count($area->ban)}} bàn</strong> </h5>
                                <hr style="margin: 10px 0" />
                                <div>
                                    <a href="{{ route('admin.manageArea',$area->khu_id) }}"><button
                                            class="btn btn-success"><i class="fa fa-cog" aria-hidden="true"></i> Quản
                                            lý</button></a>
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalEdit{{$area->khu_id}}"> <i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i> Sửa</button>
                                    <button class="btn btn-danger"
                                        onclick="confirmDel(`{{ route('admin.area.delete',$area->khu_id) }}`)"><i
                                            class="fa fa-times" aria-hidden="true"></i>
                                        Xóa</button>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Edit --}}
                <div class="modal fade" id="modalEdit{{ $area->khu_id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{ route('admin.area.edit',$area->khu_id) }}">
                                    <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> THAY ĐỔI TÊN KHU VỰC
                                    </h3>
                                    <label>Tên Khu vực</label>
                                    <input type=" text" class="form-control input-lg" required
                                        placeholder="Nhập tên khu vực" name="area" value="{{ $area->khu_ten }}" />
                                    @csrf
                                    <br />
                                    <p class=" text-right"><button class="btn btn-primary"><i class="fa fa-floppy-o"
                                                aria-hidden="true"></i> Save</button></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/banner-logo.png') }}" width="100%" /> </div>
                <div class="col-md-6">
                    <div class="middlepar">
                        <div class="middlediv">
                            <h3>TẠO KHU VỰC MỚI</h3>
                            <br />
                            <form method="POST" action="{{ route('admin.area.add') }}">
                                <label>Tên Khu vực</label>
                                <input type=" text" class="form-control input-lg" required
                                    placeholder="Nhập tên khu vực" name="area" />
                                @csrf
                                <br />
                                <p class=" text-right"><button class="btn btn-primary">Tạo mới</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.getElementById("mySidenav").style.height = "calc(100vh - 100px)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mySidenav").style.height = "calc(100vh - 100px)";
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