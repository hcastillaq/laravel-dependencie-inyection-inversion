<?php

namespace App\Core\Services;

use App\Core\Repositories\Interfaces\NoteRepository;

class NoteService
{
  function __construct(NoteRepository $repository)
  {
    $this->repository = $repository;
  }

  public function create(string $name, string $content)
  {
    return $this->repository->create($name, $content);
  }
  public function getAll()
  {
    return $this->repository->getAll();
  }

  public function delete($id)
  {
    return $this->repository->delete($id);
  }
}
