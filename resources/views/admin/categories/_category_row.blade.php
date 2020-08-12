<tr>
  <td>{{ $category->name }}</td>

  <td >
    @component('components.links.edit', ['url' => route('admin.edit.category', $category->name)]) @endcomponent
    @component('components.links.delete', ['url' => route('admin.destroy.category', $category->name)]) @endcomponent
  </td>
</tr>
