@extends('layouts.app')

@section('title')

@section('content')

<button class="btn btn-primary pull-right">{{Html::linkAction('AttributionController@myCreate','Ajouter une attribution')}}</button>
<div class="col-md-8 col-md-offset-2">
    <table class="table">
    	<tr>
    		<th>Id</th>
    		<th>Utilisateur</th>
    		<th>Place</th>
    		<th></th>
    		<th></th>
    	</tr>    

    @foreach($attributions as $attribution)
    	<tr>
    		<td>{{{Html::linkRoute('attribution.show',$attribution->id,['id'=>$attribution->id])}}}</td>
    		<td>{{$attribution->user->email}}</td>
    		<td>{{$attribution->spot->num}}</td>
            <td><button class="btn btn-warning">{{Html::linkAction('AttributionController@adminEdit','Editer',['id'=>$attribution->id])}}</button></td>
    		<td>
    		    {{Form::open(['route'=>['attribution.destroy', $attribution->id],'method'=>'DELETE'])}}
    				{{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
    				{{Form::hidden('id', $attribution->id)}}
    			{{Form::close()}}
    		</td>
    	</tr>
    @endforeach
    </table>
</div>
@endsection


@section('js')
<script>
       $('.btn-danger').click(function(){
          return confirm('Etes vous sûr de vouloir effacer cet attribution ?');
       });
</script>

@endsection