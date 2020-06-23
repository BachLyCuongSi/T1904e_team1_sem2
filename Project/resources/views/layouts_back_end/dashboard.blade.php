@extends('layouts_back_end.admin');

@section('content')
{{-- \container-fluid --}}
<div class="">
     <div class="   ">
         <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->
         <div class="row">
            <div   class="col-lg-3 col-md-6">
                <div   class="panel panel-primary">
                    {{-- panel --}}
                    <div style="height: 15%" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    {{ $count_cate }}
                                </div>
                                <div>Category</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div style="height: 15%" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $count_pr }}</div>
                                <div>Product</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow ">
                    <div style="height: 15%" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $count_cus }}</div>
                                <div>Custommer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div   class="panel panel-red">
                    <div style="height: 15%" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $count_od }}</div>
                                <div>Order</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <hr>

         <!-- /.row -->
         <div class="row">
                    <div class="col-lg-8">
                        <!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Đơn hàng mới nhất
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered table-hover table-striped">
                                                <thead >
                                                    <tr>
                                                        <th>Đơn hàng</th>
                                                        <th>Thời gian</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Tình trạng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($datas as $newod)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{date('d-m-Y',strtotime($newod->created_at))}}</td>
                                                            <td>{{ $newod->cus_total_price_PayMent}} PM</td>
                                                            <td>{{ $newod->status }}</td> VND</td>
                                                        </tr>

                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.col-lg-4 (nested) -->

                                    <!-- /.col-lg-8 (nested) -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>

                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Notifications Panel
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                        </span>
                                    </a>

                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-money fa-fw"></i> Payment Received
                                        <span class="pull-right text-muted small"><em>Yesterday</em>
                                        </span>
                                    </a>
                                </div>
                                <!-- /.list-group -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel .chat-panel -->
                    </div>
                    <!-- /.col-lg-4 -->
                    </>
                    <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

<!-- /#wrapper -->
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="../js/raphael.min.js"></script>
<script src="../js/morris.min.js"></script>
<script src="../js/morris-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>



@endsection


