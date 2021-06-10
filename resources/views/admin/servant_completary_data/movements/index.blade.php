<fieldset class="border p-2 mt-5">
  <legend  class="w-auto">Movimentações</legend>

  <a  href="{{route('admin.new.movement', ['servant_id' => $contract->servant_id, 'contract_id' => $contract->id, 'id' => $completaryData->id])}}" class="btn btn-outline-primary d-block col-md-2 ml-md-auto">
    <i class="fas fa-plus"></i>
    Nova Movimentação
  </a>

  <div class="table-responsive mt-3">
    <table class="table card-table table-striped table-vcenter table-data">
      <thead>
        <tr>
          <th>Matricula</th>
          <th>Função</th>
          <th>Período</th>
          <th>Lotação</th>
          <th>Data Inicial</th>
          <th>Data Final</th>
        </tr>
      </thead>
      <tbody>
      @each('admin.servant_completary_data.movements._movement_row', $completaryData->moviments, 'movement')
      </tbody>
    </table>
  </div>
</fieldset>

