<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $fillable = ['nome', 'cor', 'descricao'];

    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class);
    }
}
