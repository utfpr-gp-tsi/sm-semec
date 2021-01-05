@extends('layouts.admin.app')

@section('title', 'Cadastro Complementar - '. $servant->name)
@section('content')

@foreach($servant->contracts as $contract)
<div class="card mb-6">
	<div class="card-header" aria-expanded="false" aria-controls="completaryData" id="completary_data">
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
							<span class="icon mr-1">
								<a href="{{route('admin.index.completary_datas', ['servant_id' => $contract->servant_id, 'id' => $contract->id])}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus mr-1"></i>Cadastro Complementar</a>
							</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach
@endsection