@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Test 2</h3>
                </div>

                <div class="box-body">
                    <div class="row">

                        <div class="col-xs-12"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form" method="post" action="{{ URL::to('currency') }}">
                                @csrf
                                <div class="box-body">


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Masukkan Nominal</label>
                                        <input type="number" class="form-control" name="money" id="money"
                                            placeholder="Masukkan Angka" required>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>


                        </div>
                        <div class="col-sm-12">



                            @if (isset($data->currency))
                                <ul class="products-list product-list-in-box">
                                    <p class="product-title">


                                        {{ $data->currency }} <strong> {{ $data->decimal }}</strong>
                                        <br>
                                    </p>
                                    <p class="product-title">
                                        Terbilang : <br>


                                    <p>


                                        <span class="product-description"> {{ $data->terbilang }}


                                        </span>


                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@section('js')
    <script src="{{ url('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection
