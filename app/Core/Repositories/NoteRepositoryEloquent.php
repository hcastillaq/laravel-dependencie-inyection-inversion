<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Interfaces\NoteRepository;
use App\Models\Note;

class NoteRepositoryEloquent implements NoteRepository
{
  public function getAll(): array
  {
    return Note::all()->toArray();
  }

  public function create(string $name, string $content): array
  {

    $note = [
      'name' => $name,
      'content' => $content,
    ];
    Note::create($note);
    return $note;
  }

  public function delete(int $id): void
  {
    Note::destroy($id);
  }
}
