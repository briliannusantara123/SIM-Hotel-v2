@extends('layouts.master')
@section('content')

<style type="text/css">
    .container  .card{
        margin-top: 15%;
        margin-left: 200px;
    }
</style>

 <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <section class="section">
          <div class="section-header">
            <h1>Tambah Data Laundry</h1>
          </div>

        </section>
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        
                          <a href=""value="Refresh Page" onClick="document.location.reload(true)" class="btn btn-warning">Reload</a>
                           <a href="/laundry" class="btn btn-danger">Kembali</a>
                <br>

                          @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      </div>
                    </div>
                    <br>
                   
                </div>
 
                <div class="card-body">
                    <form method="POST" action="/laundry/stores" enctype="multipart/form-data">
                        @csrf
 
                        
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Paket</label>
                                <input name="nama"type="text" class="form-control" aria-describedby="emailHelp" id="nama">

                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Harga</label>
                               <input name="harga"type="text" class="form-control" aria-describedby="emailHelp" id="harga">
                              </div>
                              
                               

                        <div class="form-group">
                            <button class="btn btn-primary" style="width: 100%;">Simpan</button>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection