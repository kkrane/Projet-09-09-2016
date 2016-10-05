@extends('layouts.app')

@section('title')

@section('content')

@if(isset($deleted))
<p>L'utilisateur {{$deleted}} a été effacé avec succès!</p>
@endif

<button class="btn btn-primary pull-right">{!!Html::linkRoute('user.create','Ajouter un utilisateur')!!}</button>
<div class="col-md-8 col-md-offset-2">
    <table class="table">
    	<tr>
    		<th>Nom</th>
    		<th>Prénom</th>
    		<th>Statut</th>
    		<th></th>
    		<th></th>
    		<th></th>
    	</tr>    

    @foreach($users as $user)
    	<tr>
    		<td>{{{Html::linkRoute('user.show',$user->surname,['id'=>$user->id])}}}</td>
    		<td>{{$user->name}}</td>
    		<td>{{$user->status}}</td>
            <td><button class="btn btn-warning">{{Html::linkRoute('user.edit','Editer',['id'=>$user->id])}}</button></td>
    		<td>
    		@if($user->status != 2)
    		    {{Form::open(['route'=>['user.destroy', $user->id],'method'=>'DELETE'])}}
    				{{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
    				{{Form::hidden('id', $user->id)}}
    			{{Form::close()}}
    		@endif
    		</td>
            <td>
    		@if($user->status == 0)
                <button class="btn btn-success">
    				{{Html::linkRoute('user.validation','Valider',['id'=>$user->id])}}
                </button>
            @endif
            </td>
    	</tr>
    @endforeach
    </table>
</div>
@endsection


@section('js')
<script>
       $('.btn-danger').click(function(){
          return confirm('Etes vous sûr de vouloir effacer cet utilisateur?');
       });
</script>

@endsection