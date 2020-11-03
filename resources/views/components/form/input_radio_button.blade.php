<div class="custom-controls-stacked @if ($required) required @endif {{ $model }}_{{ $field }}">
  <label class="form-control-label string required" for="name">
    {{ $label}} @if ($required) <abbr title="obrigatório">*</abbr> @endif
  </label>

    @foreach($values as $value_option)
      <label class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input  @if ($required) required @endif @if ($errors->has($field)) is-invalid @endif" @if ($required) required="required" @endif 
        name="{{ $field }}" value="{{ $value_option ?? ''}}"  id="{{ $model }}_{{ $field }}" {{$value == $value_option ? 'checked' : '' }}>
        <span class="custom-control-label"> {{ __($value_option) }} </span>
      </label>
    @endforeach


    @if ($errors->has($field))
      <span class="invalid-feedback" role="alert">
        @foreach ($errors->get($field) as $message)
          <strong>{{ $message }}</strong>
        @endforeach
      </span>
    @endif

  <small class="form-text text-muted">{{ $hint ?? ''}}</small>
</div>