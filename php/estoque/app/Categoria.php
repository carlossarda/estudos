<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produto()
    {
        return $this->hasMany('estoque\Produto');
    }
}
