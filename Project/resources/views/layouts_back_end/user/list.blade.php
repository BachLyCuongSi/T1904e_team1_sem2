@extends('layouts_back_end.admin')

@section('content')

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div class="row mb-2">
		    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
		        <input type="text" id="name" class="form-control" placeholder="Nhập ID" />
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

		 <!-- them thanh vien -->
		<div id="toolbar" class="btn-group">
            <a href="thanhvien-add.html" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>

				<!-- tao bang -->
				<div class="row">
				    <div class="col-md-12" id="TableCategory">
				<table style="text-align:center" class="table table-bordered table-hover mt-2 w-100">
				    <thead >
				        <tr >
				            <th style="text-align:center">ID</th>
				            <th style="text-align:center">Họ Tên</th>
										<th style="text-align:center">Email</th>
				            <th style="text-align:center">Quyền</th>
				            <th style="text-align:center" >Chức Năng</th>
				        </tr>
				    </thead>
				    <tbody>
				                  @foreach($lsUsers as $Users)
				                    <tr>
				                        <td>{{$Users->id}}</td>
				                        <td>{{$Users->name}}</td>
				                        <td>{{$Users->email}}</td>
																<td></td>
				                        <td style="text-align:center">
				                            <button type="button" class="btn btn-success"
																						onclick="editCategory(28);" data-toggle="modal"
																						data-target="#myModal" title="Sửa Danh Mục">
				                                			<i class="fa fa-pencil"></i>
				                            </button>
				                            <button type="button" class="btn btn-danger"
																						title="Xóa Danh Mục" onclick="DeleteCategory(28)">
				                                			<i class="fa fa-trash-o"></i>
				                            </button>
				                        </td>
				                    </tr>
				                    @endforeach
				    </tbody>
				</table>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
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
