@extends('layouts.admin.app')

@section('title', 'Novo Pdf')
@section('content')

<form action="{{route('admin.create.pdf', $edict->id)}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @component('components.form.input_text',['field' => 'name',
 					                         'label'    => 'Nome',
					                         'model'    => 'pdf',
                                             'required' => true,
					                         'errors'   => $errors]) @endcomponent

  @component('components.form.input_pdf',['field' => 'pdf',
							              'model' => 'pdf']) @endcomponent

  @component('components.form.input_submit', ['value' => 'Adicionar Pdf', 'back_url' => route('admin.edicts')]) @endcomponent
</form>


@isset($pdfs)
<div class="table-responsive mt-8">
	@component('components.index.page_entries_info', ['entries' => $pdfs]) @endcomponent

  <table class="table card-table table-striped table-vcenter table-data">
    <thead>
      <tr>
        <th>Título</th>
        <th>Edital</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
         <th></th>
      </tr>
    </thead>
    <tbody>
	@each('admin.edicts.pdfs._pdf_row', $pdfs, 'pdfs')
	 
    </tbody>
  </table>
    <div class="mt-5 float-right flex-wrap">
    {!! $pdfs->links() !!}
  </div>
</div>
@endisset

@endsection
