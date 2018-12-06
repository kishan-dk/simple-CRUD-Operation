<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

    <div class="col-md-6">
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

        @if ($errors->has('username'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>