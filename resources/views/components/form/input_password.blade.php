<div class="form-group password required user_current_password">
	<label class="form-control-label password required" for="academic_current_password">{{ $label }} <abbr title="obrigatório">*</abbr></label>
	<input class="form-control password required @if ($errors->has($field)) is-invalid @endif" required="required"
		     aria-required="true" type="password" name="{{ $field }}" id="{{ $model }}_{{ $field }}" />

	@if ($errors->has($field))
	<span class="invalid-feedback" role="alert">
		@foreach ($errors->get($field) as $message)
		<strong>{{ $message }}</strong>
		@endforeach
	</span>
	@endif

	<small class="form-text text-muted">{{ $hint ?? ''}}</small>
</div>
