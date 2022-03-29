<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- App Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

      
            <!-- Gritter -->
            <link href="{{asset('public/backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


        <!--Dashboard-->
        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

      


    </head>
    <body>

         @yield('admin_dashboard_content')




        <!--App Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

        <!-- Mainly scripts -->
        <script src="{{asset('public/backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('public/backend/js/popper.min.js')}}"></script>
        <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/chosen/chosen.jquery.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/flot/curvedLines.js')}}"></script>

        <script src="{{asset('public/backend/js/plugins/dataTables/datatables.min.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Peity -->
        <script src="{{asset('public/backend/js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('public/backend/js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('public/backend/js/inspinia.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/pace/pace.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{asset('public/backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{asset('public/backend/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Jvectormap -->
        <script src="{{asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('public/backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{asset('public/backend/js/demo/sparkline-demo.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('public/backend/js/plugins/chartJs/Chart.min.js')}}"></script>
        
        <!-- iCheck -->
        <script src="{{asset('public/backend/js/plugins/iCheck/icheck.min.js')}}"></script>
         
        <!-- sweetalert -->
        <script src="{{asset('public/backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        
        <!-- toastr -->
        <script src="{{asset('public/backend/js/plugins/toastr/toastr.min.js')}}"></script>
        {!! Toastr::message() !!}

        <script>
            $(document).ready(function() {

                var lineData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(26,179,148,0.5)",
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "Example dataset",
                            backgroundColor: "rgba(220,220,220,0.5)",
                            borderColor: "rgba(220,220,220,1)",
                            pointBackgroundColor: "rgba(220,220,220,1)",
                            pointBorderColor: "#fff",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        }
                    ]
                };

                var lineOptions = {
                    responsive: true
                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            });
        </script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

        <!-- Sidebar Menu Active Script -->
        <script>
            $(function(){
                var current = location.pathname;

                $('ul.metismenu li a').each(function(){
                    if($(this).attr('href').indexOf(current) !== -1){
                        $(this).closest('li').addClass('active');
                    }
                });

                $('ul.metismenu .nav-second-level a').each(function(){
                    console.log($(this).attr('href').indexOf(current));
                    if($(this).attr('href').indexOf(current) !== -1)  {
                        $(this).parent().parent().closest('li').addClass('active');
                        $(this).closest('ul').addClass('in');
                    }
                });
            });
        </script>

        <!-- Cusrtom File Input Select Script -->
        <script>
            $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }); 
        </script>
        

        <!-- Delete Data Scripts -->
        <script>
            $('.delete').on('click', function(){

                let form_id = $(this).data('form-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, this will be deleted permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+form_id).submit();
                        swal("File has been deleted!", {
                        icon: "success",
                        });

                    } else {
                        swal("File is safe!");
                    }
                }); 

            });

        </script>
       
       <!-- Active Inactive Scripts -->
        <script>
            $(function(){
                $("[type=checkbox]").change(function() {
                if(this.checked) {
                    window.location = this.value;
                }
            });
            });

            $(function(){
                $("[type=checkbox]").change(function() {
                if(this.checked == false) {
                    window.location = this.value;
                }
            });
            });
        </script>
    </body>
</html>
