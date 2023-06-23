<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    use HasFactory;

    // mot reservé à cet usage: on y inscrit les variables que l'on laisse manipuler
    protected $fillable = [
        'title_en', 'title_fr', 'link', 'user_id'
    ];

    public function repertoireHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function findUser($id){
        $query = Repertoire::select()
        ->where('user_id', $id);
        return $query;
    }
}
