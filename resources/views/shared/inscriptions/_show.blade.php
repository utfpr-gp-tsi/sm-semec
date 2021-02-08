<div class="card">
  <div class="card-body">
    <p><strong>Servidor: </strong>{{ $inscription->servant->name }}</p>
    <p><strong>Matrícula: </strong>{{ $inscription->contract->registration }}</p>
    <p><strong>Unidade Atual: </strong>{{ $inscription->currentUnit->name }}</p>
    <p><strong>Tipo de Remoção: </strong>{{ $inscription->removalType->name }}</p>

    <p><strong>Unidades de Interesse: </strong></p>
    <ul>
      @foreach($inscription->interestedUnits as $unit)
        <li> {{ $unit->name }} </li>
      @endforeach
    </ul>

    <p><strong>Motivo: </strong>{!! nl2br($inscription->reason) !!}</p>
  </div>
</div>
