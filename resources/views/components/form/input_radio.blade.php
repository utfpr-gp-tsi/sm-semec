<div class="form-group radio @if ($required) required @endif {{ $model }}_{{ $field }}">

    <label class="form-control-label radio required" for="name">
        {{ $label}} @if ($required) <abbr title="obrigatório">*</abbr> @endif
    </label>

    <div class="form-group">
    <div class="custom-controls-stacked">
        <label class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="removal_type" value="Permuta">
            <div class="custom-control-label">Permuta</div>
        </label>
        <label class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="removal_type" value="Interesse">
            <div class="custom-control-label">Interesse</div>
        </label>
    </div>
</div>

    @if ($errors->has($field))
        <span class="invalid-feedback" role="alert">
            @foreach ($errors->get($field) as $message)
                <strong>{{ $message }}</strong>
            @endforeach
        </span>
    @endif

    <small class="form-text text-muted">{{ $hint ?? ''}}</small>
</div>
