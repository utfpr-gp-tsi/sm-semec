<tr>
  <td><a href="{{ route('admin.show.inscription', ['edict_id' => $inscription->edict->id, 'id' => $inscription->id]) }}">{{ $inscription->servant->name}}</a></td>
  <td>{{ $inscription->removalType->name }}</td>
  <td></td>
</tr>
