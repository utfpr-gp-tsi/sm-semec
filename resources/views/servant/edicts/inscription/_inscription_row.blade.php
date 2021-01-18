<tr>
  <td><a href="{{ route('servant.show.inscription', $inscription->id) }}">{{ $inscription->edict->title}}</a></td>
  <td>{{ $inscription->contract->registration }}</td>
  <td>{{ $inscription->created_at->toShortDateTime() }}</td>
  <td></td>
</tr>
