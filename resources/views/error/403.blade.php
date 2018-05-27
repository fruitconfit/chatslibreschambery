@extends('layouts.app')

@section('content')
<div class="container">
    <div class="error403">
        <div class="cat">
            <div class="ear ear--left"></div>
            <div class="ear ear--right"></div>
            <div class="face">
                <div class="eye eye--left">
                    <div class="eye-pupil"></div>
                </div>
                <div class="eye eye--right">
                    <div class="eye-pupil"></div>
                </div>
                <div class="muzzle"></div>
            </div>
        </div>
    </div>
    <div>
        <h1> 403 </h1>
        <h2> Vous n'êtes pas autorisé à accéder à cette page </p2>
    </div>
</div>
@endsection
