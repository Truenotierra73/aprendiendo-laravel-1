@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $user->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email', $user->email) }}">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
@unless($user->id)
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
            value="{{ old('password', $user->password) }}">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" value="{{ old('password_confirmation', $user->password_confirmation) }}">
        @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endunless
<div>
    @foreach ($roles as $id => $alias)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="{{ $id }}" id="role{{ $id }}" name="roles[]"
                {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
            <label class="form-check-label" for="role{{ $id }}">
                {{ $alias }}
            </label>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">{{ $btnText }}</button>
