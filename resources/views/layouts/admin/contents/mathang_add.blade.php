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
{{-- <section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <span class="card-title">Hình ảnh</span>
            
        </div>
    </div>
</section> --}}

<section class="panel form-wizard" id="w4">
    <div class="panel-body">
        <div class="panel-body panel-body-nopadding">
            <div class="wizard-tabs">
                <ul class="wizard-steps">
                    <li class="active">
                        <a href="#w1-account" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">1</span>
                            Thông tin mặt hàng
                        </a>
                    </li>
                    <li>
                        <a href="#w1-profile" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">2</span>
                            Hình ảnh
                        </a>
                    </li>
                    <li>
                        <a href="#w1-confirm" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">3</span>
                            Hoàn tất
                        </a>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.prod.add') }}">
                <div class="tab-content">

                    <div id="w1-account" class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label">Tên Mặt Hàng: </label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên mặt hàng...."
                                required="true">
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Mô tả mặt hàng: </label>
                                    <textarea name="mota"></textarea>
                                    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                                    <script>
                                        CKEDITOR.replace('mota');
                                CKEDITOR.config.height = '300px'; 
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Loại mặt hàng: </label>
                                <select class="form-control" name="loai">
                                    @foreach ($allLoai as $loai)
                                    <option value="{{ $loai->loai_id}}">{{ $loai->loai_ten }}</option>
                                    @endforeach
                                </select>

                                <label class="control-label">Đơn vị: </label>
                                <select class="form-control" name="donvi">
                                    @foreach ($allDonVi as $dv)
                                    <option value="{{ $dv->dv_id}}">{{ $dv->dv_ten }}</option>
                                    @endforeach
                                </select>
                                <label class="control-label">Giá bán: </label>
                                <input type="text" class="form-control" name="giaban" placeholder="Nhập giá...."
                                    required="true">
                            </div>
                        </div>
                    </div>
                    <div id="w1-profile" class="tab-pane" style="min-height: 500px">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Hình ảnh</h3>
                                    <input type="file" multiple id="gallery-photo-add" required name="imgup[]">
                                    <div class="gallery"></div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Nguyên liệu</h3>
                                    <small>Vui lòng chọn nguyên liệu bên dưới....</small>
                                    <select class="nguyenlieu-multiple form-control" name="nguyenlieu[]"
                                        multiple="multiple" style="width: 100%;">
                                        @foreach ($allNL as $nl)
                                        <option value="{{ $nl->nl_id }}">{{ $nl->nl_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="w1-confirm" class="tab-pane" style="min-height: 500px">
                        <h3>Hoàn Tất!</h3>
                        <p>Hoàn tất, bạn có thể thêm mới mặt hàng của bạn...</p>
                        @csrf
                        <p class="text-right"><button type="submit" class="btn btn-primary">Thêm mới mặt hàng</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{ ('/assets/vendor/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.nguyenlieu-multiple').select2();
    });
</script>
@endsection