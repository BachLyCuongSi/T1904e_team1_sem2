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
				<div id="toolbar" class="btn-group">
					<button class="btn btn-primary" id="btnSearchItem" onclick="searchItem()"><i class="fa fa-search mr-1"></i>Tìm kiếm</button>
				</div>
				<div id="toolbar" class="btn-group">
					<a href="{{route('user_manage.create')}}" class="btn btn-success">
						<i class="glyphicon glyphicon-plus"></i> Thêm thành viên
					</a>
				</div>
			</div>
		<div class="">
		</div>
		 <!-- them thanh vien -->

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
				    <tbody >
						@foreach($lsUsers as $Users)
						<tr>
							<td>{{$Users->id}}</td>
							<td>{{$Users->name}}</td>
							<td>{{$Users->email}}</td>
								@if($Users->roles == 1)
									<td><span class="label label-danger">Adm</span></td> 	
								@else:
									<td><span class="label label-danger">Mem</span></td>
								@endif
							<td style="text-align:center">
								<button type="button" class="btn btn-success"
										onclick="editCategory(28);" data-toggle="modal"
										data-target="#myModal" title="Sửa Danh Mục">
									<i class="fa fa-pencil"></i>
								</button>
{{-- 								
									<a id="{{$Users->id}}}" onclick="loadCusDetail($(this))"><i class="fa fa-edit text-success"></i></a>
									<a onclick="delId('{{$Users->id}}}')"><i class="fa fa-trash text-danger"></i></a> --}}
								
							</td>
						</tr>
						@endforeach
				    </tbody>
				</table>
				<div>{{$lsUsers -> links()}}</div>
				

	</div>	<!--/.main-->
 {{-- <script type="text/javascript">  
	  function delId(id) {
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
          url: "user_manage/destroy",
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
              }).then( => {
                if  {
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
</script> --}}


@endsection
