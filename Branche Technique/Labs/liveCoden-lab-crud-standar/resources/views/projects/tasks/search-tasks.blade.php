{{-- get all Tasks --}}
@foreach ($project->task as $task)
    <tr>
        <td>{{ $task->name }}</td>
        <td>
            {{ $task->description }}
        </td>
        <td>
            <a href="{{ route('tasks.edit', ['id' => $task->id, 'project_Id' => $project->id]) }}"
                class="btn btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
            <button type="button" class="btn btn-default"
                onclick="deleetProject({{ $task->id }}, {{ $project->id }})" data-bs-toggle="modal"
                data-bs-target="#delete-task"><i class="fa-solid fa-trash"></i></button>
        </td>

    </tr>
@endforeach
