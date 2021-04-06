@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <div style="text-align: left;">
                    <a class="btn btn-default" href="{{ asset('/login') }}">Atras</a>
                </div>
                <h1>
                   Recupera tu cuenta
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="justify-content-center row" style="margin-top: 5px;">
                    <div class="col-md-13">
                        @if(session('verifi'))
                            <div class="alert alert-danger" role="alert">
                                {{session('verifi')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <form action="{{route('user.submit')}}" method="get">
                        @csrf
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-13">
                                <label class="form-control" id="pregunta" name="pregunta" type="text">
                                    {{$usuario[0]->pregunta}}
                                </label>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px;">
                                <input class="form-control" id="respuesta" name="respuesta" type="text" 
                                value="{{old('respuesta')}}" required placeholder="Ingresa tu respuesta">
                                </input>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-10">
                                <button class="btn btn-primary" id="id" name="id" type="submit" value={{$usuario[0]->id}}>
                                    Probar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection