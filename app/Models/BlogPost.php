<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BlogPost extends Model
{
    use HasFactory;

    // mot reservé à cet usage: on y inscrit les variables que l'on laisse manipuler
    protected $fillable = [
        'title_en', 'title_fr', 'body_en', 'body_fr', 'user_id'
    ];

    public function blogPostHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function selectBlogPost($order = 'ASC')
    {
        $lang = session()->get('localeDB');
        return $this::select(
            'id',
            DB::raw("(case when title$lang is null then title else title$lang end) as title"))
            ->get();
    }

    static public function findUser($id){
        $query = BlogPost::select()
        ->where('user_id', $id);
        return $query;
    }
}
