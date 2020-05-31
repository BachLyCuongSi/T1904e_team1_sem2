@extends('layouts_back_end.admin');

@section('content')
		  <h1>Quản lý khách hàng</h1>
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
												<a href="" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i></a>
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


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

@endsection
