<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = ['id', 'client_id', 'cttName', 'cttCel', 'cttDesc'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
