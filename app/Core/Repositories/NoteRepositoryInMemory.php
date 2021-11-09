<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Interfaces\NoteRepository;

class NoteRepositoryInMemory implements NoteRepository
{
  public function __construct()
  {
    if (!session()->has('notes')) {
      session([
        'notes' => []
      ]);
    }
  }

  public function getAll(): array
  {
    return session('notes');
  }

  public function create(string $name, string $description): array
  {
    $new = [
      "id" => count(session('notes')) + 1,
      "name" => $name,
      "content" => $description
    ];
    $notes = session('notes');
    array_unshift($notes, $new);
    session(['notes' => $notes]);
    return $new;
  }

  public function delete(int $id): void
  {
    $notes = array_filter(
      session('notes'),
      function ($note) use ($id) {
        return $note['id'] != $id;
      }
    );
    session([
      'notes' => $notes
    ]);
  }
}
