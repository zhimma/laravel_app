<?php

namespace App\Repositories\Presenter;

use App\Models\Admin;
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
        if ($id) {
            $user = Admin::findOrFail($id);
            $role = $user->roles->toArray();
        }
        $allRole = Role::all();
        if (isset($role) && !empty($role)) {
            $roleIds = array_column($role, 'id');
            $option = '<option value="0">请选择角色</option>';
            foreach ($allRole as $value) {
                if (in_array($value->id, $roleIds)) {
                    $value->selected = "selected";
                } else {
                    $value->selected = "";
                }
                $option .= "<option value='{$value->id}' $value->selected>{$value->name}</option>";
            }
        } else {
            $option = '<option value="0">请选择角色</option>';
            foreach ($allRole as $value) {
                $option .= "<option value='{$value->id}'>{$value->name}</option>";
            }
        }

        return $option;
    }
}