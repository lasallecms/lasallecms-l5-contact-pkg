{{-- START CONTACT FORM --}}

{{-- THIS IS THE FORM ITSELF! --}}


{!! Form::open(['route' => 'contact-processing.step-two', 'class' => 'form form-inline' ]) !!}


<div style="margin-bottom: 25px; margin-left: 25px; margin-top: 25px;" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input class="form-control" type="text" name="name" required placeholder=" name" style="font-size:150%">


    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
</div>
<br />




<div style="margin-bottom: 25px; margin-left: 25px;" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input class="form-control" type="email" name="email" required placeholder=" email" style="font-size:150%">
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>
<br />


<div style="margin-bottom: 25px; margin-left: 25px;" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
    {!! Form::textarea('comment', null, ['size' => '30x3', 'class' => 'form-control', 'style' => 'font-size: 150%', 'required' => 'required', 'placeholder' => 'message']) !!}
    {!! $errors->first('comment', '<span class="help-block">:message</span>') !!}
</div>
<br />


<div style="margin-bottom: 25px; margin-left: 25px;" >
    {!! Form::submit('Contact!', ['class' => 'btn btn-outline-dark'] ) !!}
</div>
<br /><br />

{!! Form::close() !!}


{{-- END: CONTACT FORM --}}



