@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'users/new')) !!}
    <h2 class="form-signup-heading">Student hinzufügen</h2>
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        {!! Form::label('firstname', 'Vorname') !!}

            {!! Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Vorname')) !!}

            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        {!! Form::label('lastname', 'Nachname') !!}

            {!! Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Nachname')) !!}

            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {!! Form::label('birthdate', 'Geburtsdatum') !!}

            <div class="input-group date datetimepicker"  data-date-format="YYYY-MM-DD">
                {!! Form::text('birthdate', null, array('class'=>'form-control', 'placeholder'=>'Geburtsdatum')) !!}          
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>

            @if ($errors->has('birthdate'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'E-Mail') !!}

            {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'E-Mail')) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        {!! Form::label('username', 'Benutzername') !!}

            {!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Benutzername')) !!}

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Passwort') !!}

            {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Passwort')) !!}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', 'Passwort wiederholen') !!}

            {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Passwort wiederholen')) !!}

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        
    </div>
    <br/>
    {!! Form::submit('Speichern', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop