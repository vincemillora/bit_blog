<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'admin_id';
    protected $table = 'Admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_name',
        'admin_username',
        'password'
      ];
    
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
      'columns' => [
          'admin_name',
          'admin_username'
      ]
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
  ];
}
