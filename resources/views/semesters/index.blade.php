@extends('layouts.main')

@section('footer')
	<h1>FOOTER!!!</h1>
@stop

@section('content')


    <h2>Semester</h2>
    <div class="table-responsive">
	    <table class="table table-striped table-hover">
	    	<thead>
	    		<tr>
		    		<th>Titel</th>
		    		<th>Start</th>
		    		<th width="40%">Bearbeiten</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    @foreach($semesters as $semester)
		    	<tr>
		        	<td>{!! $semester->title !!}</td>
		        	<td>{{ date('d.m.Y', strtotime($semester->startdate)) }}</td>
		        	<td><div class="btn-group">{!! Html::link('/semesters/show/'.$semester->id, 'Ansehen', array('class'=>'btn btn-default')) !!}{!! Html::link('/semesters/edit/'.$semester->id, 'Bearbeiten', array('class'=>'btn btn-default')) !!}{!! Html::link('/semesters/delete/'.$semester->id, 'Löschen', array('class'=>'btn btn-default', 'onClick'=>'return confirm(\'Wirklich löschen?\');')) !!}</div></td>
		        			        </tr>
	    @endforeach
	    	</tbody>
	   	</table>
	</div>
	{!! $semesters->render() !!}
	<br/>

{!! Html::link('semesters/new', 'Hinzufügen', array('class' => 'btn btn-default'))!!}
	{!! Html::link('#', 'Zurück', array('class' => 'btn btn-default', 'onClick="javascript:history.back();return false;"'))!!}
@stop