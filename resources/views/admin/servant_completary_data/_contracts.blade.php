<div class="table-responsive">
	<table class="table table-striped table-vcenter">
		<thead>
			<tr>
				<th>Mátricula</th>
				<th>Cargo</th>
				<th>Secretaria</th>
				<th>Local</th>
				<th>Vínculo</th>
				<th>Data Admissão</th>
				<th>Data de Rescisão</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $contract->registration }}</td>
				<td>{{ $contract->role }}</td>
				<td>{{ $contract->secretary }}</td>
				<td>{{ $contract->place }}</td>
				<td>{{ $contract->link }}</td>
				<td>{{ $contract->admission_at->toShortDate() }}</td>
				<td>{{ $contract->termination_at->toShortDate() }}</td>
				<td>
					<!--Caso possua cadastro mostra para editar caso contrário mostra para criar-->
					@if ($contract->servantCompletaryData)
					@component('components.links.edit', ['url' => route('admin.edit.completary_data', ['servant_id' => $contract->servant_id, 'contract_id' => $contract->id, 'id' => $contract->servantCompletaryData->id])]) @endcomponent
					@else
					<span class="icon mr-1">
						<a href="{{route('admin.new.completary_data', ['servant_id' => $contract->servant_id, 'id' => $contract->id])}}"><i class="far fa-file-alt"></i></a>
					</span>
					@endif
				</td>
			</tr>
		</tbody>
	</table>
</div>