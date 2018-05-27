@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Se connecter</div>
                <div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="card-body container">

							<div class="form-group">
                                <label for="email" class="col-form-label">Adresse email</label>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="password" class="col-form-label">Mot de passe</label>
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
								<label for="Form-pass3">Mot de passe</label>
								<p class="font-small d-flex justify-content-end"><a href="{{ route('password.request') }}" class="dark-grey-text ml-1 font-weight-bold">Mot de passe oublié ?</a></p>
							</div>

                            <div class="row">
                                <div class="col-sm">
									<p class="text-left"><a href="{{ route('newPasswordPage') }}" class="dark-grey-text ml-1 font-weight-bold">Mot de passe oublié ?</a></p>	
								</div>
                                <div class="col-sm">
									<p class="text-right">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="dark-grey-text ml-1 font-weight-bold">Inscrivez-vous</a></p>
								</div>
							</div>
							
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Se connecter</button>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
