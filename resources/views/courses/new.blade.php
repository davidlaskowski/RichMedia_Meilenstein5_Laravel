@extends('layouts.main')

@section('content')
{!! Form::open(array('url'=>'courses/new')) !!}
    <h2 class="form-signup-heading">Kurs hinzufügen</h2>
    <div class="form-group{{ $errors->has('semester_id') ? ' has-error' : '' }}">
        {!! Form::label('semester_id', 'Semester') !!}

            {!! Form::select('semester_id', $semesterArray, null, array('class'=>'form-control')) !!}

            @if ($errors->has('semester_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('semester_id') }}</strong>
                </span>
            @endif
        
    </div>
     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title', 'Titel') !!}

            {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) !!}

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        
    </div>

    <br/>
    {!! Form::submit('Speichern', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop