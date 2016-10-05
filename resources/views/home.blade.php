@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if($user->status == 2)
                        <div class="adminButtons">
                            <a href="user"><div class="col-xs-4 adminButton blue"><span class="fa fa-user"> {{$nbUser}} Utilisateurs</span></div></a>
                            <a href="spot"><div class="col-xs-4 adminButton yellow"><span class="fa fa-car"> {{$nbSpot}} Places</span></div></a>
                            <a href="attribtuion"><div class="col-xs-4 adminButton red"><span class="fa fa-user"> {{$nbAttribution}} Attributions</span></div></a>
                            
                            <h1>Liste d'attente des utilisateurs</h1>
                            <table class="table table-bordered">
                            	<th>Nom</th>
                            	<th>Place</th>
                            	@foreach($lists as $list)
                            	<tr>
                            		<td>{{$list->name}}</td>
                            		<td>{{$list->list}}</td>
                            	</tr>
                            	@endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
