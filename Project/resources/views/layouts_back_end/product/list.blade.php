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
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="itemName" class="form-control" placeholder="Nhập tên sản phẩm" />
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="fromDate" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="toDate" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <select class="form-control" id="cate-id">
            <option value="" selected disabled hidden>--Danh mục--</option>
            @if (count($lstCategory) > 0 && $lstCategory != null)
            @foreach($lstCategory as $ct)
            <option value="{{ $ct->cat_id }}">{{ $ct->cat_name }}</option>
            @endforeach
            @else
            @endif
        </select>
    </div>
</div>
<div class="row mt-3" style="margin-top: 10px;">
    <div class="col-md-4 col-md-offset-8 text-right">
        <button class="btn btn-primary" id="btnSearchItem" onclick="searchItem()"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#createIten"><i class="fa fa-plus mr-1"></i>Thêm mới</button>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-12" id="TableCategory">
        <table style="text-align:center" class="table table-bordered table-hover mt-2 w-100">
            <thead>
                <tr>
                    <th style="text-align:center">STT</th>
                    <th style="text-align:center">Tên sản phẩm</th>
                    <th style="text-align:center">Giá sản phẩm</th>
                    <th style="text-align:center">Danh mục </th>
                    <th style="text-align:center">Số lượng</th>

                    <th style="text-align:center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lstProduct as $pro)
                <tr>
                    <td>{{$pro->pr_id}}</td>

                    <td class="pr_name">{{$pro->pr_name}}</td>
                    <td class="pr_price">{{$pro->pr_price}}</td>
                    <td class="cat_name">{{$pro->cat_name}}</td>
                    <td class="pr_quantity">{{$pro->pr_quantity}}</td>
                    <td style="display: none;" class="pr_title">{{$pro->pr_title}}</td>
                    <td style="display: none;" class="pr_des">{{$pro->pr_description}}</td>


                    <td style="text-align:center">
                        <button id="{{$pro->pr_id}}" type="button" class="btn btn-success" onclick="loadProDetail($(this));" data-toggle="modal" data-target="#myModal" title="Sửa sản phẩm">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" delid="{{$pro->pr_id}}" data-toggle="modal" data-target="#mdDelPro" title="Xóa sản phẩm" onclick="delPro($(this))">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('modal')
<!-- Modal -->
<div class="modal fade" id="createIten" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Tiêu đề sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="txt-title" placeholder="Nhập tiêu đề sản phẩm" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Tên sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="txt-name" placeholder="Nhập tên sản phẩm" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Danh mục:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7">
                                <select class="form-control" id="valcate-id">
                                    <option value="0" selected disabled hidden>--Danh mục--</option>
                                    @if (count($lstCategory) > 0 && $lstCategory != null)
                                    @foreach($lstCategory as $ct)
                                    <option value="{{ $ct->cat_id }}">{{ $ct->cat_name }}</option>
                                    @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Mô tả:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7">
                                <textarea class="form-control" id="txt-description" placeholder="Nội dung mô tả"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row" style="text-align:center">
                            <label class="mt-3">Ảnh sản phẩm:</label>
                            <input type="file" id="pr_image" name="pr_image" value="" class="form-control">
                        </div>
                        <!-- Show image -->
                        <div class=form-row>
                            <div class="row">
                                <div class="col-sm-7">
                                    <img src="" id="category-img-tag" width="200px" />
                                    <!--for preview purpose -->
                                </div>
                            </div>
                        </div>
                        <!-- End show -->
                        <div class="row" style="margin-top:50px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Số lượng:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="amount" placeholder="Nhập số lượng" type="number" onkeydown="javascript:return event.keyCode == 69 || event.keyCode == 198 || event.keyCode == 190 ? false:true" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Giá sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input type="text" class="form-control number" id="price" placeholder="Nhập giá sản phẩm" /></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="createItem()"><i class="fa fa-save" style="margin-right: 5px"></i>Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sửa-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sửa sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Tiêu đề sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="txtTitleupdate" name="txtTitleupdate" placeholder="Nhập tiêu đề sản phẩm" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Tên sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="txtNameupdate" name="txtNameupdate" placeholder="Nhập tên sản phẩm" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Danh mục:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7">
                                <select class="form-control" id="txtCateupdate" name="txtCateupdate">
                                    <option value="0" selected disabled hidden>--Danh mục--</option>
                                    @if (count($lstCategory) > 0 && $lstCategory != null)
                                    @foreach($lstCategory as $ct)
                                    <option value="{{ $ct->cat_id }}">{{ $ct->cat_name }}</option>
                                    @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Mô tả:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7">
                                <textarea class="form-control" id="txtDesupdate" name="txtDesupdate" placeholder="Nội dung mô tả"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="idEditUser" />
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row" style="text-align:center">
                            <label class="mt-3">Ảnh sản phẩm:</label>
                            <input type="file" id="pr_image" name="pr_image" value="" class="form-control">
                        </div>
                        <!-- Show image -->
                        <div class=form-row>
                            <div class="row">
                                <div class="col-sm-7">
                                    <img src="" id="category-img-tag" width="200px" />
                                    <!--for preview purpose -->
                                </div>
                            </div>
                        </div>
                        <!-- End show -->
                        <div class="row" style="margin-top:50px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Số lượng:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="txtQuanupdate" name="txtQuanupdate" placeholder="Nhập số lượng" type="number" onkeydown="javascript:return event.keyCode == 69 || event.keyCode == 198 || event.keyCode == 190 ? false:true" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Giá sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input type="text" class="form-control number" name="txtPriceupdate" id="txtPriceupdate" placeholder="Nhập giá sản phẩm" /></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="updatePro()"><i class="fa fa-save" style="margin-right: 5px"></i>Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bắt đầu modal delete product-->
