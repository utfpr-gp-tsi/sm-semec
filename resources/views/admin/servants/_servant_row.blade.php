<tr>
  <td>
    <a href="{{route('admin.show.servant', $servant->id)}}">{{ $servant->name }}</a>
  </td>
  <td>{{ $servant->CPF }}</td>
  <td>{{ $servant->registration }}</td>
  <td>
     @foreach($servant->contracts as $contract)
       {{ $contract->role }} / {{ $contract->place }} </br>
     @endforeach
  </td>
</tr>
