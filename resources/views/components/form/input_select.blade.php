<div class="form-group string @if ($required) required @endif {{ $model }}_{{ $field }} @if ($errors->has($field)) is-invalid @endif">
    <label class="form-control-label string required" for="name">
    	{{ $label}} @if ($required) <abbr title="obrigatório">*</abbr> @endif
    </label>
    <select class="form-control custom-select @if ($required) required @endif"
            @if ($required) required="required" @endif
    	      autofocus="autofocus" name="{{ $field }}"
            value="{{ $value ?? '' }}" id="{{ $model }}_{{ $field }}">

      <option disabled selected value> {{$default}} </option>
        @if(!empty($options))
          @foreach($options as $option)
            <option value="{{$option->id}}" {{ $value == $option->id ? 'selected' : ''}} >{{ $option->name  }}</option>
          @endforeach
        @endif
    </select>

    @if ($errors->has($field))
      <span class="invalid-feedback d-block" role="alert">
        @foreach ($errors->get($field) as $message)
          <strong>{{ $message }}</strong>
        @endforeach
      </span>
    @endif

    <small class="form-text text-muted">{{ $hint ?? ''}}</small>
 </div>
