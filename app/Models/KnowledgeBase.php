<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;
    protected $table = 'knowledge_base';
    protected $fillable = ['question', 'answer'];
}