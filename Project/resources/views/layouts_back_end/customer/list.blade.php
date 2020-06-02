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
    <div class="col-md-12 text-right">
        <button class="btn btn-success" id="btnSearchItem" onclick="searchItem()" style="margin-top: 10px;"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
    </div>
</div>
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
								      <td>{{$customer->cus_name}}</td>
											<td>{{$customer->cus_email}}</td>
								      <td>{{$customer->cus_phone}}</td>
											<td>{{$customer->cus_addres}}</td>
											<td class="form-group">
												<a href="{{route('customer_manage.edit', $customer->cus_id)}}" class="button">Edit</a></i></a>
												<form class="" action="{{route('customer_manage.destroy', $customer->cus_id)}}"
								          method="POST" onsubmit="confirm('Sure ?')">
								          @csrf
								          <input type="hidden" name="_method" value="DELETE">
								          <input type="submit" name=""  value="Delete">
								        </form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
{{$lsCustomer->links()}}

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

@endsection
