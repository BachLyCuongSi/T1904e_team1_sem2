<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vietpro Mobile Shop - Administrator</title>

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('css/front-awesome.min.css')}}" rel="stylesheet">

    <!--Icons-->
    <script src="{{ asset('js/lumino.glyphs.js')}}"></script>
    <script src="{{ asset('js/sweetalert.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('js/jquery.ajaxy.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>



    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Vietpro</span>Shop</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked male-user">
                                        <use xlink:href="#stroked-male-user"></use>
                                    </svg> Hồ sơ</a></li>
                            <li><a href="#"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="active"><a href="index.php?page_layout=dashboard"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Dashboard</a></li>
            <li><a href="#"><svg class="glyph stroked male user ">
                        <use xlink:href="#stroked-male-user" /></svg>Quản lý thành viên</a></li>

            <li><a href="{{route('cate_manage.list')}}"><svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder" /></svg>Quản lý danh mục</a></li>

            <li><a href="{{route('product_manage.list')}}"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>Quản lý sản phẩm</a></li>

            <li><a href="#"><svg class="glyph stroked two messages">
                        <use xlink:href="#stroked-two-messages" /></svg> Quản lý bình luận</a></li>

            <li><a href="{{route('customer_manage.index')}}"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-chain" /></svg> Quản lý khách hàng</a></li>

            <li><a href="#"><svg class="glyph stroked gear">
                        <use xlink:href="#stroked-gear" /></svg> Cấu hình</a></li>
        </ul>

    </div>
    <!--/.sidebar-->
    <!-- Master Page -->


    @yield('content')


</body>

</html>
