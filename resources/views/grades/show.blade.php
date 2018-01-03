@extends('layouts.main')

@section('content')
    <h2 class="heading">Note</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Note</td>
                    <td>{!! $grade->grade !!}</td>
                </tr>
                <tr>
                    <td>User</td>
                    <td>{!! $grade->user->firstname !!} {!! $grade->user->lastname !!}</td>
                </tr>
                <tr>
                    <td>Kurs</td>
                    <td>{!! $grade->course->title !!}</td>
                </tr>
            </tbody>
        </table>
    </div>

    
    






























    

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"')) !!}
@stop
