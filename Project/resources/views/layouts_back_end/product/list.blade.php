@extends('layouts_back_end.admin')

@section('content')
<div class="col-md-12" style="margin-top:50px;">
    <div class="breadcrumb-holder">
        <div class="row mb-3 mt-3">
            <div class="col-md-10 col-sm-10 col-9 text-dark px-0">
                <h4><i class="fa fa-fw fa-car"></i> Sản phẩm</h4>
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
@endsection