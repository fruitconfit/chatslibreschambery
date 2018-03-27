@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
				Se connecter
                </div>
                <div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="card-body mx-4 mt-4">

							<!--Body-->
							<div class="md-form">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
								<label for="Form-email3">Adresse email</label>
							</div>

							<div class="md-form pb-1 pb-md-3">
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

							@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
								<label for="Form-pass3">Mot de passe</label>
								<p class="font-small d-flex justify-content-end"><a href="{{ route('newPasswordPage') }}" class="dark-grey-text ml-1 font-weight-bold">Mot de passe oublié ?</a></p>
							</div>


							<!--Grid row-->
							<div class="row d-flex align-items-center mb-4">

								<!--Grid column-->
								<div class="col-md-1 col-md-5 d-flex align-items-start">
									<div class="text-center">
										<button type="submit" class="btn btn-primary">Se connecter</button>
									</div>
								</div>
								<!--Grid column-->

								<!--Grid column-->
								<div class="col-md-7">
									<p class="font-small d-flex justify-content-end mt-3">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="dark-grey-text ml-1 font-weight-bold">Inscrivez-vous</a></p>
								</div>
								<!--Grid column-->

							</div>
							<!--Grid row-->
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
