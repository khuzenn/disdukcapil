@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5>Info Sistem Antrian</h5>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Antrian</span>
                            <span class="info-box-number">
                                <h4><b>0</b></h4>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fa fa-th"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Loket</span>
                            <span class="info-box-number">
                                <h4><b>{{ $totalLoket }}</b></h4>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Tujuan Antrian</span>
                            <span class="info-box-number">
                                <h4><b>{{ $totalPurpose }}</b></h4>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pengguna</span>
                            <span class="info-box-number">
                                <h4><b>0</b></h4>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <h5 class="mb-2 mt-4">Tools Antrian</h5>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Reset Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <form action="#" method="post">
                            <input type="hidden" name="_token" value="0ycAm2ay718Jm6vS7rwPRFmjGNiIIQRfpUgszUHK">
                            <input type="hidden" id="user_id" name="user_id" value="1">
                            <button type="submit" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Reset <i class="fas fa-arrow-circle-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Antarmuka Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="antarmuka-display" target="_blank" class="small-box-footer">
                            More Info <i class=" fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Info Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="display-antrian" target="_blank" class="small-box-footer">
                            More Info <i class=" fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <h5 class="mt-4 mb-2">Info Antrian</h5>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('components.footer')