<div class="modal fade" id="mdDelPro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-3 col-md-3 col-lg-3"></div>
            <div class="modal-content col-sm-6 col-md-6 col-lg-6">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                </div>
                <div class="modal-body">
                    <span>Bạn muốn xóa sản phẩm <b id="txtName" name="txtName"></b> &nbsp?</span>
                    <input type="hidden" id="valIDUser" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" onclick="destroyPro()">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc modal delete product -->
@endsection
<script type="text/javascript">
    //Show modal Sửa sản phẩm 
    function loadProDetail(data) {
        var thiss = data.closest('tr');

        var id = data.attr('id');
        var name = thiss.children('.pr_name').text();
        var price = thiss.children('.pr_price').text();
        var des = thiss.children('.pr_des').text();
        var quan = thiss.children('.pr_quantity').text();
        var title = thiss.children('.pr_title').text();
        var cate = thiss.children('.cat_name').text();

        $('#txtNameupdate').val(name);
        $('#txtPriceupdate').val(price);
        $('#txtDesupdate').val(des);
        $('#txtTitleupdate').val(title);
        $('#txtQuanupdate').val(quan);
        $('#idEditUser').val(id);
        $('#txtCateupdate').val(cate);

    }

    function updatePro() {
        var id = $.trim($("#idEditUser").val());
        var name = $.trim($("#txtNameupdate").val());
        var price = $.trim($("#txtPriceupdate").val());
        var description = $.trim($("#txtDesupdate").val());
        var amount = $.trim($("#txtQuanupdate").val());
        var title = $.trim($("#txtTitleupdate").val());
        var category = $.trim($("#txtCateupdate").val());
        var data = {
            id,
            name,
            title,
            description,
            category,
            amount,
            price
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('admin.pro.edit')}}",
            type: 'POST',
            data: data,
            success: function(res) {
                if (res.status == 1) {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "success"
                    }).then((success) => {
                        if (success) {
                            $('#createIten').modal('hide');
                            location.reload();
                        }

                    })
                } else {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "error"
                    })
                }
            }
        })
    }


    //end show

    //Hiển thị ảnh sản phẩm
    $('#category-img-tag').hide();

    function readURL(input) {
        if (input.files && input.files[0]) {


            var reader = new FileReader();

            reader.onload = function(e) {
                $('#category-img-tag').show();
                $('#category-img-tag').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }

    }

    $("#pr_image").change(function() {

        readURL(this);
    });
    //Tạo mới một sản phẩm

    function createItem() {
        var name = $.trim($('#txt-name').val());
        var title = $.trim($('#txt-title').val());
        var description = $.trim($('#txt-description').val());
        var category = $('#valcate-id').val();
        var price = $.trim($('#price').val().replace(/,/g, ""));
        var amount = $('#amount').val();
        var pr_image = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

        var data = {
            name,
            title,
            description,
            category,
            amount,
            price,
            pr_image
        }
        if (title.length == 0 || name.length == 0) {
            swal({
                title: "Cảnh báo!",
                text: "Vui lòng nhập đầy đủ thông tin",
                icon: 'warning'
            })
            return;
        }

        if (category == "" || category == null) {
            swal({
                title: "Cảnh báo!",
                text: "Vui lòng chọn danh mục cho sản phẩm",
                icon: 'warning'
            })
            return;
        }

        if (typeof pr_image === "undefined") {
            swal({
                title: "Cảnh báo!",
                text: "Vui lòng chọn ảnh cho sản phẩm",
                icon: 'warning'
            })
            return;
        }

        if (parseInt(price) == 0 || parseInt(price) == null) {
            swal({
                title: "Cảnh báo!",
                text: "Giá phải lớn hơn 0",
                icon: 'warning'
            })
            return;
        }

        if (parseInt(amount) == 0 || parseInt(amount) == null) {
            swal({
                title: "Cảnh báo!",
                text: "Số lượng phải lớn hơn 0",
                icon: 'warning'
            })
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

            }
        });

        $.ajax({
            url: "{{route('admin.pro.store')}}",
            type: 'POST',
            data: data,
            success: function(res) {
                if (res.status == 1) {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "success"
                    }).then((success) => {
                        if (success) {
                            $('#createIten').modal('hide');
                            location.reload();
                        }

                    })
                } else {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "error"
                    })
                }
            }
        })
    }

    function delPro(pro) {
        var thiss = pro.closest('tr');
        var name = thiss.children('.pr_name').text();
        var id = pro.attr('delid');
        $('#txtName').text(name);
        $('#valIDUser').val(id);
    }

    function destroyPro() {
        var id = $.trim($("#valIDUser").val());
        // alert(id)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('admin.pro.destroy')}}",
            type: 'POST',
            data: {
                id: id
            },
            success: function(res) {
                if (res.status == 1) {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "success"
                    }).then((success) => {
                        if (success) {
                            $('#createIten').modal('hide');
                            location.reload();
                        }

                    })
                } else {
                    swal({
                        title: res.message,
                        text: "",
                        icon: "error"
                    })
                }
            }
        })
    }

    //Tìm kiếm thông tin sản phẩm

    function searchItem() {
        var name = $.trim($('#itemName').val());
        var fromDate = $.trim($('#fromDate').val());
        var toDate = $.trim($('#toDate').val());
        var cateID = $('#cate-id').val();
        $('#modalLoad').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('product.search')}}",
            data: {
                name,
                fromDate,
                toDate,
                cateID
            },
            type: "GET",
            success: function(res) {
                $('#modalLoad').modal('hide');
                $('#TableCategory').html(res);

            }
        })

    }
</script>
@endsection