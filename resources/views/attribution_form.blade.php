@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{env('APP_URL')}}resources/js/jquery-ui/jquery-ui.min.css">
@endsection

@section('title', 'Register')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{isset($attribution) ? 'Editer' : 'Ajouter'}} une attribution</div>

                <div class="panel-body">
	
                	{{Form::open(['url' => isset($attribution) ? '/attribution/'.$attribution->id  :  '/attribution', 'method' => isset($attribution) ? 'put' : 'post'])}}
                	    <div class="form-group">
                		{{Form::label('user','Utilisateur :',['class'=>'registerForm'])}}
                		{{Form::select('user', $users, isset($attribution) ? $attribution->User->id : null,['class'=>'form-control'])}}<br/>{!! $errors->first('email','<small class="help-block">:message</small>') !!}
                        </div>
                	    <div class="form-group">
                		{{Form::label('spot','Place :',['class'=>'registerForm'])}}
                		{{Form::select('spot',$spots,isset($attribution) ? $attribution->Spot->num : null,['class'=>'form-control'])}}<br/>{!! $errors->first('name','<small class="help-block">:message</small>') !!}
                        </div>
                	    <div class="form-group">
                		{{Form::label('begin','Debut :', ['class'=>'registerForm'])}}
                		{{Form::text('begin',isset($attribution) ? $attribution->begin_at : null,['class'=>'form-control','id'=>'begin'])}}<br/>{!! $errors->first('begin','<small class="help-block">:message</small>') !!}
                        </div>
                        {{Form::label('end','Debut :', ['class'=>'registerForm'])}}
                		{{Form::text('end',isset($attribution) ? $attribution->end_at : null,['class'=>'form-control','id'=>'end'])}}<br/>{!! $errors->first('end','<small class="help-block">:message</small>') !!}
                        </div>
                		{{form::hidden('id',isset($attribution) ? $attribution->id : null)}}
                		{{Form::submit(isset($attribution) ? 'Editer' : 'Ajouter',['class'=>'btn btn-success pull-right'])}}
                	{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection

@section('js')

<script src="{{env('APP_URL')}}resources/js/jquery-ui/jquery-ui.min.js"></script>
<script>
     $(document).ready(function () {
         $(function() {
            $( "#begin" ).datepicker({
                dateFormat: 'yy/mm/dd',
                changeMonth: true,
                changeYear: true
            });
        });
        $(function() {
            $( "#end" ).datepicker({
                dateFormat: 'yy/mm/dd',
                changeMonth: true,
                changeYear: true
            });
        }); 
     });
</script>
@endsection