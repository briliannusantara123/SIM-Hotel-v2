@extends('layouts.master')
@section('content')

   <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <section class="section">
          <div class="section-header">
            <h1>Data Kamar</h1>
          </div>

        </section>
          @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{$message}}</strong>
                        </div>
                      @endif
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <a href="kamar/create" class="btn btn-info">Tambah Kamar</a>
                          <a href=""value="Refresh Page" onClick="document.location.reload(true)" class="btn btn-warning">Reload</a>
                <br><br>
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
                <div class="panel-body">
                  <table class="table table-hover" id="table_pegawai">
                    <thead>
                      <tr>  
                            <th>Nama Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Fasilitas Kamar</th>
                            <th>Deskripsi Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Harga Kamar</th>
                            <th>Gambar</th>
                                                       
                            <th>Aksi</th>

                        </tr>
                    </thead>
                </table>
                <!-- AKHIR TABLE -->
            </div>
        </div>
    </div>
    <!-- AKHIR CONTAINER -->

    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                               <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kamar</label>
                                <input name="namakamar"type="text" class="form-control" aria-describedby="emailHelp" id="namakamar">

                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipe Kamar</label>
                                <select name="id_tipekamar" class="form-control"  id="id_tipekamar">
                                  @foreach($tipekamar as $tipekamar)
                                  <option value="{{$tipekamar->tipekamar}}">{{$tipekamar->tipekamar}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Fasilitas Kamar</label>
                                <input name="id_fasilitaskamar"type="text" class="form-control" id="id_fasilitaskamar" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Kamar</label>
                                <input name="jumlahkamar"type="text" class="form-control" id="jumlahkamar" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Harga Kamar</label>
                                <input name="hargakamar"type="text" class="form-control" id="hargakamar" aria-describedby="emailHelp">
                              </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi Kamar</label>
                                <textarea class="form-control col-12" name="deskripsi" id="deskripsi"></textarea>
                              </div>      


                        </div>
                               

                                
                                

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>
                        
   
 


                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->

    <!-- MULAI MODAL KONFIRMASI DELETE-->

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus kamar maka</b></p>
                    <p>*data  kamar tersebut hilang selamanya, apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <!-- LIBARARY JS -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>


    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Tipe Kamar Baru"); //valuenya tambah Tipe Kamar baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#table_pegawai').DataTable({
                processing:true,
                serverside:true,
                responsive:true,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                ajax: {
                    url: "{{ route('kamar.index') }}",
                    type: 'GET'
                },
                columns: [
                {
                        data: 'namakamar',
                        name: 'namakamar'
                    },
                    {
                        data: 'id_tipekamar',
                        name: 'id_tipekamar'
                    },
                    {
                        data: 'id_fasilitaskamar',
                        name: 'id_fasilitaskamar'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'jumlahkamar',
                        name: 'jumlahkamar'
                    },
                    {
                        data: 'hargakamar',
                        name: 'hargakamar'
                    },
                   { data: 'image', name: 'image',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/" + data + "\" height=\"50\"/>";
                    }
                },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            });
        });

        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('kamar.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_pegawai').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('kamar/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
               $('#id').val(data.id);
                $('#namakamar').val(data.namakamar);
                $('#id_tipekamar').val(data.id_tipekamar);
                $('#id_fasilitaskamar').val(data.id_fasilitaskamar);
                $('#jumlahkamar').val(data.jumlahkamar);
                $('#hargakamar').val(data.hargakamar);
                $('#deskripsi').val(data.deskripsi);
    
               
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "kamar/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pegawai').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });

    </script>
<script>
function reloadpage()
{
location.reload()
}
</script>

    <!-- JAVASCRIPT -->
@stop