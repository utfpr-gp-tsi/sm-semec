@if(Session::has('fail'))
<div class="alert alert-warning alert-dismissible">
	{{Session::get('fail')}}
</div>
@endif

@if(Session('success'))
<div class="alert alert-success alert-dismissible">
	{{ session('success') }}
</div>
@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
	{{ session('status') }}
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger" role="alert">
	{{ session('danger') }}
</div>
@endif
