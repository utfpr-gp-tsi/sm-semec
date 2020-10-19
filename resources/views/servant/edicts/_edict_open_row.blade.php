<tr>
  <td><a href="{{route('servant.show.edict', $edict->id)}}">{{ $edict->title }}</a></td>
  <td>{{ $edict->started_at->toShortDateTime() }}</td>
  <td>{{ $edict->ended_at->toShortDateTime() }}  </td>
  <td>
    @component('components.links.add', ['url' => route('admin.edit.edict', $edict->id)]) @endcomponent
    @component('components.links.status', ['url' => route('admin.destroy.edict', $edict->id)]) @endcomponent
   </td>
</tr>
