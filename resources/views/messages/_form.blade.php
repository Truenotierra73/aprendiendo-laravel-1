@csrf
@if ($showFields)
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email', $message->email) }}">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $message->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
@endif
<div class="form-group">
<label for="content">Contenido</label>
<textarea class="form-control @error('content') is-invalid @enderror" name="content">
{{ old('content', $message->content) }}
</textarea>
@error('content')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>
<button type="submit" class="btn btn-primary">{{ $btnText }}</button>
