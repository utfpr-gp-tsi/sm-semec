
<div class="row">
  <div class="col-sm-12 col-lg-8 mb-2">
    <div>
      <div class="input-group input-icon">
        <input id="search_input" type="text" name="term" data-url="{{ $search_url }}"
               placeholder="Procurar..." class="form-control enter-to-submit-search" value="{{ Request()->term }}">
        <span class="input-group-append">
          <a id="search" href="#" class="btn btn-outline-primary submit-search">
            <i class="fas fa-search"></i>
          </a>
        </span>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4">
    @isset($new_url)
      <a href="{{ $new_url }}" class="btn btn-outline-primary d-block">
        <i class="fas fa-plus"></i>
        Novo Servidor
      </a>
    @endisset
  </div>
</div>


