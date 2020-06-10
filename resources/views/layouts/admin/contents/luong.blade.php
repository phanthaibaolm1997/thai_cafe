@extends('admin')
@section('content')
<header class="page-header">
    <h2>LƯƠNG</h2>
</header>
<br />
<section class="panel p-relative">
    <div class="panel-body" style="min-height: 600px">
        <div class="container-fluid">
            <h2>BẢN LƯƠNG THÁNG {{$thisMonth}}</h2>
            <p class="text-right"><button class="btn btn-primary" onclick="PrintElem(`print`)"><i
                        class="fa fa-print"></i>
                    In</button></p>
            <br />
            <table class="table" id="print">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Vai trò</th>
                        <th>Mức lương vai trò</th>
                        <th>Số ca làm</th>
                        <th>Thành tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($allUser as $user)
                    <tr>
                        <td>{{ $user->nd_ten }}</td>
                        <td>{{ $user->vai_tro->vt_ten }}</td>
                        <td>{{ $user->vai_tro->luong->luong_ten }} - {{ number_format($user->vai_tro->luong->sotien) }}
                            đ
                        </td>
                        <td>{{ count($user->chi_tiet_ca) }} ca</td>
                        <?php $total += $user->vai_tro->luong->sotien *  count($user->chi_tiet_ca); ?>
                        <td>{{ number_format($user->vai_tro->luong->sotien *  count($user->chi_tiet_ca)) }} đ</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <p class="text-right"><strong>Tổng cộng: {{ number_format($total) }} đ</strong></p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection
<script>
    function PrintElem(elem)
    {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>