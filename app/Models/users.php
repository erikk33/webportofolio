<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'id';
}

$usersa = users::create(['fullName' => 'Putu Erik Cahyadi']);