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

@if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif
