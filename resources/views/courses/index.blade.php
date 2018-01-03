@extends('layouts.main')

@section('footer')
<h1>FOOTER!!!</h1>
@stop

@section('content')


<h2>Kurse</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Titel</th>
				<th>Semester</th>
				<th width="40%">Bearbeiten</th>
			</tr>
		</thead>
		<tbody>
			@foreach($courses as $course)
			<tr>
				<td>{!! $course->title !!}</td>
				<td>{!! $course->semester->title !!}</td>
				<td><div class="btn-group">{!! Html::link('/courses/show/'.$course->id, 'Ansehen', array('class'=>'btn btn-default')) !!}{!! Html::link('/courses/edit/'.$course->id, 'Bearbeiten', array('class'=>'btn btn-default')) !!}{!! Html::link('/courses/delete/'.$course->id, 'Löschen', array('class'=>'btn btn-default', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!! $courses->render() !!}
<br/>
{!! Html::link('courses/new', 'Hinzufügen', array('class' => 'btn btn-default'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop