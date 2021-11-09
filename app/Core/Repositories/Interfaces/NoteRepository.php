<?php

namespace App\Core\Repositories\Interfaces;

interface NoteRepository
{
  public function create(string $title, string $description): array;
  public function getAll(): array;
  public function delete(int $id): void;
}
