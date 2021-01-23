@extends('admin.layouts.master')
@section('title','Students Profile Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Students due list
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/daterangepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-colorpicker.min.css') }}" />
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
                </div>
                {{-- @include('admin.layouts.includes.msg') --}}
                <div class="widget-body">
                    <div class="widget-main">
                        <!-- div.dataTables_borderWrap -->
                        <div class="hr hr-18 dotted hr-double"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">
                                                <label class="pos-rel">
                                                    <span class="lbl">Sl</span>
                                                </label>
                                            </th>
                                            <th>Student Name</th>
                                            <th>Student Id</th>
                                            <th>Due Amount</th>
                                            <th>Payable Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <span class="lbl">#</span>
                                                </label>
                                            </td>
                                            <td>
                                                 Abid Hossain
                                            </td>
                                            <td class="hidden-480">4829487</td>
                                            <td>
                                                <span class="label label-sm label-danger">3000</span>
                                            </td>
                                            <td class="hidden-480">
                                                <span class="label label-sm label-primary">7000</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            @section('js')
                <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/jquery-ui.custom.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/chosen.jquery.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/spinbox.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/bootstrap-datepicker.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/bootstrap-timepicker.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/bootstrap-colorpicker.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/jquery.knob.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/autosize.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/jquery.inputlimiter.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/jquery.maskedinput.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/bootstrap-tag.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/ace-elements.min.js') }}"></script>
                <script src="{{ asset('admin/assets/js/ace.min.js') }}"></script>
                <!-- Side Bar -->
                <!-- page specific plugin scripts -->
                <script src="{{asset('admin/')}}/assets/js/jquery.dataTables.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/jquery.dataTables.bootstrap.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/dataTables.buttons.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/buttons.flash.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/buttons.html5.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/buttons.print.min.js"></script>
                <script src="{{asset('admin/')}}/assets/js/buttons.colVis.min.js"></script>
                <script src="{{asset('admin   /')}}/assets/js/dataTables.select.min.js"></script>
                <script type="text/javascript">
                    jQuery(function($) {
                        $('.input-daterange').datepicker({autoclose:true});
                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                        $('input[name=date-range-picker]').daterangepicker({
                            'applyClass' : 'btn-sm btn-success',
                            'cancelClass' : 'btn-sm btn-default',
                            locale: {
                                applyLabel: 'Apply',
                                cancelLabel: 'Cancel'
                            }
                        })
                            .prev().on(ace.click_event, function(){
                            $(this).next().focus();
                        });

                    })
                </script>
                <!--datepicker plugin-->
                <script type="text/javascript">
                    jQuery(function($) {

                        $('.date-picker').datepicker({
                            autoclose: true,
                            format:'yyyy-mm-dd',
                            todayHighlight: true
                        })
                            //show datepicker when clicking on the icon
                            .next().on(ace.click_event, function(){
                            $(this).prev().focus();
                        });

                    })
                </script>
                <!-- inline scripts related to this page -->
                <script type="text/javascript">
                    jQuery(function($) {
                        //initiate dataTables plugin
                        var myTable =
                            $('#dynamic-table')
                                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                .DataTable( {
                                    bAutoWidth: false,
                                    "aoColumns": [
                                        { "bSortable": false },
                                        null, null,null, null, null,
                                        { "bSortable": false }
                                    ],
                                    "aaSorting": [],


                                    //"bProcessing": true,
                                    //"bServerSide": true,
                                    //"sAjaxSource": "http://127.0.0.1/table.php"	,

                                    //,
                                    //"sScrollY": "200px",
                                    //"bPaginate": false,

                                    //"sScrollX": "100%",
                                    //"sScrollXInner": "120%",
                                    //"bScrollCollapse": true,
                                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                    //"iDisplayLength": 50


                                    select: {
                                        style: 'multi'
                                    }
                                } );



                        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                        new $.fn.dataTable.Buttons( myTable, {
                            buttons: [
                                {
                                    "extend": "colvis",
                                    "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                                    "className": "btn btn-white btn-primary btn-bold",
                                    columns: ':not(:first):not(:last)'
                                },
                                {
                                    "extend": "copy",
                                    "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                                    "className": "btn btn-white btn-primary btn-bold"
                                },
                                {
                                    "extend": "csv",
                                    "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                                    "className": "btn btn-white btn-primary btn-bold"
                                },
                                {
                                    "extend": "excel",
                                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                                    "className": "btn btn-white btn-primary btn-bold"
                                },
                                {
                                    "extend": "pdf",
                                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                                    "className": "btn btn-white btn-primary btn-bold"
                                },
                                {
                                    "extend": "print",
                                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                                    "className": "btn btn-white btn-primary btn-bold",
                                    autoPrint: false,
                                    message: 'This print was produced using the Print button for DataTables'
                                }
                            ]
                        } );
                        myTable.buttons().container().appendTo( $('.tableTools-container') );

                        //style the message box
                        var defaultCopyAction = myTable.button(1).action();
                        myTable.button(1).action(function (e, dt, button, config) {
                            defaultCopyAction(e, dt, button, config);
                            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                        });


                        var defaultColvisAction = myTable.button(0).action();
                        myTable.button(0).action(function (e, dt, button, config) {

                            defaultColvisAction(e, dt, button, config);


                            if($('.dt-button-collection > .dropdown-menu').length == 0) {
                                $('.dt-button-collection')
                                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                    .find('a').attr('href', '#').wrap("<li />")
                            }
                            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                        });

                        ////

                        setTimeout(function() {
                            $($('.tableTools-container')).find('a.dt-button').each(function() {
                                var div = $(this).find(' > div').first();
                                if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                                else $(this).tooltip({container: 'body', title: $(this).text()});
                            });
                        }, 500);





                        myTable.on( 'select', function ( e, dt, type, index ) {
                            if ( type === 'row' ) {
                                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
                            }
                        } );
                        myTable.on( 'deselect', function ( e, dt, type, index ) {
                            if ( type === 'row' ) {
                                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
                            }
                        } );




                        /////////////////////////////////
                        //table checkboxes
                        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                        //select/deselect all rows according to table header checkbox
                        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                            var th_checked = this.checked;//checkbox inside "TH" table header

                            $('#dynamic-table').find('tbody > tr').each(function(){
                                var row = this;
                                if(th_checked) myTable.row(row).select();
                                else  myTable.row(row).deselect();
                            });
                        });

                        //select/deselect a row when the checkbox is checked/unchecked
                        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                            var row = $(this).closest('tr').get(0);
                            if(this.checked) myTable.row(row).deselect();
                            else myTable.row(row).select();
                        });



                        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                            e.stopImmediatePropagation();
                            e.stopPropagation();
                            e.preventDefault();
                        });



                        //And for the first simple table, which doesn't have TableTools or dataTables
                        //select/deselect all rows according to table header checkbox
                        var active_class = 'active';
                        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                            var th_checked = this.checked;//checkbox inside "TH" table header

                            $(this).closest('table').find('tbody > tr').each(function(){
                                var row = this;
                                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                            });
                        });

                        //select/deselect a row when the checkbox is checked/unchecked
                        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                            var $row = $(this).closest('tr');
                            if($row.is('.detail-row ')) return;
                            if(this.checked) $row.addClass(active_class);
                            else $row.removeClass(active_class);
                        });



                        /********************************/
                        //add tooltip for small view action buttons in dropdown menu
                        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                        //tooltip placement on right or left
                        function tooltip_placement(context, source) {
                            var $source = $(source);
                            var $parent = $source.closest('table')
                            var off1 = $parent.offset();
                            var w1 = $parent.width();

                            var off2 = $source.offset();
                            //var w2 = $source.width();

                            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                            return 'left';
                        }




                        /***************/
                        $('.show-details-btn').on('click', function(e) {
                            e.preventDefault();
                            $(this).closest('tr').next().toggleClass('open');
                            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                        });
                        /***************/





                        /**
                         //add horizontal scrollbars to a simple table
                         $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                         {
   horizontal: true,
   styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
   size: 2000,
   mouseWheelLock: true
   }
                         ).css('padding-top', '12px');
                         */


                    })
                </script>
@stop