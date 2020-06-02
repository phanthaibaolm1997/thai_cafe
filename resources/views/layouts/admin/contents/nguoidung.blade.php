@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý nhân sự</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Thêm mới 
            </button>
        <div>
    </div>
</header>
<br/>
<section class="panel">
    <div class="panel-body">
        <table class="table">
            <thead>
                <th>STT</th>
                <th>Email</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>SDT</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                @foreach ($allUser as $users)
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>{{ $users->email}}</td>
                    <td>{{ $users->nd_ten}}</td>
                    <td>{{ $users->nd_ngaysinh}}</td>
                    <td>{{ $users->nd_diachi}}</td>
                    <td>{{ $users->nd_sdt}}</td>
                    <td>
                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-plus"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
 <!-- Modal -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Thêm mới nhân sự</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
 </div>
