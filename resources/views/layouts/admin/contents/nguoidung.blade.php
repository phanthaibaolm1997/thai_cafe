@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý nhân sự</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">
            <button class="btn btn-primary"  onclick="openNav()">
                <i class="fa fa-plus"></i> Thêm mới 
            </button>
        <div>
    </div>
</header>
<br/>
<section class="panel p-relative">
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
    <div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div class="container">
        <form method="POST" action="{{ route('admin.nguoidung.add') }}">
	  	<div class="row">
	  		<div class="col-md-12">
	  			<h4>THÔNG TIN TÀI KHOẢN</h4>
	  		</div>
	  		<div class="col-md-6">
	  			<label>Email</label>
	  			<input type="text" name="email" class="form-control" required="true" placeholder="Nhập họ và tên....">
	  		</div>
	  		<div class="col-md-6">
	  			<label>Mật khẩu</label>
	  			<input type="password" name="password" class="form-control" required="true" placeholder="Nhập họ và tên....">
	  		</div>
	  		<div class="col-md-12">
	  			<br/>
	  			<h4>THÔNG TIN NGƯỜI DÙNG</h4>
	  		</div>
	  		<div class="col-md-6">
	  			<label>Họ và tên</label>
	  			<input type="text" name="name" class="form-control" required="true" placeholder="Nhập họ và tên....">
	  		</div>
	  		<div class="col-md-6">
	  			<label>Ngày sinh</label>
	  			<input type="date" name="birthday" class="form-control" required="true" placeholder="Nhập họ và tên....">
	  		</div>
	  		<div class="col-md-6">
	  			<label>Số điện thoại</label>
	  			<input type="text" name="phone" class="form-control" required="true" placeholder="Nhập họ và tên....">
	  		</div>
	  		<div class="col-md-6">
	  			<label>Loại</label>
	  			<select class="form-control" name="type">
	  				@foreach($userTypes as $type)
	  				<option value="{{ $type->vt_id }}">{{ $type->vt_ten }}</option>
	  				@endforeach
	  			</select>
	  		</div>
	  		<div class="col-md-12">
	  			<label>Địa chỉ</label>
	  			<textarea class="form-control" rows="4" name="address"></textarea>
	  		</div>
	  		<div class="col-md-12 ">
	  			<br/>
	  			@csrf
	  			<p class="text-right"><button class="btn btn-primary">Tạo mới</button></p>
	  		</div>
          </div>
        </form>
	  </div>
	</div>


	<div id="main">
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
        document.getElementById("mySidenav").style.height = "0";
    }
</script>