@extends('admin')
@section('content')
<header class="page-header">
    <h2>Chỉnh sửa mặt hàng số : # {{$detailProd->mh_ma}}</h2>
    <div class="right-wrapper pull-right">
    </div>
</header>
<br />
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
                action="{{ route('admin.prod.edit',$detailProd->mh_ma) }}">
                <div class="tab-content">

                    <div id="w1-account" class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label">Tên Mặt Hàng: </label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên mặt hàng...."
                                required="true" value="{{ $detailProd->mh_ten }}">
                            <input type="hidden" name="mh_ma" required="true" value="{{ $detailProd->mh_ma }}">
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Mô tả mặt hàng: </label>
                                    <textarea name="mota">{{ $detailProd->mh_mota }}</textarea>
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

                                    <option value="{{ $loai->loai_id}}" @if($loai->loai_id == $detailProd->loai_id)
                                        selected @endif>{{ $loai->loai_ten }}</option>
                                    @endforeach
                                </select>

                                <label class="control-label">Đơn vị: </label>
                                <select class="form-control" name="donvi">
                                    @foreach ($allDonVi as $dv)
                                    <option value="{{ $dv->dv_id}}" @if($dv->dv_id == $detailProd->dv_id)
                                        selected @endif>{{ $dv->dv_ten }}</option>
                                    @endforeach
                                </select>
                                <label class="control-label">Giá bán: </label>
                                <input type="text" class="form-control" name="giaban" placeholder="Nhập giá...."
                                    required="true" value="{{ $detailProd->mh_gia }}">
                            </div>
                        </div>
                    </div>
                    <div id="w1-profile" class="tab-pane" style="min-height: 500px">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Hình ảnh</h3>
                                    <input type="file" multiple id="gallery-photo-add" name="imgup[]">
                                    <p><small>Hình ảnh có sẳn..</small></p>
                                    @foreach ($detailProd->chi_tiet_hinh_anh as $ha)
                                    <div class="img-loader">
                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                            onclick="confirmDel(this,`{{route('admin.hinhanhmathang.delete',$ha->hinh_anh->ha_id)}}`)">
                                            <i class="fa fa-times"></i></button>
                                        <img src="{{ asset($ha->hinh_anh->ha_url)}}" width="100">
                                    </div>
                                    @endforeach
                                    <p><small>Hình ảnh upload..</small></p>
                                    <div class="gallery"></div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Nguyên liệu</h3>
                                    <small>Vui lòng chọn nguyên liệu bên dưới....</small>
                                    <select class="nguyenlieu-multiple form-control" name="nguyenlieu[]"
                                        multiple="multiple" style="width: 100%;">
                                        @foreach ($allNL as $nl)
                                        <?php $k = false; ?>
                                        @foreach ($detailProd->mathang_nguyenlieu as $mhnl)
                                            @if($nl->nl_id == $mhnl->nl_id)
                                                <?php $k = true; break; ?>
                                            @endif
                                        @endforeach
                                        <option value="{{ $nl->nl_id }}" @if($k) selected @endif>{{ $nl->nl_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="w1-confirm" class="tab-pane" style="min-height: 500px">
                        <h3>Hoàn Tất!</h3>
                        <p>Hoàn tất, bạn có thể cập nhật mới mặt hàng của bạn...</p>
                        @csrf
                        <p class="text-right"><button type="submit" class="btn btn-primary">Cập nhật mặt hàng</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{ ('/assets/vendor/jquery/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('.nguyenlieu-multiple').select2();
    });
    function confirmDel(e,ref){
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
                    $.ajax({
                        type: "GET",
                        url: ref,
                        data: null,
                        success: function (response) {
                            $(e).closest('.img-loader').remove();
                            bootbox.alert("<h4 class='text-success'>Xóa ảnh Thành công</h4>");
                        }
                    });
                }
            }
        });
    }
</script>
@endsection