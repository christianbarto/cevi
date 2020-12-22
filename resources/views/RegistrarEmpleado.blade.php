@extends('layouts.app')
@section('content')
{{ csrf_field() }}
<div class="card">
    <div class="card-body">
        <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="title">
                    Titulo
                </label>
                <input id="nombre" name="nombre" type="text" value="Texto inicial">
                </input>
            </div>
            <div class="form-group">
            </div>
        </input>
    </div>
</div>
@endsection
