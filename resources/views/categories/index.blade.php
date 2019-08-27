@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de categories</div>
                <category-component></category-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection