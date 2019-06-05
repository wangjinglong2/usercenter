<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use App\Models\Permission;

class PermissionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->assign('type', 'permission');
    }

    public function getList()
    {
        return $this->getBaseList('permission', 'entrust.list');
    }

    public function getEdit($id)
    {
        return $this->getBaseItem('permission', $id, 'entrust.item');
    }

    public function postEdit(Request $request)
    {
        $role = $this->getBaseItem('permission', Input::get('id'));
        return $this->savePermission($role, $request);
    }

    public function getAdd()
    {
        return $this->render('entrust.item');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'permission_name' => 'required|alpha',
        ]);
        $permission = new Permission();
        $permission->name = Input::get('permission_name');
        return $this->savePermission($permission, $request);
    }

    protected function savePermission($permission, Request $request)
    {
        $this->validate($request, [
            'permission_display_name'  => 'required',
            'permission_description'   => 'required'
        ]);
        $permission->display_name = Input::get('permission_display_name');
        $permission->description = Input::get('permission_description');
        $type = $permission->isNew() ? 'add' : 'edit';
        if ($permission->save()) {
            return $this->successReturn(trans("common.{$type}_success"));
        }
        return $this->errorReturn(trans("common.{$type}_fail"));
    }

    public function postDelete()
    {
        return $this->doDelete('permission');
    }

}
