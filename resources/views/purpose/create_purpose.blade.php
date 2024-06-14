@include('components.header')
@include('components.navbar')
@include('components.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tujuan Outlet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/purpose">Tujuan Outlet</a></li>
                        <li class="breadcrumb-item active">Tambah Tujuan Outlet</li>
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
                            <h3 class="card-title">Tambah Tujuan Outlet</h3>
                        </div>
                        <form id="quickForm" action="/addPurpose" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Kode Antrian</label>
                                    <select name="kode" id="kode" class="form-control">
                                        <option value="" class="form-control">Pilih Kode Antrian</option>
                                        <option value="A" class="form-control">A</option>
                                        <option value="B" class="form-control">B</option>
                                        <option value="C" class="form-control">C</option>
                                        <option value="D" class="form-control">D</option>
                                        <option value="E" class="form-control">E</option>
                                        <option value="F" class="form-control">F</option>
                                        <option value="G" class="form-control">G</option>
                                        <option value="H" class="form-control">H</option>
                                        <option value="I" class="form-control">I</option>
                                        <option value="J" class="form-control">J</option>
                                        <option value="K" class="form-control">K</option>
                                        <option value="L" class="form-control">L</option>
                                        <option value="M" class="form-control">M</option>
                                        <option value="N" class="form-control">N</option>
                                        <option value="O" class="form-control">O</option>
                                        <option value="P" class="form-control">P</option>
                                        <option value="Q" class="form-control">Q</option>
                                        <option value="R" class="form-control">R</option>
                                        <option value="S" class="form-control">S</option>
                                        <option value="T" class="form-control">T</option>
                                        <option value="Y" class="form-control">U</option>
                                        <option value="V" class="form-control">V</option>
                                        <option value="W" class="form-control">W</option>
                                        <option value="X" class="form-control">X</option>
                                        <option value="Y" class="form-control">Y</option>
                                        <option value="Z" class="form-control">Z</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Jenis Antrian">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan Antrian"></textarea>
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