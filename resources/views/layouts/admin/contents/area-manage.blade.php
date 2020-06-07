@extends('admin')
@section('content')
<header class="page-header">
    <h2>KHU: {{$getArea->khu_ten}}</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            {{-- <button class="btn btn-primary" onclick="openNav()">
                <i class="fa fa-plus"></i> Thêm mới
            </button> --}}
        </div>
    </div>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="d-flex">
                <h4 class="flex-1"><i class="fa fa-th-large" aria-hidden="true"></i> {{$getArea->khu_ten}}</h4>
                <button class="btn btn-primary flexAuto" onclick="openNav()">Thêm mới bàn</button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <br />
                    <section class="panel panel-featured panel-featured-dark">
                        <header class="panel-heading">
                            <h2 class="panel-title">Thông tin khu vực</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td><i class="fa fa-navicon" aria-hidden="true"></i> Số lượng bàn</td>
                                    <td>{{ count($getArea->ban) }} bàn</td>
                                </tr>
                                <tr>
                                    <td class="text-danger"><i class="fa fa-circle" aria-hidden="true"
                                            style="color: #da3c3c"></i> Hoạt động</td>
                                    <td>{{ count($banDeactive) }} bàn</td>
                                </tr>
                                <tr>
                                    <td class="text-success"><i class="fa fa-circle" aria-hidden="true"
                                            style="color: #3cda3c"></i> Sẳn
                                        sàng</td>
                                    <td>{{ count($banActive) }} bàn</td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="col-md-8" style="min-height: 600px">
                    @foreach ($getArea->ban as $ban)
                    <div class="col-md-4">
                        <div class="ban">
                            <div class="row">
                                <div class="col-md-12">
                                    <br />
                                    <br />
                                    <h4 class="text-center"><i class="fa fa-coffee" aria-hidden="true"></i>
                                        {{$ban->ban_ten}}</h4>
                                    <br />
                                    <br />
                                </div>
                                <div class="col-md-12">
                                    <div class="head-ban">
                                        <p class="text-right mb-0">
                                            <button class="btn btn-default" data-toggle="modal"
                                                data-target="#modalEdit{{$ban->ban_id}}"> <span class="text-primary"><i
                                                        class="fa fa-edit" aria-hidden="true"></i></span>
                                            </button>
                                            <button class="btn btn-default"
                                                onclick="confirmDel(`{{ route('admin.manageArea.delete',$ban->ban_id) }}`)"><span
                                                    class="text-danger">
                                                    <i class="fa  fa-trash-o" aria-hidden="true"></i></span>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEdit{{ $ban->ban_id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('admin.manageArea.edit',$ban->ban_id) }}">
                                        <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> THAY ĐỔI THÔNG TIN
                                            BÀN
                                        </h3>
                                        <label>Tên Bàn</label>
                                        <input type=" text" class="form-control input-lg" required
                                            placeholder="Nhập tên khu vực" name="name" value="{{ $ban->ban_ten }}" />
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
                    <div id="mySidenav" class="sidenav" style="background-color: #fdfdfd; border-radius: 5px;">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="background-color: #fff; padding: 30px; color: #000; border-radius: 4px;">
                                        <i class="fa fa-coffee" aria-hidden="true"></i>
                                        TẠO BÀN</h3>
                                    <div class="ml-4">
                                        <form method="POST" action="{{ route('admin.manageArea.add') }}">
                                            <label>Tên bàn:</label>
                                            <input type=" text" class="form-control" required placeholder="Nhập tên bàn"
                                                name="name" />
                                            <input type="hidden" value="{{ $getArea->khu_id }}" name="id" />
                                            @csrf
                                            <br />
                                            <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                                {{"Lưu ý: Bạn đang thêm bàn cho khu vực"}} <strong>
                                                    {{ $getArea->khu_ten }} </strong> </p>
                                            <p class=" text-right"><button class="btn btn-primary"> <i
                                                        class="fa fa-plus" aria-hidden="true"></i> Tạo mới</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
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