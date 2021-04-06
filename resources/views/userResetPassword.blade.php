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
                   Identifica la cuenta
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="justify-content-center row" style="margin-top: -15px">
                    <div class="col-md-4 alert-danger">
                        @if(session('verifi'))
                            {{session('verifi')}}
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
                <div class="row justify-content-center" style="margin-top: 10px;">
                    <form action="{{route('user.search')}}" method="get">
                        @csrf
                        <div class="justify-content-center row">
                            <div class="col-md-10">
                                <input class="form-control" id="usuario" name="usuario" type="text" 
                                value="{{old('usuario')}}" required placeholder="Usuario">
                                </input>
                            </div>
                            <div class="col-md-10" style="margin-top: 5px;">
                                <button class="btn btn-primary" type="submit" >
                                    Buscar
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