@extends('layouts.app')
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
                    <h3 class="box-title">Data Level</h3>
                </div>

                <div class="box-body">

                    <div class="col-xs-4">
                        <a href="#" data-toggle="modal" data-target="#modal-create-level" class="btn btn-success">Add</a>
                    </div>
                    {{-- <div class="row"> --}}
                    <div class="col-sm-12">

                        <div class="box-body">
                            <table class="table table-bordered" id="table-list" name="table-list">
                                <tr>
                                    <th style="width: 10px">#</th>
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
                                            <td class="pd-name">{{ $entry->id_level }}</td>
                                            <td class="pd-level">{{ $entry->nama_level }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                    onclick="deleteData({{ $entry->id_level }})">Hapus</a>
                                                {{-- <a class="btn btn-xs btn-success">Edit</a> --}}
                                                <a href="" class="btnSelect" name="btnSelect" data-toggle="modal"
                                                    data-target="#modal-edit-level">
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
    <div class="modal fade" id="modal-create-level">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Level</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('level') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">



                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama Level</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama_level" id="nama_level"
                                            placeholder="Input Level" required />
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
    <div class="modal fade" id="modal-edit-level">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Level</h4>
                </div>
                <form role="form" method="post" action="{{ URL::to('level/edit') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">



                                <div class="form-group">
                                    <label class="col-xs-4 col-md-2 control-label"></i>Nama Level</label>
                                    <div class="col-xs-6 col-md-9 input-group">
                                        <input type="text" class="form-control " name="nama_level_show"
                                            id="nama_level_show" placeholder="Input Level" required />
                                            <input type="hidden" class="form-control " name="id_level_show"
                                            id="id_level_show" placeholder="Input Level" required />
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
            var col2 = currentRow.find(".pd-name").html();
            var col3 = currentRow.find(".pd-level").html();
            $("#nama_level_show").val(col3);
            $("#id_level_show").val(col2);



        });
    </script>
@endsection
@section('js')
    <script src="{{ url('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
            $.get("{{ URL::to('level/delete/') }}/" + id)
                .done(function(response) {
                    let res = JSON.parse(response);
                    if (res.code == 200 || res.code == "200") {
                        dismissLoadingDialog();
                        showDialogSuccessCallout("Success", "Data berhasil dihapus", function() {
                            window.location.href = "{{ URL::to('level') }}";
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
