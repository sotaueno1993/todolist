<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    
    //テーブル名
    protected $table = 'todolists';

    //可変項目
    protected $fillable = 
    [
        'title',
        'content'
    ];
}
