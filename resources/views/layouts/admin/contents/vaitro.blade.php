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
                <div class="col-md-8">
                    <h2>VAI TRÒ</h2>
                    <p class="text-right">
                        <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalCreateVT">
                            <i class="fa fa-plus"></i> Thêm
                        </button>
                    </p>
                    <div id="ModalCreateVT" class="modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <form method="POST" action="{{ route('admin.vaitro.add')}}">
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-text">
                                            <h3>Thêm Mới Vai Trò</h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tên vai trò: </label>
                                                    @csrf
                                                    <input class="form-control" placeholder="Nhập tên vai trò..."  name="nameVT" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mức lương: </label>
                                                    <select class="form-control" name="luongVT">
                                                        @foreach($allLuong as $luong)
                                                        <option value="{{ $luong->luong_id }}">{{ $luong->luong_ten }} - {{ number_format($luong->sotien) }} đ</option>
                                                        @endforeach
                                                    </select>
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
                                <th>STT</th>
                                <th>Vai trò</th>
                                <th>Loại lương</th>
                                <th>Lương/ ca</th>
                                <th>Sửa - Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($allVaiTro as $vt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vt->vt_ten }}</td>
                                <td>{{ $vt->luong->luong_ten }}</td>
                                <td>{{ number_format($vt->luong->sotien) }} đ / Ca </td>
                                <td>
                                    <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalEdit{{ $loop->iteration }}">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <div id="ModalEdit{{ $loop->iteration }}" class="modal-block modal-block-md mfp-hide">
                                <section class="panel">
                                    <form method="POST" action="{{ route('admin.vaitro.edit', $vt->vt_id)}}">
                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <h3>Thay Đổi Vai Trò</h3>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Tên vai trò: </label>
                                                            @csrf
                                                            <input class="form-control" value="{{ $vt->vt_ten }}" name="nameVT" required/>
                                                            <input type="hidden"value="{{ $vt->vt_id }}" name="idVT"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Mức lương: </label>
                                                            <select class="form-control" name="luongVT">
                                                                @foreach($allLuong as $luong)
                                                                <option value="{{ $luong->luong_id }}">{{ $luong->luong_ten }} - {{ number_format($luong->sotien) }} đ</option>
                                                                @endforeach
                                                            </select>
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
                    <h2>LƯƠNG</h2>
                    <p class="text-right">
                        <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalCreateLuong">
                            <i class="fa fa-plus"></i> Thêm
                        </button>
                    </p>
                    <div id="ModalCreateLuong" class="modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <form method="POST" action="{{ route('admin.luong.add')}}">
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-text">
                                            <h3>Thêm Lương</h3>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tên Lương: </label>
                                                    @csrf
                                                    <input class="form-control" placeholder="Nhập tên vai trò..."  name="name" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mức lương: </label>
                                                    <input type="number" class="form-control" placeholder="Nhập số tiền..."  name="sotien" required/>
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
                                <th>Tên</th>
                                <th>Tiền</th>
                                <th>Sửa - Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($allLuong as $luong)
                            <tr>
                                <td>{{ $luong->luong_ten }}</td>
                                <td>{{ number_format($luong->sotien) }}</td>
                                <td>
                                    <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#ModalEditLuong{{ $loop->iteration }}">Sửa</button>
                                    <a href=""><button class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                            <div id="ModalEditLuong{{ $loop->iteration }}" class="modal-block modal-block-md mfp-hide">
                                <section class="panel">
                                    <form method="POST" action="{{ route('admin.luong.edit', $luong->luong_id)}}">
                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <h3>Thay Đổi Lương</h3>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Tên Lương: </label>
                                                            @csrf
                                                            <input class="form-control" placeholder="Nhập tên vai trò..." value="{{ $luong->luong_ten }}"  name="name" required/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Mức lương: </label>
                                                        <input type="number" class="form-control" value="{{ $luong->sotien }}" placeholder="Nhập số tiền..."  name="sotien" required/>
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
