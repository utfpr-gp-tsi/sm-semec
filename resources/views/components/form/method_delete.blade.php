<form action="{{ $url }}" method="POST" style="display: inline-block; " onSubmit="return confirm('Tem certeza?')">
	@csrf
	@method('DELETE')
	<button class="btn"  type="submit"><i class="far fa-trash-alt"></i></button>
</form>