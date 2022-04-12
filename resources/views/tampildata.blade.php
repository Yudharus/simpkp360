@extends('layout.admin')

@section('content')

<body>
    <h1 class="text-center mb-4" >Edit Data Pegawai</h1>

    <div class="container" >
         <div class="row justify-content-center">
            <div class="col-8">
               <div class="card">
                  <div class="card-body">
                      <form action="/updatedata/{{$data->id}}" method="POST">
                        @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"></label>
                            <select class="form-select" name="jabatan" aria-label="Default select example">
                              <option selected>{{ $data->jabatan }}</option>
                              <option value="Area Sales Manager">Area Sales Manager</option>
                              <option value="Feasibility Study">Feasibility Study</option>
                              <option value="Customer Acquisition Cost">Customer Acquisition Cost</option>
                              <option value="Territory Manager">Territory Manager</option>
                              <option value="District Sales Representative">District Sales Representative</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"></label>
                            <select class="form-select" name="jenisKelamin" aria-label="Default select example">
                              <option selected>{{ $data->jenisKelamin }}</option>
                              <option value="pria">pria</option>
                              <option value="wanita">wanita</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Wilayah Kerja</label>
                            <input type="text" name="wilayahKerja" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->wilayahKerja }}">
                          </div>
                          <button type="submit" class="btn btn-success">Submit</button>
                          <a href="/pegawai" type="button" class="btn btn-danger">Kembali</a>

                        </form>
                  </div>
            </div>
            </div>
         </div>   
    </div>
</body>

@endsection