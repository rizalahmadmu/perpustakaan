@extends('layouts_backend._main')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <form class="form-save">
               <label> nama </label>
               <input type="text" class="form-control" name="nama">
               <label> kelas </label>
               <input type="text" class="form-control" name="kelas">
               <br>
               <button class="btn btn-sm btn-info" type="button" onclick="save()"> 
                  <i class="fas fa-save"></i> Simpan 
               </button>
             </form>
            </div>
          </div>
  </div>
@endsection

<script type="text/javascript">
  function save(argument) {
      
    $.ajax({
      url:'{{ route('latihan_crud_save') }}',
      data:$('.form-save').serialize(),
      type:'get',
      success:function(data){
        if (data.status == 'sukses') {
          alert('data sudah disimpan.')
        }
      }

    });

  }
</script>