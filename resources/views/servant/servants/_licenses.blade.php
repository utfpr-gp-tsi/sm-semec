<h3><i>Licenças:</i></h3>
<div class="table-responsive">
  <table class="table table-striped table-vcenter">
    <thead>
      <tr>
        <th>Matrícula</th>
        <th>Data início</th>
        <th>Data final</th>
        <th>Tipo Licença</th>
        <th>Dias</th>
      </tr>
    </thead>
    <tbody>
      @foreach($servant->licenses as $license)
        <tr>
          <td>{{ $license->registration }}</td>
          <td>{{ $license->start_date }}</td>
          <td>{{ $license->finish_date }}</td>
          <td>{{ $license->license_type }}</td>
          <td>{{ $license->days }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
