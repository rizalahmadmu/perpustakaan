@extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master penerbit</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">penerbit</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Index penerbit</h3>
                <div style="float:right">
                    <button class="btn btn-sm btn-warning" onclick="tambah()"><i class="fas fa-plus"></i> Tambah </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                    <table id="example1 " class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>no</td>
                                <td>name</td>
                                <td>Kode</td>
                                <td>Alamat</td>
                                <td>tlp</td>
                                <td>aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $element->mpn_name }}</td>
                                <td>{{ $element->mpn_kode }}</td>
                                <td>{{ $element->mpn_alamat }}</td>
                                <td>{{ $element->mpn_tlp }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="edit('{{ $element->mpn_id }}')"><i class="fas fa-pencil-o"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus('{{ $element->mpn_id }}')"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection

<script type="text/javascript">
    function tambah(argument) {
        location.href = '{{ route('penerbit_create') }}';
    }

    function edit(argument) {
        location.href = '{{ url('/') }}' + '/penerbit_edit?&id=' + argument;
    }

    function hapus(argument) {
        location.href = '{{ url('/') }}' + '/penerbit_hapus?&id=' + argument;
    }
</script>