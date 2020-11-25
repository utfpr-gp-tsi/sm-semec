<div class="tab-content">
  <div role="tabPanel" class="tab-pane active " id="edicts-open" href="{{ route('servant.edicts.close') }}"> 
  <div class="table-responsive mt-3">
    <table class="table card-table table-striped table-vcenter table-data">
      <thead>
        <tr>
          <th>Título</th>
          <th>Aberto em</th>
          <th>Válido até</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @each($each, $edicts, 'edict')
      </tbody>
    </table>
    <div class="mt-5 float-right flex-wrap">
      {!! prettyPaginationLinks($edicts->links()) !!}
    </div>
  </div>
  </div>
</div>