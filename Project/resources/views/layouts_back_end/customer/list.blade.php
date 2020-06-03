@extends('layouts_back_end.admin');

@section('content')
<div class="col-md-12" style="margin-top:50px;">
  <div class="breadcrumb-holder">
    <div class="row mb-3 mt-3">
      <div class="col-md-10 col-sm-10 col-9 text-dark px-0">
        <h1><i class="fa fa-fw fa-circle"></i> Quản lý khách hàng</h1>
      </div>
    </div>
  </div>
</div>
<div class="row mb-2">
  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
    <input type="text" id="itemName" class="form-control" placeholder="Nhập tên hoặc số điện thoại khách hàng" />
  </div>

  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
    <input type="text" id="fromDateItem" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
    <i class="fa fa-calendar absolute-icon-calendar"></i>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
    <input type="text" id="toDateItem" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
    <i class="fa fa-calendar absolute-icon-calendar"></i>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
    <button class="btn btn-success" id="btnSearchItem" onclick="searchItem()"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
  </div>
</div>

<div class="row mt-5" style="margin-top:20px;">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Họ và Tên</th>
          <th>Email</th>
          <th>Số Điện Thoại</th>
          <th>Địa Chỉ</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($lsCustomer as $customer)
        <tr>
          <td>{{$customer->cus_id}}</td>
          <td class="cus_name">{{$customer->cus_name}}</td>
          <td class="cus_email">{{$customer->cus_email}}</td>
          <td class="cus_phone">{{$customer->cus_phone}}</td>
          <td class="cus_addres">{{$customer->cus_addres}}</td>
          <td class="text-center">
            <a id="{{$customer->cus_id}}" onclick="loadCusDetail($(this))"><i class="fa fa-edit text-success"></i></a>
            <a onclick="delCus('{{$customer->cus_id}}')"><i class="fa fa-trash text-danger"></i></a>
          </td>
          <!-- <td class="form-group">
                    <a href="{{route('customer_manage.edit', $customer->cus_id)}}" class="button">Edit</a></i></a>
                    <form class="" action="{{route('customer_manage.destroy', $customer->cus_id)}}"
                      method="POST" onsubmit="return ConfirmDelete()">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" name=""  value="Delete">
                    </form>
                  </td> -->
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{$lsCustomer->links()}}

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông tin khách hàng</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Tên khách hàng:</label>
          </div>
          <div class="col-md-7">
            <input type="text" id="txtName" class="form-control" placeholder="Nhập tên khách hàng" />
          </div>
        </div>
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Số điện thoại:</label>
          </div>
          <div class="col-md-7">
            <input id="txtPhone" class="form-control" placeholder="Nhập số điện thoại khách hàng">
          </div>
        </div>
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Email:</label>
          </div>
          <div class="col-md-7">
            <input id="txtEmail" class="form-control" placeholder="Nhập email khách hàng">
          </div>
        </div>
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Địa chỉ:</label>
          </div>
          <div class="col-md-7">
            <input id="txtAddress" class="form-control" placeholder="Nhập địa chỉ khách hàng">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><i class="fa fa-save mr-1"></i>Lưu</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  // load thông tin khách hàng

  function loadCusDetail(data) {
    var thiss = data.closest('tr');
    var id = data.attr('id');
    var name = thiss.children('.cus_name').text();
    alert(id);
    alert(name);
  }

  //Xóa khách hàng
  function delCus(id) {
    swal({
      title: "Bạn chắc chắn muốn xóa chứ?",
      text: "",
      icon: "warning",
      buttons: ['Cancel', 'OK']
    }).then((sure) => {
      if (sure) {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "customer_manage/destroy",
          data: {
            id
          },
          type: "delete",
          success: function(res) {
            if (res.status == 1) {
              swal({
                title: res.message,
                text: "",
                icon: "success"
              }).then((success) => {
                if (success) {
                  location.reload();
                }
              })
            } else {
              swal({
                title: res.message,
                text: "",
                icon: "error",
              })
            }
          }
        })
      }
    })
  }
</script>

@endsection