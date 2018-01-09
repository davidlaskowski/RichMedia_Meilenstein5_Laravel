@extends('layouts.main')

@section('footer')
<h1>FOOTER!!!</h1>
@stop

@section('content')


<h2>Noten</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Note</th>
				<th>Vorname</th>
				<th>Nachname</th>
				<th>Kurs</th>
				<th width="40%">Bearbeiten</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grades as $grade)
			<tr>
				<td>{!! $grade->grade !!}</td>
				<td>{!! $grade->user->firstname !!}</td>
				<td>{!! $grade->user->lastname !!}</td>
				<td>@if($grade->course) {!! $grade->course->title !!} @endif</td>

				<td><div class="btn-group">{!! Html::link('/grades/show/'.$grade->id, 'Ansehen', array('class'=>'btn btn-default')) !!}{!! Html::link('/grades/edit/'.$grade->id, 'Bearbeiten', array('class'=>'btn btn-default')) !!}{!! Html::link('/grades/delete/'.$grade->id, 'Löschen', array('class'=>'btn btn-default', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!! $grades->render() !!}
<br/>
{!! Html::link('grades/new', 'Hinzufügen', array('class' => 'btn btn-default'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop