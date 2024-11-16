<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneConnection extends Model
{
    protected $table = 'phone_conns';
    protected $fillable = ['cust_id', 'firstname', 'lastname', 'email_address', 'date_of_birth', 'address'];
}
