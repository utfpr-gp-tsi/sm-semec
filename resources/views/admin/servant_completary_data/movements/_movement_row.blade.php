<tr>
  <td>{{ $movement->servantCompletaryData->contract->registration }}</td>
  <td>{{ $movement->occupation }}</td>
  <td>{{ __($movement->period) }}</td>
  <td>{{ $movement->unit->name }}</td>
  <td>{{ $movement->started_at->toShortDateTime() }}</td>
  <td>
    @isset($movement->ended_at)
      {{ $movement->ended_at->toShortDateTime() }}
    @endisset
  </td>
  <td>
    @component('components.links.edit', ['url' => route('admin.edit.movement', ['servant_id' => $movement->servantCompletaryData->contract->servant_id, 'contract_id' => $movement->servantCompletaryData->contract_id, 'completaryData_id' => $movement->servantCompletaryData->id, 'id' => $movement->id])]) @endcomponent

    @component('components.links.delete', ['url' => route('admin.destroy.movement', ['servant_id' => $movement->servantCompletaryData->contract->servant_id, 'contract_id' => $movement->servantCompletaryData->contract_id, 'completaryData_id' => $movement->servantCompletaryData->id, 'id' => $movement->id])]) @endcomponent
  </td>
</tr>
