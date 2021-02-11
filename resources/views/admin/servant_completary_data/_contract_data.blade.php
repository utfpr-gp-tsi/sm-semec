<fieldset class="border p-2">
  <legend class="w-auto">Dados do Contrato</legend>
  <span class="span-contracts">Matricula</span>
  <p class="p-contracts">{{$contract->registration}}</p>

  <span class="span-contracts">Cargo</span>
  <p class="p-contracts">{{$contract->role}}</p>

  <span class="span-contracts">Local de Trabalho</span>
  <p class="p-contracts">{{$contract->place}}</p>

  <span class="span-contracts">Secretária</span>
  <p class="p-contracts">{{$contract->secretary}}</p>

  <span class="span-contracts">Vinculo</span>
  <p class="p-contracts">{{$contract->link}}</p>
  
  <span class="span-contracts">Data de Admissão</span>
  <p class="p-contracts">{{$contract->admission_at->toShortDateTime()}}</p>
</fieldset>