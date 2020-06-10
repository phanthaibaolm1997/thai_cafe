@extends('admin')
@section('content')
<header class="page-header">
    <h2>VAI TRÒ</h2>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h2>Nguyên Liệu</h2>
                    <p class="text-right">
                        <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalCreateVT">
                            <i class="fa fa-plus"></i> Thêm
                        </button>
                    </p>
                    <div id="ModalCreateVT" class="modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <form method="POST" action="{{ route('admin.nguyenlieu.add')}}">
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-text">
                                            <h3>Thêm Mới Nguyên Liệu</h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Tên Nguyên Liệu: </label>
                                                    @csrf
                                                    <input class="form-control" placeholder="Nhập tên vai trò..."  name="name" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button class="btn btn-default modal-dismiss">Hủy</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nguyên Liệu</th>
                                <th>Sửa - Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($getAllNL as $nl)
                            <tr>
                                <td>{{ $nl->nl_ten }}</td>
                                <td>
                                    <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalEdit{{ $loop->iteration }}">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <div id="ModalEdit{{ $loop->iteration }}" class="modal-block modal-block-md mfp-hide">
                                <section class="panel">
                                    <form method="POST" action="{{ route('admin.nguyenlieu.edit', $nl->nl_id)}}">
                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <h3>Thay Đổi Nguyên Liệu</h3>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Tên Nguyên Liệu: </label>
                                                            @csrf
                                                            <input class="form-control" value="{{ $nl->nl_ten }}" name="name" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                                </div>
                                            </div>
                                        </footer>
                                    </form>
                                </section>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h2>Nhà Cung Cấp</h2>
                    <p class="text-right">
                        <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalCreateNCC">
                            <i class="fa fa-plus"></i> Thêm
                        </button>
                    </p>
                    <div id="ModalCreateNCC" class="modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <form method="POST" action="{{ route('admin.ncc.add')}}">
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-text">
                                            <h3>Thêm Mới NCC</h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Tên NCC: </label>
                                                    @csrf
                                                    <input class="form-control" placeholder="Nhập tên vai trò..."  name="name" required/>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>NCC địa chỉ: </label>
                                                    <textarea placeholder="Nhập địa chỉ..." class="form-control" name="diachi"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button class="btn btn-default modal-dismiss">Hủy</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nhà cung cấp</th>
                                <th>Địa chỉ</th>
                                <th>Sửa - Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($getAllNCC as $ncc)
                            <tr>
                                <td>{{ $ncc->ncc_ten }}</td>
                                <td>{{ $ncc->ncc_diachi }}</td>
                                <td>
                                    <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalEditNCC{{ $loop->iteration }}">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <div id="ModalEditNCC{{ $loop->iteration }}" class="modal-block modal-block-md mfp-hide">
                                <section class="panel">
                                    <form method="POST" action="{{ route('admin.ncc.edit', $ncc->ncc_id)}}">
                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <h3>Thay Đổi Nguyên Liệu</h3>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Tên Nguyên Liệu: </label>
                                                            @csrf
                                                            <input class="form-control" value="{{ $ncc->ncc_ten }}" name="name" required/>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>NCC địa chỉ: </label>
                                                        <textarea placeholder="Nhập địa chỉ..." class="form-control" name="diachi">{{ $ncc->ncc_diachi }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                                </div>
                                            </div>
                                        </footer>
                                    </form>
                                </section>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h2>Loại Mặt Hàng</h2>
                    <p class="text-right">
                        <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalCreateMH">
                            <i class="fa fa-plus"></i> Thêm
                        </button>
                    </p>
                    <div id="ModalCreateMH" class="modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <form method="POST" action="{{ route('admin.loai.add')}}">
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-text">
                                            <h3>Thêm Mới Loại</h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Tên Loại: </label>
                                                    @csrf
                                                    <input class="form-control" placeholder="Nhập tên vai trò..."  name="name" required/>
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button class="btn btn-default modal-dismiss">Hủy</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên loại </th>
                                <th>Sửa - Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($getAllLoai as $loai)
                            <tr>
                                <td>{{ $loai->loai_ten }}</td>
                                
                                <td>
                                    <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalEditLoai{{ $loop->iteration }}">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <div id="ModalEditLoai{{ $loop->iteration }}" class="modal-block modal-block-md mfp-hide">
                                <section class="panel">
                                    <form method="POST" action="{{ route('admin.loai.edit', $loai->loai_id)}}">
                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <h3>Thay Đổi Nguyên Liệu</h3>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Tên Mặt Hàng: </label>
                                                            @csrf
                                                            <input class="form-control" value="{{ $loai->loai_ten }}" name="name" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                                </div>
                                            </div>
                                        </footer>
                                    </form>
                                </section>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </div>
    </div>
</section>
@endsection
