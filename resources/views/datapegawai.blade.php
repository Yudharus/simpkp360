@extends('layout.admin')

@push('css')

<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

@endpush


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


        <div class="container" > 
            <h1 class="mb-6">Data Pegawai</h1>
            <a href="/tambahpegawai"  class="btn btn-success mb-0">Tambah Pegawai</a>
              <div class="row g-3 align-items-center mt-2 mb-2">
                <div class="col-auto">
                  <form action="/pegawai" method="GET">
                  <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                  </form>
                </div>
              </div>

            <div class="row" >
              <!-- @if ($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                        {{ $message }}
                  </div>
              @endif -->
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Wilayah Kerja</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                          $no = 1;
                        @endphp
                        @foreach( $data as $index => $row)
                        <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->nama}}</td>
                        <td>{{ $row->jabatan }}</td>
                        <td>{{ $row->jenisKelamin }}</td>
                        <td>{{ $row->wilayahKerja }}</td>
                        <td>{{ $row->created_at->format('D M Y') }}</td>
                        <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id}}" data-nama="{{ $row->nama}}">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>

                  
              </table>
              {{ $data->links() }}
            </div>
            
        </div>
    </div>

</div>

</div>

@push('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
      $('.delete').click(function(){
        var pegawaiid = $(this).attr('data-id');
        var pegawainama = $(this).attr('data-nama');
          swal({
            title: "Yakin ingin menghapus?",
            text: "Anda akan menghapus data pegawai dengan nama "+pegawainama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location = "/delete/"+pegawaiid+" "
              swal("Data Berhasil Dihapus!", {
                icon: "success",
              });
            } else {
              swal("Data tidak dihapus!");
            }
          });
      })
        
    </script>

<script>
  @if (Session::has('success')) {
    // Set a success toast, with a title
    toastr.success("{{ Session::get('success') }}")
    }
  @endif

</script>

@endpush


@endsection

