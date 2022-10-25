<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['id', 'accountNumber', 'name', 'document', 'email', 'date'];

    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'client_id', 'id');
    }
    
    public function address()
    {
        return $this->hasOne(Address::class, 'client_id', 'id');
    }

    public function extra()
    {
        return $this->hasOne(ExtraInformation::class, 'client_id', 'id');
    }

    public function payment()
    {
        return $this->hasMany(PaymentControl::class, 'client_id', 'id');
    }

    public function paySum()
    {
        return $this->hasMany(PaymentControl::class, 'client_id', 'id')->where('payment', '1');
    }
}
