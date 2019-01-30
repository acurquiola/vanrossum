<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col m12 control-label">Correo Electrónico</label>

            <div class="col m12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col m12 control-label">Contraseña</label>

            <div class="col m12">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="center">
            <div class="col m12">
                <button type="submit" class="btn btn-primary  z-depth-0" id="estandar-btn">
                    {{ __('Login') }}
                </button>
                <div class="row">
                    <a style="font-size: 13px; color: #595959" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</form>