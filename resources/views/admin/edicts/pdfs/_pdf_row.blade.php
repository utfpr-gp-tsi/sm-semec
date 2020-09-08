<tr>
	<td><a href="{{route('admin.show.pdf', $pdfs->id)}}">{{ $pdfs->name }}</a></td>
	<td>{{ $pdfs->edict->title }}</td>
	<td>{{ $pdfs->created_at->toShortDateTime() }}</td>
	<td>{{ $pdfs->updated_at->toShortDateTime() }}</td>
	<td></td>
</tr>
