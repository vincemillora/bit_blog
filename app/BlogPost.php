<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $primaryKey = 'post_id';
    protected $table = 'BlogPost';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'post_title',
      'post_message',
      'user_email',
      'date_created',
      'date_updated'
    ];
}
