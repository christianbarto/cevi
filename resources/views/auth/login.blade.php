@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container" id="mycontainer">
        <div class="row justify-content-center">
            <div class="col-md-8 logo-dep" style="background-color: #D5DBDB">
                <div class="img">
                    <img class="img-fluid" src="img/cevi2.png" width="30%">
                    </img>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="email">
                            {{ "" }}
                        </label>
                        <div class="col-md-4">
                            <input autocomplete="off"  style="background-color: #F2F4F4 " autofocus="" class="form-control @error('email') is-invalid @enderror" id="entrada_text" name="email" type="text" value="{{ old('email') }}" placeholder="Username">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        Usuario invalido
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">
                            {{ "" }}
                        </label>
                        <div class="col-md-4">
                            <input autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" style="background-color: #F2F4F4 " id="password" name="password" required="" type="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div align="center">
                        <button class="btn btn-primary" type="submit">
                            {{ __('Login') }}
                        </button>

                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
