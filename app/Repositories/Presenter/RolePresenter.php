<?php

namespace App\Repositories\Presenter;

use App\Models\Role;


/**
 * 角色
 *
 * @package App\Repositories\Presenter
 */
class RolePresenter
{
    public function getRole($id = 0)
    {

        $role = Role::find($id);
        $allRole = Role::all();
        if ($role) {
            $option = '<option value="0">请选择角色</option>';
            if (!empty($allRole)) {
                foreach ($allRole as $value) {
                    if ($value->id == $role->id) {
                        $value->selected = "selected";
                    } else {
                        $value->selected = "";
                    }

                    $option .= "<option value='{$value->id}' $value->selected>{$value->name}</option>";
                }
            }
        } else {
            $option = '<option value="0">请选择角色</option>';
            if (!empty($allRole)) {
                foreach ($allRole as $value) {
                    $option .= "<option value='{$value->id}'>{$value->name}</option>";
                }
            }
        }

        return $option;

    }
}