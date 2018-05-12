@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Duyệt Đơn hàng
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="admin/donhang/duyet/{{$donhang->dh_ma}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div  class="form-group"  ng-app="">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name= "rdoTrangthai" value="1"
                                   @if($donhang->dh_trangThai == 1)
                                   {{"checked"}}
                                   @endif
                                   type = "radio" >Đã Duyệt
                        </label>
                        <label class="radio-inline">
                            <input name= "rdoTrangthai" value="2"
                                   @if($donhang->dh_trangThai == 2)
                                   {{"checked"}}
                                   @endif
                                   type = "radio" >Mới
                        </label>
                    </div>


                            <td class="center"><button type="submit" class="btn">Duyệt</button></td>


                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection