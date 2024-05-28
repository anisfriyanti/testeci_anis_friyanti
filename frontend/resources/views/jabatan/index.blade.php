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
                    <h3 class="box-title">Data Jabatan</h3>
                </div>

                <div class="box-body">

                    <div class="col-xs-4">
                        <a href="#" data-toggle="modal" data-target="#modal-create-jabatan" class="btn btn-success">Add</a>
                    </div>
                    {{-- <div class="row"> --}}
                    <div class="col-sm-12">

                        <div class="box-body">
                            <table class="table table-bordered" id="table-list" name="table-list">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>ID Jabatan</th>
                                    <th>Nama Jabatan</th>
                                    <th>ID Level</th>
                                    <th>Nama Level</th>
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
                                            <td class="pd_id_jabatan">{{$entry->id_jabatan}}</td>
                                            <td class="pd_nama_jabatan">{{$entry->nama_jabatan}}</td>
                                            <td class="pd_level">{{ $entry->id_level }}</td>
                                            <td >{{ $entry->nama_level }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                    onclick="deleteData({{ $entry->id_jabatan }})">Hapus</a>
                                                {{-- <a class="btn btn-xs btn-success">Edit</a> --}}
                                                <a href="" class="btnSelect" name="btnSelect" data-toggle="modal"
                                                    data-target="#modal-edit-jabatan">
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
    <div class="modal fade" id="modal-create-jabatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah jabatan</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('jabatan') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">



                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama Jabatan</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama_jabatan" id="nama_jabatan"
                                            placeholder="Input jabatan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4 col-md-2">Pilih Level</label>
                                    <div class="col-xs-6 col-md-9 input-group">

                                    <select class="form-control" name="level_select" id="level_select" required>
                                                <!-- <option value="all">Semua Kabupaten</option> -->
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
    <div class="modal fade" id="modal-edit-jabatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit jabatan</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('jabatan/edit') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">



                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama jabatan</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama_jabatan_show"
                                            id="nama_jabatan_show" placeholder="Input jabatan" required />
                                            <input type="hidden" class="form-control " name="id_jabatan_show"
                                            id="id_jabatan_show" placeholder="Input jabatan" required />
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4 col-md-2"> Level</label>
                                    <div class="col-xs-6 col-md-9 input-group">

                                    <select class="form-control" name="level_select_edit" id="level_select_edit" required>
                                              
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
            var col2 = currentRow.find(".pd_id_jabatan").html();
            var col3 = currentRow.find(".pd_nama_jabatan").html();
            var col4 =currentRow.find(".pd_level").html();
            var baseUrl = "{{ env('APP_URL_WEB') }}";

        $("#level_select_edit").select2({

            width: '95%',
                ajax: {
                    delay: 500,
                    url: baseUrl + 'level/select',
                    dataType: 'json',
                    processResults: function(data) {
                        document.getElementById("level_select_edit").selectedIndex=col4;
                        var remappedData = $.map(data.data, function(dt) {
                            // $("#level_select_edit").val(col4);
                            return {
                                id: dt.id_level,
                                text: dt.nama_level
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

         
            $("#nama_jabatan_show").val(col3);
            $("#id_jabatan_show").val(col2);
           
            
           
           




        });
        $(document).ready(function() {  
        var baseUrl = "{{ env('APP_URL_WEB') }}";
        $("#level_select").select2({
            width: '95%',
                ajax: {
                    delay: 500,
                    url: baseUrl + 'level/select',
                    dataType: 'json',
                    processResults: function(data) {
                        
                        var remappedData = $.map(data.data, function(dt) {
                            return {
                                id: dt.id_level,
                                text: dt.nama_level
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
      
        if (confirm('Apakah kamu yakin ingin menghapus data? ')) {

            showLoadingDialog()
            $.get("{{ URL::to('jabatan/delete/') }}/" + id)
                .done(function(response) {
                    let res = JSON.parse(response);
                    if (res.code == 200 || res.code == "200") {
                        dismissLoadingDialog();
                        showDialogSuccessCallout("Success", "Data berhasil dihapus", function() {
                            window.location.href = "{{ URL::to('jabatan') }}";
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
