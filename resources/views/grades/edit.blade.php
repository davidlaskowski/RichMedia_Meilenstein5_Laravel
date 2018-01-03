@extends('layouts.main')

@section('content')
{!! Form::model($grade, array('url' => array('grades/edit', $grade->id))) !!}
    <h2 class="form-signup-heading">Note anpassen</h2>
    <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
        {!! Form::label('course_id', 'Kurs') !!}

            {!! Form::select('course_id', $courseArray, null, array('class'=>'form-control')) !!}

            @if ($errors->has('course_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('course_id') }}</strong>
                </span>
            @endif
        
    </div>

    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
        {!! Form::label('user_id', 'User') !!}

            {!! Form::select('user_id', $userArray, null, array('class'=>'form-control')) !!}

            @if ($errors->has('user_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('user_id') }}</strong>
                </span>
            @endif
        
    </div>
 
    <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
        {!! Form::label('grade', 'Note') !!}

            {!! Form::select('grade', $gradeArray, null, array('class'=>'form-control', 'placeholder'=>'Note')) !!}

            @if ($errors->has('grade'))
                <span class="help-block">
                    <strong>{{ $errors->first('grade') }}</strong>
                </span>
            @endif
        
    </div>
    <br/>
    {!! Form::submit('Ändern', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
<br/>
{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop
