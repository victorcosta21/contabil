<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = ['id', 'client_id', 'environment_id', 'cep', 'road', 'number', 'complement', 'reference'];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function environment()
    {
        return $this->hasOne(Environment::class, 'id', 'environment_id');
    }

}
