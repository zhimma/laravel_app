<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $timestamps = true;

    protected $fillable = ['name','display_name','description'];


}
