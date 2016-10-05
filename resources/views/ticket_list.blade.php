@extends('layouts.app')

@section('title')

@section('content')


<div class="col-md-8 col-md-offset-2">
    <table class="table">
    	<tr>
    		<th>ID</th>
    		<th>Utilisateur</th>
    		<th>Message</th>
    		<th>Vu</th>
    		<th></th>
    		<th></th>
    	</tr>    

    @foreach($tickets as $ticket)
    	<tr>
    		<td>{{{Html::linkRoute('ticket.show',$ticket->id,['id'=>$ticket->id])}}}</td>
    		<td>{{$ticket->user->name}} {{$ticket->user->surname}}</td>
            <td>{{substr($ticket->message,0,100)}}</td>
    		<td>{{$ticket->seen}}</td>
    		<td>
    		    {{Form::open(['route'=>['ticket.destroy', $ticket->id],'method'=>'DELETE'])}}
    				{{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
    				{{Form::hidden('id', $ticket->id)}}
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
          return confirm('Etes vous sûr de vouloir effacer ce ticket?');
       });
</script>

@endsection