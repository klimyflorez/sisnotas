@extends('layouts.admin.app')

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">@lang('sidebar_navigation.link.dashboard')</h3>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 id="title-name" class="m-b-0 float-left">Nombres Completo</h4>
                        <br>
                        <p id="full-name"></p>
                        <br>
                        <h5 id="title-letter">Letra más utilizada</h5>
                        <p id="letter"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'https://randomuser.me/api/?results=5',
                dataType: 'json',
                error: function (data) {
                    console.log(data);
                    $('#title-name').text('Error API: '+data.responseText);
                    $('#title-letter').css('display', 'none');
                },
                success: function(data) {

                    (data.results).forEach(element=>{
                        console.log("Nombres Completo: ",element.name.first+' '+element.name.last);
                        $('#full-name').append(element.name.first+' '+element.name.last+'<br>')

                    });
                }
            });
        });
    </script>
@endsection
