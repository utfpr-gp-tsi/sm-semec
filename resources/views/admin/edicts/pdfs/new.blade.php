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

@endsection
