
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
        <h1>La documentation administrateur vous permettra de vous dirigez sur notre site.</h1>
        <p>En plus de fonction normal d’un utilisateur, l’administrateur peut gérer plus de choses :</p><br/>
        <p>-liste d’utilisateur à l’adresse « /user ».</p>
        <p>-Il pourra ajouter, supprimer ou modifier des utilisateurs existant.</p>
        <p>-Il pourra faire de même avec les places « /spots » de la même manière.</p>
        <p>-Depuis « /attributions » il pourra gérer les attributions des places.</p>

        </div>
    </div>
</div>

@endsection