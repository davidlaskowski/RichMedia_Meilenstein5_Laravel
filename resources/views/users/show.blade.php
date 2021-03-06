@extends('layouts.main')

@section('content')
    <h2 class="heading">Student {{ $user->lastname}}, {{ $user->firstname }}</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{!! $user->lastname !!}</td>
                </tr>
                <tr>
                    <td>Vorname</td>
                    <td>{{ $user->firstname }}</td>
                </tr>
                <tr>
                    <td>Geburtsdatum</td>
                    <td>{{ date('d.m.Y', strtotime($user->birthdate)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2 class="heading">Noten</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                @foreach($user->grades as $grade)
                <tr>
                    <td>@if($grade->course){{ $grade->course->title }}@endif</td>
                    <td>{{ $grade->grade }}</td>
                </tr>
                @endforeach
                 <tr>
                    <td><strong>Durchschnitt</strong></td>
                    <td><strong>{{ $average }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"')) !!}
@stop
