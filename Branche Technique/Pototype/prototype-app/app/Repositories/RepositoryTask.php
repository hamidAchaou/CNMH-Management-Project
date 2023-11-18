<?php
namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\TaskInterface;

class RepositoryTask implements TaskInterface {
  public function create(array $data)
  {
    Task::create($data);
  }

  // get all tasks
  public function getAll($idProject)
  {
    $tasks = Task::where('project_Id', $idProject)->paginate(4);
    return $tasks;
  }

// find One tasks
public function find($id)
{
  $tasks = Task::findOrfail($id);
  return $tasks;
}

// update tasls
public function update(array $data, $id)
{
  $task = $this->find($id);

  $task->update($data);
}

// delete Tasks
public function delete($id)
{
    $task = $this->find($id);
    $task->delete();
}

}