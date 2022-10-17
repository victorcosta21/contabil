<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraInformation extends Model
{
    use HasFactory;

    protected $table = 'extra_information';
    protected $fillable = ['client_id', 'informations'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }
}
