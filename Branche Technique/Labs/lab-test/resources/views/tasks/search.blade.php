@foreach ($tasks as $task)
    <tr>
        <th>{{ $task->nom }}</th>
        <td>{{ $task->description }}</td>
        <td class="d-md-flex">
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-success me-2">Modifier</a>
            <button type="button" class="btn btn-danger" onclick="deleteTask({{ $task->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
        </td>
    </tr>
@endforeach

<tr>
    <td></td>
    <td></td>
    <td colspan="3" align="center">
        <div class="d-flex justify-content-center mt-3">
            {!! $tasks->links() !!}
        </div>
    </td>
</tr>

<!-- Modal -->
<x-modal-delete-tasks />
