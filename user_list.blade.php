@extends('templates.baseTemplate')

@section('title')

@section('content')

@if(isset($deleted))
<p>L'utilisateur {{$deleted}} a été effacé avec succès!</p>
@endif

<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Statut</th>
	</tr>

@foreach($users as $user)
	<tr>
		<td>{{Html::linkRoute('user.show',$user->surname,['id'=>$user->id])}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->status}}</td>
		<td>{{Html::linkRoute('user.edit','Editer',['id'=>$user->id])}}
		@if($user->status != 2)
		<td>{{Form::open(['route'=>['user.destroy', $user->id],'method'=>'DELETE'])}}
				{{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
				{{Form::hidden('id', $user->id)}}
			{{Form::close()}}
		</td>
		@endif
		@if($user->status == 0)
			<td>
				{{Html::linkRoute('user.index','Valider',['id'=>$user->id])}}
			</td>
        @endif
	</tr>
@endforeach
@endsection
