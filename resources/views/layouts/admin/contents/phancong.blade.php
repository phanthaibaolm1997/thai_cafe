@extends('admin')
@section('content')
<header class="page-header">
    <h2>Quản lý phân công lịch trực</h2>
    <div class="right-wrapper pull-right">
        <div class="box-btn-header">

        </div>
    </div>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <h2 style="background: #0088cc;padding: 22px;color: #fff;text-align: center;border-radius: 5px;">
                Phân công lao động </h2>
            <div id="calendar"></div>
        </div>
    </div>
</section>
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.phancong.add') }}">
                    <h4><i class="fa fa-calendar-o" aria-hidden="true"></i> PHÂN CÔNG - NGÀY: <span id="modalTitle"
                            class="btn btn-xs btn-info"></span>
                    </h4>
                    <hr />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Chọn nhân sự:</label>
                                <select class="form-control" name="user">
                                    @foreach ($allNV as $user)
                                    <option value="{{ $user->nd_id }}">[<strong>{{ $user->vai_tro->vt_ten }}</strong>] -
                                        {{ $user->nd_ten }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Chọn ca:</label>
                                <select class="form-control" name="ca">
                                    @foreach ($allCa as $ca)
                                    <option value="{{ $ca->ca_id }}">[<strong>{{ $ca->ca_ten }}</strong>]
                                        {{ $ca->ca_tgbd }}-{{ $ca->ca_tgkt }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenDay" name="day" />
                    @csrf
                    <hr />
                    <p class=" text-right"><button class="btn btn-primary"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i> Phân công</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Edit --}}
<div class="modal fade" id="calendarModalEdit" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.phancong.edit') }}">
                    <h4 class="text-center"><i class="fa fa-calendar-o" aria-hidden="true"></i> THAY ĐỔI CHỈNH SỬA LỊCH:
                    </h4>
                    <h5><strong>USER:</strong> <span id="nameEdit"></span></h5>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <strong>Ca : </strong> <span id="caEdit"></span>
                        </div>
                        <div class="col-md-6">
                            <strong>Ngày : </strong><span id="ngayEdit"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" id="oldCa" name="oldCa" />
                                <input type="hidden" id="oldUser" name="oldUser" />
                                <label>Chọn nhân sự:</label>
                                <select class="form-control" name="user">
                                    @foreach ($allNV as $user)
                                    <option value="{{ $user->nd_id }}">
                                        [<strong>{{ $user->vai_tro->vt_ten }}</strong>] -
                                        {{ $user->nd_ten }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Chọn ca:</label>
                                <select class="form-control" name="ca">
                                    @foreach ($allCa as $ca)
                                    <option value="{{ $ca->ca_id }}">[<strong>{{ $ca->ca_ten }}</strong>]
                                        {{ $ca->ca_tgbd }}-{{ $ca->ca_tgkt }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenDayEdit" name="day" />
                    @csrf
                    <hr />
                    <p class=" text-right">
                        <button class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i>
                            Phân công lại
                        </button>
                    </p>
                </form>
                <form method="POST" action="{{ route('admin.phancong.delete') }}">
                    <input type="hidden" id="delUser" name="user" />
                    <input type="hidden" id="delNgay" name="ngay" />
                    <input type="hidden" id="delCa" name="ca" />
                    @csrf
                    <p class=" text-right">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times"></i>
                            Xóa Lịch này
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<?php $events = [];  ?>
@foreach ($allPC as $pc)
<?php $events[] = [
    'id'=> $loop->iteration,
    'title' => $pc->nguoi_dung->nd_ten,
    'start'=> $pc->ngay.' '.$pc->ca->ca_tgbd,
    'end'=> $pc->ngay.' '.$pc->ca->ca_tgkt,
    'data'=> [
        $pc->nd_id,
        $pc->ca_id,
        $pc->ngay,
        $pc->nguoi_dung->nd_ten,
        $pc->ca->ca_ten,
        $pc->ca->ca_tgbd,
        $pc->ca->ca_tgkt
    ],
    "customRender"=> true
]; ?>
@endforeach
<script src="{{ ('/assets/vendor/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#calendar").fullCalendar({
            themeSystem: 'bootstrap4',
            businessHours: false,
            defaultView: 'month',
            editable: true,
            header: {
                left: 'title',
                right: 'prev,next'
            },
            eventRender: function(event, element) {
                if(event.icon){
                    element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
                }
            },
            events: <?= json_encode($events) ?>,
            eventClick: function (event) {
                if (event.url) {
                    window.open(event.url);
                    return false;
                }
            },
            eventRender: function(event, element) {
				if(event.icon){
					element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
				}
			},
            dayClick: function (date, jsEvent, view) {
                jQuery.noConflict();
                $("#modalTitle").text(date.format());
                $("#hiddenDay").val(date.format());
                $("#calendarModal").modal("show");
            },
            eventClick: function(event) {
                jQuery.noConflict();
                $("#hiddenDayEdit").val(event.data[2]);
                $('#caEdit').html(event.data[4]+' ['+event.data[5]+' - '+event.data[6]+']');
                $('#nameEdit').html(event.data[3]);
                $('#ngayEdit').html(event.data[2]);
                $('#oldCa').val(event.data[1]);
                $('#oldUser').val(event.data[0]);
                $('#delCa').val(event.data[1]);
                $('#delUser').val(event.data[0]);
                $('#delNgay').val(event.data[2]);
                $("#calendarModalEdit").modal("show");

            }
        });
    });
</script>