<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $timestamps = true;

    protected $fillable = ['name','display_name','description'];

    public function roles()
    {
        return $this->belongsToMany("App\Models\Role");
    }

}
