<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{	
    protected $fillable = ['subject', 'description', 'level', 'domain', 'id_client', 'id_status', 'close', 'close'];
    
    protected $guarded = ['id'];
    
    
}