@include('components.header')
@include('components.navbar')
@include('components.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Antarmuka</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Antarmuka</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="container">
                <h1>Manage Box Settings</h1>
                @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif
                <form action="{{ route('admin.create-box') }}" method="POST">
                    @csrf
                    @foreach(range(1, 4) as $box)
                      <div class="form-group">
                          <label for="box_{{ $box }}">Box {{ $box }} Loket</label>
                          <select name="box_{{ $box }}" id="box_{{ $box }}" class="form-control">
                              <option value="">Select Loket</option>
                              @foreach($lokets as $loket)
                                  <option value="{{ $loket->id }}" {{ isset($settings['box_' . $box]) && $settings['box_' . $box]->loket_id == $loket->id ? 'selected' : '' }}>
                                      {{ $loket->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('components.footer')