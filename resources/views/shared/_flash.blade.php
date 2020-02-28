@if(Session::has('fail'))
<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"></button>
	{{Session::get('fail')}}
</div>
@endif

@if(Session('success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"></button>
	{{ session('success') }}
</div>
@endif
