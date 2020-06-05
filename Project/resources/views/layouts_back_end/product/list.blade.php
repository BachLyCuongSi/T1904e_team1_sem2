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
        <input type="text" id="fromDateItem" class="form-control relative-icon-calendar date" placeholder="Từ ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <input type="text" id="toDateItem" class="form-control relative-icon-calendar date" placeholder="Đến ngày" />
        <i class="fa fa-calendar absolute-icon-calendar"></i>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <select id="itemStatus" class="form-control">
            <optgroup label="Trạng thái">
                <option value="">Tất cả</option>
                <option value="1" selected>Đang hoạt động</option>
                <option value="0">Ngừng hoạt động</option>

            </optgroup>
        </select>
    </div>
</div>
<div class="row mt-3" style="margin-top: 10px;">
    <div class="col-md-3 ">
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
    <div class="col-md-4 col-md-offset-5 text-right">
        <button class="btn btn-primary" id="btnSearchItem" onclick="searchItem()"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus mr-1"></i>Thêm mới</button>
    </div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
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
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Tiêu đề sản phẩm;</label></div>
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
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Mô tả:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7">
                                <textarea class="form-control" id="txt-description" placeholder="Nội dung mô tả"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-md-2 col-sm-12 col-12">
                                <label class="mt-3">Ảnh sản phẩm</label>
                            </div>
                            <div class="col-md-9 col-sm-12 col-12">
                                <a href="javascript:void(0);" id="addImg" class="text-bold mb-3" style="width:100%;height:100%; color: #5A5A5A;">
                                    <div class="row">
                                        <i class="fa fa-upload col-md-12 px-0" alt="your image"></i>
                                        <input type="hidden" id="valUrl" />
                                        <div class="row" id="DivImgAdd">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Số lượng</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input class="form-control" id="amount" placeholder="Nhập số lượng" type="number" onkeydown="javascript:return event.keyCode == 69 || event.keyCode == 198 || event.keyCode == 190 ? false:true" /></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-5 col-md-5 col-lg-5"><label class="text-dark">Giá sản phẩm:</label></div>
                            <div class="col-sm-7 col-md-7 col-lg-7"><input type="text" class="form-control number" id="price" placeholder="Nhập giá sản phẩm" /></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection