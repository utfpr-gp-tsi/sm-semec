<fieldset class="border p-2">
  <legend class="w-auto">Dados do Contrato</legend>
  <span class="span-field-effect ">Matricula</span>
  <p class="p-field-effect">{{$contract->registration}}</p>

  <span class="span-field-effect">Cargo</span>
  <p class="p-field-effect">{{$contract->role}}</p>

  <span class="span-field-effect">Local de Trabalho</span>
  <p class="p-field-effect">{{$contract->place}}</p>

  <span class="span-field-effect">Secretária</span>
  <p class="p-field-effect">{{$contract->secretary}}</p>

  <span class="span-field-effect">Vinculo</span>
  <p class="p-field-effect">{{$contract->link}}</p>

  <span class="span-field-effect">Data de Admissão</span>
  <p class="p-field-effect">{{$contract->admission_at->toShortDateTime()}}</p>
</fieldset>
