@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'semesters/new')) !!}
    <h2 class="form-signup-heading">Semester hinzufügen</h2>
     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title', 'Titel') !!}

            {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) !!}

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        
    </div>
      <div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
        {!! Form::label('startdate', 'Start') !!}

            <div class="input-group date datetimepicker"  data-date-format="YYYY-MM-DD">
                {!! Form::text('startdate', null, array('class'=>'form-control', 'placeholder'=>'Start')) !!}          
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>

            @if ($errors->has('startdate'))
                <span class="help-block">
                    <strong>{{ $errors->first('startdate') }}</strong>
                </span>
            @endif
        
    </div>

    <br/>
    {!! Form::submit('Speichern', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop