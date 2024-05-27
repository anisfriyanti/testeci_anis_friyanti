@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ url('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    
@endsection
@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <?php
    $requestUrl = Request::url();
    
    $page = '?page=' . request()->page;
    
    $totalPage = $data->last_page;
    $lastPage = $data->last_page;
    $activePage = $data->current_page;
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Karyawan</h3>
                </div>

                <div class="box-body">

                    <div class="col-xs-4">
                        <a href="#" data-toggle="modal" data-target="#modal-create-karyawan" class="btn btn-success">Add</a>
                    </div>
                    {{-- <div class="row"> --}}
                    <div class="col-sm-12">

                        <div class="box-body">
                            <table class="table table-bordered" id="table-list" name="table-list">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>ID karyawan</th>
                                    <th>NIK</th>
                                    <TH>Nama</TH>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>id jabatan</th>
                                    <th>nama jabatan</th>
                                   
                                    <th>Action</th>

                                </tr>
                                @if (count($data->data) < 1)
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                @else
                                    <?php $i = 1; ?>
                                    @foreach ($data->data as $entry)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="pd_id_karyawan">{{ $entry->id_karyawan }}</td>
                                            <td class="pd_nik">{{ $entry->nik }}</td>
                                            <td class="pd_nama">{{ $entry->nama }}</td>
                                            <td class="pd_ttl">{{ $entry->ttl }}</td>
                                            <td class="pd_alamat">{{ $entry->alamat }}</td>
                                            <td class="pd_id_jabatan">{{ $entry->id_jabatan }}</td>
                                            <td class="pd_nama_jabatan">{{ $entry->nama_jabatan }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                    onclick="deleteData({{ $entry->id_karyawan }})">Hapus</a>
                                                {{-- <a class="btn btn-xs btn-success">Edit</a> --}}
                                                <a href="" class="btnSelect" name="btnSelect" data-toggle="modal"
                                                    data-target="#modal-edit-karyawan">
                                                    <button class="btn btn-xs btn-success">Edit</button>

                                                </a>
                                            </td>



                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>



                    </div>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="{{ $requestUrl . '&page=1' }}">«</a></li>
                            <?php
                            if (count($data->data) > 0) {
                                if ($totalPage > 0 && $totalPage >= 5) {
                                    if ($activePage <= 3) {
                                        for ($x = 1; $x <= 5; $x++) {
                                            if ($activePage == $x) {
                                                echo "<li><a class='btn btn-info btn-sm disabled' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            } else {
                                                echo "<li><a class='btn btn-info btn-sm' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            }
                                        }
                                    } elseif ($activePage >= $totalPage - 2) {
                                        for ($x = $totalPage - 4; $x <= $totalPage; $x++) {
                                            if ($activePage == $x) {
                                                echo "<li><a class='btn btn-info btn-sm disabled' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            } else {
                                                echo "<li><a class='btn btn-info btn-sm' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            }
                                        }
                                    } else {
                                        for ($x = $activePage - 2; $x <= $activePage + 2; $x++) {
                                            if ($activePage == $x) {
                                                echo "<li><a class='btn btn-info btn-sm disabled' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            } else {
                                                echo "<li><a class='btn btn-info btn-sm' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                            }
                                        }
                                    }
                                } else {
                                    for ($x = 1; $x <= $totalPage; $x++) {
                                        if ($activePage == $x) {
                                            echo "<li><a class='btn btn-info btn-sm disabled' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                        } else {
                                            echo "<li><a class='btn btn-info btn-sm' href='" . $requestUrl . '?page=' . $x . "'>" . $x . '</a></li>';
                                        }
                                    }
                                }
                            } else {
                                echo "<li><a class='btn btn-info btn-sm disabled' href='#'>-</a></li>";
                            }
                            ?>
                            <li><a href="{{ $requestUrl . '?page=' . $lastPage }}">»</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">




                    </div>
                    {{-- </div> --}}
                </div>

            </div>

        </div>
    </section>
    <div class="modal fade" id="modal-create-karyawan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah karyawan</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('karyawan') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                               
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>NIK</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="number" class="form-control " name="nik" id="nik"
                                            placeholder="Input NIK" required />
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama karyawan</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama" id="nama"
                                            placeholder="Input Karyawan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>TTL</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="date" class="form-control " name="ttl" id="ttl"
                                            placeholder="Input ttl" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>alamat</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="alamat" id="alamat"
                                            placeholder="Input alamat" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4 col-md-2"> jabatan</label>
                                    <div class="col-xs-6 col-md-9 input-group">

                                    <select class="form-control" name="jabatan_select" id="jabatan_select" required>
                                              
                                            </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-karyawan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit karyawan</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('karyawan/edit') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">



                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>NIK</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="number" class="form-control " name="nik_show" id="nik_show"
                                            placeholder="Input NIK" required />
                                            <input type="hidden" class="form-control " name="id_karyawan_show" id="id_karyawan_show"
                                            placeholder="Input NIK" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama karyawan</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama_show" id="nama_show"
                                            placeholder="Input Karyawan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>TTL</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="date" class="form-control " name="ttl_show" id="ttl_show"
                                            placeholder="Input ttl" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>alamat</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="alamat_show" id="alamat_show"
                                            placeholder="Input alamat" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4 col-md-2"> jabatan</label>
                                    <div class="col-xs-6 col-md-9 input-group">

                                    <select class="form-control" name="jabatan_select_edit" id="jabatan_select_edit" required>
                                              
                                            </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(".btnSelect").on('click', function() {
          
            var currentRow = $(this).closest("tr");
            // var col2 = currentRow.find(".pd-name").html();
            // var col3 = currentRow.find(".pd-level").html();
            var id_karyawan=currentRow.find(".pd_id_karyawan").html();
            var nik=currentRow.find(".pd_nik").html();
            var nama=currentRow.find(".pd_nama").html();
            var ttl =currentRow.find(".pd_ttl").html();
            var alamat=currentRow.find(".pd_alamat").html();
            var id_jabatan=currentRow.find(".pd_id_jabatan").html();
           
            $("#nik_show").val(nik);
            $("#id_karyawan_show").val(id_karyawan);
            $("#nama_show").val(nama);
            $("#ttl_show").val(ttl);
            $("#alamat_show").val(alamat);
            $("#jabatan_select_edit").val(id_jabatan);
          


        });
        $(document).ready(function() {  
        var baseUrl = "{{ env('APP_URL_WEB') }}";
        $("#jabatan_select,#jabatan_select_edit").select2({
            width: '95%',
                ajax: {
                    delay: 500,
                    url: baseUrl + 'jabatan/select',
                    dataType: 'json',
                    processResults: function(data) {
                        
                        var remappedData = $.map(data.data, function(dt) {
                            return {
                                id: dt.id_jabatan,
                                text: dt.nama_jabatan
                            }
                        });
                        remappedData.unshift({
                          
                        });
                        return {
                            results: remappedData
                        };
                    }
                }
            });



    });
    </script>
@endsection
@section('js')
    <script src="{{ url('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

<script>
    var url = new URL(location.href);
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);


    var pageParam = urlParams.get('page');




    if (pageParam == null) {
        pageParam = "";
    }


    function deleteData(id) {
        // console.log("{{ URL::to('hospital/patient/delete/') }}/"+id);
        if (confirm('Apakah kamu yakin ingin menghapus data? ')) {

            showLoadingDialog()
            $.get("{{ URL::to('karyawan/delete/') }}/" + id)
                .done(function(response) {
                    let res = JSON.parse(response);
                    if (res.code == 200 || res.code == "200") {
                        dismissLoadingDialog();
                        showDialogSuccessCallout("Success", "Data berhasil dihapus", function() {
                            window.location.href = "{{ URL::to('karyawan') }}";
                        });
                    } else {
                        showDialogWarningCallout("Gagal", res.message)
                    }
                })
                .fail(function(err) {
                    let res = JSON.parse(err);
                    dismissLoadingDialog();
                    showDialogWarningCallout("Gagal", res.message)
                })
                .always(function() {
                    dismissLoadingDialog();
                });

        } else {
            // Do nothing!

        }


    }
</script>
