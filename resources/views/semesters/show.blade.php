@extends('layouts.main')

@section('content')
    <h2 class="heading">Semester </h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{!! $semester->title !!}</td>
                </tr>
                <tr>
                    <td>Start</td>
                    <td>{{ date('d.m.Y', strtotime($semester->startdate)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    

    
    






























    

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"')) !!}
@stop
