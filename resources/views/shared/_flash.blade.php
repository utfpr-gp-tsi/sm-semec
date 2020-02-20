@if(Session::has('fail'))
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert"></button>
         {{Session::get('fail')}}
    </div>
@endif

@if (session('success'))
 <div class="alert alert-success" role="alert">
 		 {{ session('success') }}
    </div>
@endif