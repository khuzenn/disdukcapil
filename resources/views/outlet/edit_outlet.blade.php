@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Outlet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/data-loket">Outlet</a></li>
                        <li class="breadcrumb-item"><a href="data-loket/create-loket">Edit Outlet</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Outlet</h3>
                        </div>
                        <form id="quickForm" action="/update-outlet/{{$data->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Outlet</label>
                                    <input type="text" value="{{$data->name}}" name="name" id="name" class="form-control" placeholder="Nama Outlet">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat Outlet</label>
                                    <input type="text" value="{{$data->address}}" name="address" id="address" class="form-control" placeholder="Alamat Outlet">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No.Telepon</label>
                                    <input type="text" value="{{$data->no_telp}}" name="no_telp" id="no_telp" class="form-control" placeholder="No.Telepon Outlet">
                                </div>
                                <div class="form-group row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                                    <div class="col">
                                        <label for="header_color" class="form-label">Header Color</label>
                                        <input type="color" class="form-control form-control-color" id="header_color" name="header_color" value="{{$data->header_color}}" title="Choose your color">
                                    </div>
                                    <div class="col">
                                        <label for="box_display_color" class="form-label">Box Display Antrian Color</label>
                                        <input type="color" class="form-control form-control-color" id="box_display_color" name="box_display_color" value="{{$data->box_display_color}}" title="Choose your color">
                                    </div>
                                    <div class="col">
                                        <label for="box_ambil_color" class="form-label">Box Ambil Antrian Color</label>
                                        <input type="color" class="form-control form-control-color" id="box_ambil_color" name="box_ambil_color" value="{{$data->box_ambil_color}}" title="Choose your color">
                                    </div>
                                    <div class="col">
                                        <label for="text_color" class="form-label">Text Color</label>
                                        <input type="color" class="form-control form-control-color" id="text_color" name="text_color" value="{{$data->text_color}}" title="Choose your color">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="running_text">Running Text</label>
                                    <textarea class="form-control" value="{{$data->running_text}}" name="running_text" id="running_text" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group row">
                                    <!-- Logo preview -->
                                    <div class="col-md-2">
                                        <img class="img-preview img-fluid mb-3" width="100%" src="{{ asset('../assets/logo/' . $data->logo) }}">
                                    </div>
                                    <!-- Logo input field -->
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="logo">Logo Outlet</label>
                                            <input type="file" name="logo" id="logo" class="form-control" onchange="previewImage()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.footer')

<script>
    function previewImage() {
        var preview = document.querySelector('.img-preview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('../assets/logo/' . $data->logo) }}";
        }
    }
</script>
