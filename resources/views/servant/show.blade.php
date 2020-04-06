@extends('layouts.admin.app')

@section('title', $servants->servants)

@section('content')

<div class="row">
  <div class="card">
      <div class="card-body">
        <h3><i>Servidor:</i></h3>
              <label class="form-label"><u>Matrícula:</u> <p>{{ $servants->registration }}</p></label> 
              <label class="form-label"><u>Nascimento:</u> <p>{{ date( 'd/m/y H:i' , strtotime($servants->created_at))}}</p></label> 
              <label class="form-label"><u>Natural de:</u> <p>{{ $servants->natural_from }}</p></label>
              <label class="form-label"><u>Est. Civil:</u> <p>{{ $servants->marital_status }}</p></label>
              <label class="form-label"><u>Nome Mãe:</u> <p>{{ $servants->mother_name }}</p></label>
              <label class="form-label"><u>Nome Pai:</u> <p>{{ $servants->father_name }}</p></label>
              <label class="form-label"><u>CPF:</u> <p>{{ $servants->CPF }}</p></label>
              <label class="form-label"><u>RG:</u> <p>{{ $servants->RG }}</p></label>
              <label class="form-label"><u>PIS:</u> <p>{{ $servants->PIS }}</p></label>
              <label class="form-label"><u>CTPS:</u> <p>{{ $servants->CTPS }}</p></label>
              <label class="form-label"><u>Título:</u> <p>{{ $servants->title }}</p></label>
              <label class="form-label"><u>Endereço:</u> <p>{{ $servants->address }}</p></label>
              <label class="form-label"><u>Fone:</u> <p>{{ $servants->phone }}</p></label>
              <label class="form-label"><u>E-mail:</u> <p>{{ $servants->email }}</p></label>
              <br>

              @foreach($contracts as $key => $contract)
              <h3><i>Contratos:</i></h3>
              <label class="form-label"><u>Cargo:</u> <p>{{ $contract->role }}</p></label>
              <label class="form-label"><u>Secretaria:</u> <p>{{ $contract->secretary }}</p></label>
              <label class="form-label"><u>Local:</u> <p>{{ $contract->place }}</p></label>
              <label class="form-label"><u>Admissão:</u> <p>{{ date( 'd/m/y H:i' , strtotime($contract->created_at))}}</p></label> 
              <label class="form-label"><u>Rescisão:</u> <p>{{ date( 'd/m/y H:i' , strtotime($contract->created_at))}}</p></label> 
              <br>
              @endforeach

              @foreach($dependents as $key => $dependent)
              <h3><i>Dependentes:</i></h3>
              <label class="form-label"><u>Nome:</u> <p>{{ $dependent->name }}</p></label>
              <label class="form-label"><u>Nascimento:</u> <p>{{ $dependent->birth }}</p></label>
              <label class="form-label"><u>Grau:</u> <p>{{ $dependent->degree }}</p></label>
              <label class="form-label"><u>Estuda:</u> <p>{{ $dependent->study }}</p></label>
              <label class="form-label"><u>Trabalha:</u> <p>{{ $dependent->works }}</p></label>
              <br>
              @endforeach

              @foreach($acts as $key => $act)
              <h3><i>Atos de pessoais:</i></h3>
              <label class="form-label"><u>Ato:</u> <p>{{ $act->act}}</p></label>
              <label class="form-label"><u>Início:</u> <p>{{ date( 'd/m/y H:i' , strtotime($servants->created_at))}}</p></label> 
              <label class="form-label"><u>Validade:</u> <p>{{ $contract->role }}</p></label>
              <label class="form-label"><u>Número:</u> <p>{{ $act->number}}</p></label>
              <label class="form-label"><u>Tempo:</u> <p>{{ $act->time }}</p></label>
              <br>
              @endforeach

              @foreach($licenses as $key => $license)
              <h3><i>Licensas:</i></h3>
              <label class="form-label"><u>Matrícula:</u> <p>{{ $contract->registration }}</p></label>
              <label class="form-label"><u>Data início:</u> <p>{{ date( 'd/m/y H:i' , strtotime($license->created_at))}}</p></label>
              <label class="form-label"><u>Data final:</u> <p>{{ date( 'd/m/y H:i' , strtotime($license->created_at))}}</p></label>
              <label class="form-label"><u>Tipo Licença:</u> <p>{{ $license->license_type }}</p></label>
              <label class="form-label"><u>Dias:</u> <p>{{ $license->days }}</p></label>
              <br>
              @endforeach

              @component('components.form.input_submit',['value' => 'Voltar']) @endcomponent

      </div>
  </div>

</div>

@endsection
