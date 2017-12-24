<?php

namespace App\Repositories\Eloquent;
use App\Models\Menu;

class  MenuRepository extends BaseRepository
{
    public function model()
    {
        return Menu::class;
    }

}