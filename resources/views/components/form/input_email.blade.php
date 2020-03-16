<div class="form-group email required user_email">
	<label class="form-control-label email required" for="email">{{ $field }} <abbr title="obrigatório">*</abbr></label>
	<input class="form-control email required @if ($errors->has($field)) is-invalid @endif" required="required" type="email" aria-required="true" value="{{ $value ?? '' }}"
	name="{{ $field}}" id="{{ $model }}_{{ $field }}"/>

	@if ($errors->has($field))
	<span class="invalid-feedback" role="alert">
		@foreach ($errors->get($field) as $message)
		<strong>{{ $message }}</strong>
		@endforeach
	</span>
	@endif

</div>
