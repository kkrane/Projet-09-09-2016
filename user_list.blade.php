@extends('templates.baseTemplate')

@section('title', 'Liste d'utilisateurs)

@section('content')


<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Statut</th>
	</tr>

@foreach($user as $each_user)
	<tr>
		<td>{{HTML::linkRoute('user.show','$each_user->surname',['id'->$each_user->id]);}}</td>
		<td>{{$each_user->name}}</td>
		<td>{{$each_user->status}</td>
		<td>{{HTML::linkRoute('user.edit','Editer',['id'->$each_user->id]);}}
		<td>{{Form::open(['route'=>'user.destroy','method'=>'delete'])}}
				{{Form::submit('Supprimer')}}
				{{Form::hidden('id',$each_user->id)}}
			{{Form::close()}}
		</td>
		@if($each_user->status == 0)
			<td>
				{{HTML::linkRoute('user.validate','Valider',['id'->$each_user->id]);}}
			</td>
	</tr>
@endsection