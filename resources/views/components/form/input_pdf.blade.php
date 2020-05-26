<div id="box-pdf" data-toggle="tooltip" data-placement="left" title="{{ $label }}">
	<div class="input-field pdf">
		<div class="box-pdf center">


			<div class="form-group file optional edict_pdf form-group-valid">
				<input id="{{ $model}}_{{ $field }}" accept="pdf/*" type="file" name="{{ $field }}" class="form-control-file is-valid file optional pdf_validate">
			</div>
		</div>
	</div>
	<div class="text-box text-center">
		<p class="text-input"> {{ $label }}</p>
	</div>
</div>