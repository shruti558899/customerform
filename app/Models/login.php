<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    use HasFactory;
    protected $table="login";
    protected $primary_key="id";
    protected $fillable = ['email', 'password'];
    public $timestamp="false";
}
