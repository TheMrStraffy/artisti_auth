<form
    onsubmit="return confirm('Conferma l\'eliminazione di: {{$artist->name}}')" class="d-inline"
    action="{{route('admin.artist.destroy', $artist)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="delete">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
