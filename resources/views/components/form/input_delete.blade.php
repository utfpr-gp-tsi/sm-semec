<form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('users.edit', $user->id)}}" title="Editar">
                   <i class="far fa-edit"></i> 
                </a> 
                <a href="" title="Excluir"><button class="btn"  type="submit"><i class="far fa-trash-alt"></i></button></a>
 </form>