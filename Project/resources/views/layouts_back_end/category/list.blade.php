@extends('layouts_back_end.admin')

@section('content')

<div class="col-md-12" style="margin-top:50px;">
  <div class="breadcrumb-holder">
    <div class="row mb-3 mt-3">
      <div class="col-md-10 col-sm-10 col-9 text-dark px-0">
        <h4><i class="fa fa-fw fa-apple"></i> Sản phẩm</h4>
      </div>
    </div>
  </div>
</div>

<div class="row mb-2">

  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
    <input type="text" id="cat-name" class="form-control" placeholder="Nhập tên danh mục" />
  </div>

  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-54">
    <input type="text" id="txt-fromDate" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
    <i class="fa fa-calendar absolute-icon-calendar"></i>
  </div>
  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
    <input type="text" id="txt-toDtate" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
    <i class="fa fa-calendar absolute-icon-calendar"></i>
  </div>

</div>
<div class="row mt-3">
  <div class="col-md-12 text-right">
    <button class="btn btn-success" id="btnSearchItem" onclick="searchCate()" style="margin: 10px 10px 10px;"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createCategory" onclick="" style="margin:10px 10px 10px ;"><i class="fa fa-fw fa-plus"></i>Thêm mới</button>
  </div>

</div>
<div class="row">
  <div class="col-md-12" id="TableCategory">
    <table style="text-align:center" class="table table-bordered table-hover mt-2 w-100">
      <thead>
        <tr>
          <th style="text-align:center">STT</th>
          <th style="text-align:center">Tên danh mục</th>
          <th style="text-align:center">Ảnh danh mục</th>
          <th style="text-align:center">Ngày tạo</th>
          <th style="text-align:center">Chức năng</th>
        </tr>
      </thead>
      <tbody>
        @foreach($lsCategory as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="cat_name">{{$category->cat_name}}</td>

          <td class="imgUrl">
            <div class="col-md-3"><img src="{{$category->imgUrl}}" style="height:100px;" /></div>
          </td>
          <td>{{date('d-m-Y',strtotime($category->created_at))}}</td>
          <td style="text-align:center">
            <button id="{{$category->cat_id}}" type="button" class="btn btn-success" onclick="loadCatDetail($(this));" data-toggle="modal" data-target="#myModal" title="Sửa Danh Mục">
              <i class="fa fa-pencil"></i>
            </button>
            <button type="button" class="btn btn-danger" title="Xóa Danh Mục" onclick="delCat()">
              <i class="fa fa-trash-o"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      {{$lsCategory->links()}}
    </div>
  </div>
</div>



<!-- thêm-->
<div id="createCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">Thêm danh mục</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Tên danh mục:</label>
          </div>
          <div class="col-md-7">
            <input type="text" id="txtNamecreate" class="form-control" placeholder="Nhập tên danh mục" />
            <input type="hidden" id="" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="createCategory()"><i class="fa fa-plus mr-1"></i>Thêm</button>
      </div>
    </div>
  </div>
</div>

@section('modal')
<!-- sửa-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">Sửa danh mục</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-5">
            <label class="text-dark">Tên danh mục:</label>
          </div>
          <div class="col-md-7">
            <input type="text" id="txtNameupdate" class="form-control" placeholder="Nhập tên danh mục" />
            <input type="hidden" id="valIdCat" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="updateCategory()"><i class="fa fa-save mr-1"></i>Lưu</button>
      </div>
    </div>
  </div>
</div>

@endsection

<script type="text/javascript">
  function loadCatDetail(data) {
    var thiss = data.closest('tr');
    var id = data.attr('id');
    var name = thiss.children('.cat_name').text();

    $('#txtNameupdate').val(name);
    $('#valIdCat').val(id);
  }

  //xóa
  function delCat(id) {
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
          url: "cate_manage/destroy",
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


  //thêm
  function createCategory() {
    var name = $.trim($('#txtNamecreate').val());
    var token = $('meta[name="csrf-token"]').attr('content');
    if (name.length == 0) {
      swal({
        title: 'Please input full data',
        text: '',
        icon: 'warning'
      })
      return;
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "cate_manage/store",
      data: {
        name
      },
      type: 'put',
      success: function(res) {
        swal({
          title: res.message,
          text: "",
          icon: "success"
        }).then((success) => {
          if (success) {
            location.reload();
          }
        })
      }
    })
  }

  //Tìm kiếm thông tin danh mục

  function searchCate() {
    var name = $.trim($('#cat-name').val());
    var toDate = $.trim($('#txt-toDtate').val());
    var fromDate = $.trim($('#txt-fromDate').val());

    $('#modalLoad').modal('show');

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{route('comment_manage.search')}}",
      type: "GET",
      data: {
        name,
        fromDate,
        toDate
      },
      success: function(res) {
        $('#modalLoad').modal('hide');
        $('#TableCategory').html(res);
      }
    })
  }
</script>

@endsection