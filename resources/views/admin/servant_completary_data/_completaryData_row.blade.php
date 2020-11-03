<div class="table-responsive">
  <table class="table table-striped table-vcenter">
    <thead>
      <tr>
        <th>Mátricula</th>
        <th>Cargo</th>
        <th>Local De Trabalho</th>
        <th>Lotação</th>
        <th>Função</th>
        <th>Carga Horária</th>
        <th>Período</th>
        <th></th>
      </tr>
    </thead>
    <tbody>


<tr>
  <td><a href="{{ route('admin.index.completary_data', ['servant_id' => $data->contract->servant_id, 'id' => $data->contract->id]) }}">{{ $data->contract->registration }}</a></td>
  <td>{{ $data->contract->role }}</td>
  <td>{{ $data->contract->place }}</td>
  <td>{{ $data->contract->place }}</td>
  <td>{{ $data->occupation}}</td>
  <td>{{ $data->workload->workload}}</td>
  <td>{{ $data->period }}</td>
  <td>
  </td>
</tr>

   </tbody>
  </table>
</div>