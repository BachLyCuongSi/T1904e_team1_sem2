@extends('layouts_back_end.admin');

@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý khách hàng</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý khách hàng</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table
									data-toolbar="#toolbar"
									data-toggle="table">

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
								      <td>{{$customer->id}}</td>
								      <td>{{$customer->name}}</td>
											<td>{{$customer->email}}</td>
								      <td>{{$customer->phone}}</td>
											<td>{{$customer->addres}}</td>
											<td class="form-group">
												<a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i></a>
												<form class="" action="#"
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
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

@endsection
