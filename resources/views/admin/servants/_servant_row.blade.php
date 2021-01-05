<tr>
  <td>
    <a href="{{route('admin.show.servant', $servant->id)}}">{{ $servant->name }}</a>
  </td>
  <td>{{ $servant->CPF }}</td>
  <td>{{ $servant->lastContract()->registration }}</td>
  <td>{{ $servant->lastContract()->role }}</td>
  <td>{{ $servant->lastContract()->place }}</td>
  <td>
  	<span class="icon mr-1">
        <a href="{{ route('admin.index.completary_data', $servant->id) }}" data-toggle="tooltip" data-placement="top" title="Cadastro Complementar"><i class="far fa-file-alt"></i></a>
    </span>
  </td>
  </td>
</tr>
