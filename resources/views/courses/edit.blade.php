@extends('layouts.main')

@section('content')
{!! Form::model($course, array('url' => array('courses/edit', $course->id))) !!}
    <h2 class="form-signup-heading">Kurs bearbeiten</h2>

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
        {!! Form::label('title', 'Kurs') !!}

            {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Kurs')) !!}

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        
    </div>
    <br/>
    {!! Form::submit('Ändern', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop
