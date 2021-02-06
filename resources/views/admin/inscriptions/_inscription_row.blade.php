<tr>
  <td><a href="{{ route('admin.show.inscription', ['edict_id' => $inscription->edict->id, 'id' => $inscription->id]) }}">{{ $inscription->servant->name}}</a></td>
  <td>{{ $inscription->contract->registration }}</td>
  <td>{{ $inscription->removalType->name }}</td>
  <td>{{ $inscription->created_at->toShortDateTime() }}</td>
  <td></td>
</tr>
