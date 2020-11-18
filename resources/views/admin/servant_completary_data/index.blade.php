@extends('layouts.admin.app')

@section('title', 'Cadastro Complementar - '. $servant->name)
@section('content')

@foreach($servant->contracts as $contract)
<div class="card mb-6" id="accordion">
	<div class="card-header collapse-completaryData collapsed btn" data-toggle="collapse" data-target="#contract{{$contract->id}}" aria-expanded="false" aria-controls="completaryData" id="completary_data">
		@include('admin/servant_completary_data/_contracts')
	</div>

	<!--Card Servant Complemetay Data-->
	@isset ($contract->servantCompletaryData)
	<div id="contract{{$contract->id}}" class="collapse" aria-labelledby="completaryData" data-parent="#accordion">
		<div class="card-body completaryData m-2 border">
			<p><strong>Servidor:</strong>  {{ $contract->servant->name }}</p>
			<p><strong>Cargo:</strong>  {{ $contract->role }}</p>
			<p><strong>Local de Trabalho:</strong>  {{ $contract->place }}</p>
			<p><strong>Lotação:</strong>  {{ $contract->place }}</p>
			<p><strong>Função:</strong>  {{ $contract->servantCompletaryData->occupation }}</p>
			<p><strong>Carga Horária:</strong>  {{ $contract->servantCompletaryData->workload->workload }} Horas</p>
			<p><strong>Período:</strong>  {{ __($contract->servantCompletaryData->period) }} </p>
		</div>

		<!--Card Moviments-->
		<div class="card-body m-2 border">
			<h3><i>Movimentação:</i></h3>
			<div class="table-responsive">
				<table class="table completaryData card-table table-striped table-vcenter table-data">
					<thead>
						<tr>
							<th>Cargo</th>
							<th>Local de Trabalho</th>
							<th>Data de Inicio</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@each('admin.servant_completary_data._movements_row', $completaryData->moviments, 'moviment')
					</tbody>
				</table>
			</div>
		</div>

	</div>
	@endisset
</div>
@endforeach
@endsection