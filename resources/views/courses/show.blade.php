@extends('layouts.main')

@section('content')
    <h2 class="heading">Kurs</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Titel</td>
                    <td>{!! $course->title !!}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{!! $course->semester->title !!}</td>
                </tr>
            </tbody>
        </table>
    </div>

    
    






























    

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"')) !!}
@stop
