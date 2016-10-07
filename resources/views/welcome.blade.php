@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    @if($status == 2)
                        <div class="adminButtons">
                            <a href="user"><div class="col-xs-3 adminButton blue"><span class="fa fa-user"> {{$nbUser}} Utilisateurs</span></div></a>
                            <a href="spot"><div class="col-xs-3 adminButton yellow"><span class="fa fa-car"> {{$nbSpot}} Places</span></div></a>
                            <a href="attribution"><div class="col-xs-3 adminButton red"><span class="fa fa-user"> {{$nbAttribution}} Attributions</span></div></a>
                            <a href="contact"><div class="col-xs-3 adminButton pink"><span class="fa fa-user"> {{$nbTicket}} Tickets</span></div></a>
                            
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

                <div class="panel-body">               
                @if($status == 0)
                    <div class="col-lg-12"> 
                    <h1>Vous n'êtes pas encore validé.</h1>
                    Si vous voulez vous pouvez contacter l'admin si le delai de validation est trop long
                    </br>
                    <a href=""><button type="button" class="btn btn-primary">Contacter l'admin</button></a>

                @else 
                    <div class="col-lg-6">    
                    <h1>Salut {{ $users->name }} !</h1>
                    </br>
                    @if($attributions != null)
                        <p>Votre place actuelle est la :</p> </br>
                        <nav class="navbar navbar-default col-lg-12"><h1><strong>n° {{ $attributions->spot->num}}</strong></h1></nav>
                        <p>Elle expirera le :</p>
                        <nav class="navbar navbar-default col-lg-12">
                            <h1>
                                <strong>{{ $attributions->end_at->day}}/{{ $attributions->end_at->month}}/{{ $attributions->end_at->year}} à {{ $attributions->end_at->hour}}h{{ $attributions->end_at->minute}}</strong>
                            </h1>
                        </nav>
                   
                    @else
                        <p>Vous n'avez pas de place en ce moment.</p>
                        @if($users->list != null && $users->list != 0)
                            <p>Votre place dans la file d'attente est</p>
                                <nav class="navbar navbar-default col-lg-12">
                                    <h1>
                                        <strong>{{$users->list}}</strong>
                                    </h1>
                                </nav>
                        @endif
                    @endif
                    </div>
                    @if($attributions != null)
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Votre place était la  </th>
                                <th>Votre abonnement a expiré le  </th>
                            </tr>
                        @foreach($historiques as $historique)
                        <?php $historique->end_at = \Carbon::parse($historique->end_at); ?>
                            @if($historique->end_at < \Carbon::now())
                            <tr class="danger">
                                <td><div class="btn btn-default">{{ $historique->spot->num }}</div></td>
                                <td>le {{ $historique->end_at->day }} / {{ $historique->end_at->month }} / {{ $historique->end_at->year }} à 
                                @if($historique->end_at->hour == 0)
                                    Minuit
                                @else
                                    {{ $historique->end_at->hour }}h
                                @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </table>
                        
                    </div>
                    @else
                        @if($users->list == null || $users->list == 0)
                            <div class="col-lg-6">
                                <a href="newspot"><button type="button" class="btn btn-primary col-lg-12">Demander ma Place</button></a>
                            </div>
                        @endif
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection