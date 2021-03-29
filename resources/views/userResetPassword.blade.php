@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Identifica la cuenta
                </h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row justify-content-center">
                    <form action="{{route('user.search')}}" method="get">
                        @csrf
                        @if(session('verifi'))
                            <div class="alert alert-danger" role="alert">
                                {{session('verifi')}}
                            </div>
                        @endif
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-10">
                                <input class="form-control" id="usuario" name="usuario" type="text" 
                                value="{{old('usuario')}}" required placeholder="Usuario">
                                </input>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-10">
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