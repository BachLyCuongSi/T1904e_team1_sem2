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
<div class="row mt-3">
<div class=""></div> 
    <div class="col-md-12 text-right">
        <button class="btn btn-primary" id="btnSearchItem" onclick="searchItem()" style="margin-top: 10px;"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
        <button class="btn btn-success" style="margin-top: 10px;"><i class="fa fa-plus mr-1"></i>Thêm mới</button>
    </div>
</div>


<!-- <div id="DivImgAdd">
    <input id="valUrl" type="hidden" />
</div>
<div class="row pb-3 mt-2">
    <div class="col-md-2 col-sm-12 col-12">
        <label class="mt-3">Ảnh sản phẩm</label>
    </div>
    <div class="col-md-9 col-sm-12 col-12">
        <a href="javascript:void(0)" class="text-bold mb-3" style="width:100%;height:100%; color: #5A5A5A;" id="addImg">
            <div class="news">
                <div class="article" id="AddLogoPlace">
                    <i id="AddImgLogoPlace" class="fa fa-upload col-md-12 px-0 contentImg" alt="your image"></i>
                </div>
            </div>
        </a>
    </div>
</div> -->
@endsection