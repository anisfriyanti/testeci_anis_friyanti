<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="icon" id="logo" type="image/x-icon">
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('adminlte/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('adminlte/dist/css/skins/_all-skins.min.css') }}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/morris.js/morris.css') }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet"
            href="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet"
            href="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet"
            href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <!-- add -->
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ url('adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
        <link rel="stylesheet"
            href="{{ url('adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
        <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"
            type="text/css" />
        <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Google Font -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .products-list .product-description-full-text {
                display: block;
                color: #999;
                word-wrap: break-word;
                overflow: hidden;
                white-space: normal;
            }

            .btn-span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }

            .img {
                color: #95a5a6;
                font-size: 12px;
                position: relative;
            }

            .img:before {
                background: #f1f1f1;
                content: ' Not Found ';
                border: 1px solid #ccc;
                display: block;
                left: 0;
                padding: 10px;
                position: absolute;
                top: -10px;
                width: 100%;
            }

            #signature-pad {
                min-height: 250px;
                border: 1px solid #5bc0de;
            }

            #signature-pad canvas {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%
            }

            .h4-right {
                text-align: right;
            }
        </style>
        @yield('css')
        <style>
            .select2-container--default.select2-container--focus,
            .select2-selection.select2-container--focus,
            .select2-container--default:focus,
            .select2-selection:focus,
            .select2-container--default:active,
            .select2-selection:active {
                outline: none
            }

            .select2-container--default .select2-selection--single,
            .select2-selection .select2-selection--single {
                border: 1px solid #d2d6de;
                border-radius: 0;
                padding: 6px 12px;
                height: 34px
            }

            .select2-container--default.select2-container--open {
                border-color: #3c8dbc
            }

            .select2-dropdown {
                border: 1px solid #d2d6de;
                border-radius: 0
            }

            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #3c8dbc;
                color: white
            }

            .select2-results__option {
                padding: 6px 12px;
                user-select: none;
                -webkit-user-select: none
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                padding-left: 0;
                padding-right: 0;
                height: auto;
                margin-top: -4px
            }

            .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
                padding-right: 6px;
                padding-left: 20px
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 28px;
                right: 3px
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow b {
                margin-top: 0
            }

            .select2-dropdown .select2-search__field,
            .select2-search--inline .select2-search__field {
                border: 1px solid #d2d6de
            }

            .select2-dropdown .select2-search__field:focus,
            .select2-search--inline .select2-search__field:focus {
                outline: none
            }

            .select2-container--default.select2-container--focus .select2-selection--multiple,
            .select2-container--default .select2-search--dropdown .select2-search__field {
                border-color: #3c8dbc !important
            }

            .select2-container--default .select2-results__option[aria-disabled=true] {
                color: #999
            }

            .select2-container--default .select2-results__option[aria-selected=true] {
                background-color: #ddd
            }

            .select2-container--default .select2-results__option[aria-selected=true],
            .select2-container--default .select2-results__option[aria-selected=true]:hover {
                color: #444
            }

            .select2-container--default .select2-selection--multiple {
                border: 1px solid #d2d6de;
                border-radius: 0
            }

            .select2-container--default .select2-selection--multiple:focus {
                border-color: #3c8dbc
            }

            .select2-container--default.select2-container--focus .select2-selection--multiple {
                border-color: #d2d6de
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #3c8dbc;
                border-color: #367fa9;
                padding: 1px 10px;
                color: #fff
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                margin-right: 5px;
                color: rgba(255, 255, 255, 0.7)
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
                color: #fff
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                padding-right: 10px
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="modal fade" id="modal-default" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Loading . . .</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <i class="fa fa-refresh fa-spin fa-5x"></i>
                                    </div>
                                    <div class="col-xs-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-warning" style="display: none;">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="callout callout-danger">
                                <h4 id="modal-warning-callout-title"></h4>
                                <p id="modal-warning-callout-message"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-success" style="display: none;">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="callout callout-success">
                                <h4 id="modal-success-callout-title"></h4>
                                <p id="modal-success-callout-message"></p>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        <!-- ./wrapper -->

        <script>
            $.widget.bridge('uibutton', $.ui.button);

            function showLoadingDialog() {
                $('#modal-default').modal({
                    backdrop: false,
                    keyboard: false,
                    show: true
                });
            }

            function dismissLoadingDialog() {
                $('#modal-default').modal('hide');
                $('#modal-default').data('bs.modal', null);
            }

            function showDialogWarningCallout(title, message) {
                $('#modal-warning').modal({
                    backdrop: false,
                    keyboard: false,
                    show: true
                });
                $('#modal-warning-callout-title').text(title);
                $('#modal-warning-callout-message').text(message);
                setTimeout(function() {
                    dismissDialogWarningCallout();
                }, (3 * 1000));
            }

            function dismissDialogWarningCallout() {
                $('#modal-warning').modal('hide');
                $('#modal-warning').data('bs.modal', null);
            }

            function showDialogSuccessCallout(title, message, redirectTo) {
                $('#modal-success').modal({
                    backdrop: false,
                    keyboard: false,
                    show: true
                });
                $('#modal-success-callout-title').text(title);
                $('#modal-success-callout-message').text(message);
                setTimeout(function() {
                    redirectTo();
                }, (2 * 1000));

            }

            function isNullOrEmpty(value) {
                return (
                    // null or undefined
                    (value == null) ||

                    // has length and it's zero
                    (value.hasOwnProperty('length') && value.length === 0) ||

                    // is an Object and has no keys
                    (value.constructor === Object && Object.keys(value).length === 0)
                )
            }
        </script>

        <!-- Bootstrap 3.3.7 -->
        <script src="{{ url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- Slimscroll -->
        <script src="{{ url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ url('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>
        <!-- add -->
        @yield('js')
    </body>

</html>
