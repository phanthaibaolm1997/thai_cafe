@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý sản phẩm</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            <a href="{{ route('admin.prod.add-ui') }}">
                <button class="btn btn-primary" onclick="openNav()">
                    <i class="fa fa-plus"></i>Thêm mới
                </button>
            </a>
        </div>
    </div>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <div class="row">
                @foreach ($allProd as $prod)
                <table class="table table-product">
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$prod->mh_ten}}</td>
                        <td>{{$prod->loai->loai_ten}}</td>
                        <td>{{number_format($prod->mh_gia) }} đ</td>
                        <td>
                            <a href="{{ route('admin.prod.edit-ui',$prod->mh_ma) }}">
                                <button class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</button>
                            </a>
                            <button class="btn btn-danger"
                                onclick="confirmDel(`{{ route('admin.prod.delete',$prod->mh_ma) }}`)"><i
                                    class="fa fa-times"></i> Xóa</button>
                        </td>
                    </tr>
                    <tr style="background-color: #f3f3f3">
                        <td colspan="5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="popup-gallery">
                                        @foreach ($prod->chi_tiet_hinh_anh as $ha)
                                        <a class="pull-left mb-xs mr-xs" href="{{ asset($ha->hinh_anh->ha_url)}}">
                                            <div class="img-responsive">
                                                <img src="{{ asset($ha->hinh_anh->ha_url)}}" width="100">
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @foreach ($prod->mathang_nguyenlieu as $mhnl)
                                    <span class="btn btn-sm btn-default"><i class="fa  fa-coffee"></i>
                                        {{$mhnl->nguyen_lieu->nl_ten}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

<script type="text/javascript">
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