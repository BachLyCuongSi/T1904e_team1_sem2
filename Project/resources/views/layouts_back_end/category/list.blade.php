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
        <input type="text" id="itemName" class="form-control" placeholder="Nhập tên sản phẩm" />
    </div>
    
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-54">
        <input type="text" id="fromDateItem" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <input type="text" id="toDateItem" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    
</div>
<div class="row mt-3">
    <div class="col-md-12 text-right">
        <button class="btn btn-success" id="btnSearchItem" onclick="searchItem()" style="margin: 10px 10px 10px;"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createCategory" onclick="" style="margin:10px 10px 10px ;"><i class="fa fa-fw fa-plus"></i>Thêm mới</button>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12" id="TableCategory">
<table style="text-align:center" class="table table-bordered table-hover mt-2 w-100">
    <thead >
        <tr >
            <th style="text-align:center">STT</th>
            <th style="text-align:center">Tên sản phẩm</th>
            <th style="text-align:center">Ngày tạo</th> 
            <th style="text-align:center" >Chức năng</th>
        </tr>
    </thead>
    <tbody>
                  @foreach($lsCategory as $category)
                    <tr>
                        <td>{{$category->cat_id}}</td>
                        <td>{{$category->cat_name}}</td>
                        <td>{{$category->created_at}}</td>
                        
                        <td style="text-align:center">
                            <button type="button" class="btn btn-success" onclick="editCategory(28);" data-toggle="modal" data-target="#myModal" title="Sửa Danh Mục">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger" title="Xóa Danh Mục" onclick="DeleteCategory(28)">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>       
                    @endforeach
    </tbody>
</table>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Sửa thành công.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#add_logo_place").off('click').on('click', function(e) {
            e.preventDefault();
            var fider = new CKFinder();

            fider.selectActionFunction = function(fileUrl) {
                $("#AddImgLogoPlace ").remove();
                $("#AddLogoPlace").append('<img id="AddImgLogoPlace" src="' + fileUrl + '" class="col-md-12 px-0 border-dekko contentImg" alt="your image" />');
                var url = window.location.origin + fileUrl;
                $('#txtAddLogoPlace').val(url);
            }
            fider.popup();
        });
    });
</script>
@endsection