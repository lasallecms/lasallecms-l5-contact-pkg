<!doctype html>
<html lang="en">

<head>
    @section('meta')
        @include('layouts.header_meta')
    @show


    @section('styles')
        @include('layouts.header_css')
    @show


    <!-- Custom styles for this form -->
    <link media="all" type="text/css" rel="stylesheet" href="{{{ Config::get('app.url') }}}/packages/lasallecmscontact/contact-step-two.css" >


</head>

<body id="page-top">




<div class="container">

    <div id="loginbox" style="margin-top:200px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title" style="text-align: center;font-weight:bolder;font-size:140%;">{{{ Config::get('lasallecmsfrontend.site_name') }}}<br /> Contact Security Step</div>
            </div>


            @if ($message)
                <br /><br />
                <div style="margin-left:10px;" class="btn btn-outline-dark">
                    {{{ $message }}}
                </div>
            @endif

            {!! Form::open(['route' => 'contact-processing.send', 'class' => 'form form-inline' ]) !!}


            {!! Form::hidden('name',     $input['name']) !!}
            {!! Form::hidden('email',    $input['email']) !!}
            {!! Form::hidden('comment',  $input['comment']) !!}
            {!! Form::hidden('to_email', $input['to_email']) !!}
            {!! Form::hidden('to_name',  $input['to_name']) !!}


            <div style="margin-bottom: 25px; margin-left: 25px; margin-top: 25px;" class="input-group">
                <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                {!! Form::input('text', 'security-code', null,['class' => 'form-control', 'required' => 'required', 'placeholder' => '']) !!}

            </div>

            <br />




            <div style="margin-bottom: 25px; margin-left: 25px;" class="input-group">
                Please enter this security code in the box above:
            </div>
            <div style="text-align:center; font-size:150%;">
                realhuman
            </div>
            <br /><br />



            <div style="text-align: center;">
                {!! Form::submit('Go!', ['class' => 'btn btn-outline-dark'] ) !!}
            </div>
            <br /><br />



            {!! Form::close() !!}


        </div>

    </div>

</div>







</body>

</html>