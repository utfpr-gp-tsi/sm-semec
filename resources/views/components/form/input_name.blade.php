<div class="form-group string required user_name">
	<label class="form-control-label string required" for="name">{{ $label}} <abbr title="obrigatório">*</abbr></label>
	<input class="form-control string required @if ($errors->has($field)) is-invalid @endif"  required="required" autofocus="autofocus" required aria-required="true" type="text" name="{{ $field}}"
	value="{{$value}}" id="{{ $model }}_{{ $field }}"/>

	@if ($errors->has($field))
	<span class="invalid-feedback" role="alert">
		@foreach ($errors->get($field) as $message)
		<strong>{{ $message }}</strong>
		@endforeach
	</span>
	@endif
</div>
