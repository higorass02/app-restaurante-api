<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    protected $fillable = [
        'id',
        'id_contacts',
        'id_cardapio',
        'ds_status'
    ];
}
