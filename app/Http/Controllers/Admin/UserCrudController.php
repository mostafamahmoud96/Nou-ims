<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as UserMainCrud;
use App\Http\Requests\User\UserStoreRequest as StoreRequest;
use App\Http\Requests\User\UserUpdateRequest as UpdateRequest;


/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends UserMainCrud
{

    public function setupListOperation(){
        parent::setupListOperation();
        $this->crud->addColumns([
            [
                'name'  => 'phone',
                'label' => trans('dashboard.phone'),
                'type'  => 'phone',
            ],
            [
                'name'    => 'type',
                'label'   => trans('dashboard.user_type'),
                'type'    => 'radio',
                'options' => [
                    User::TYPE_NOU_ADMIN => trans('dashboard.user_types.'.User::TYPE_NOU_ADMIN),
                    User::TYPE_IMPORTER => trans('dashboard.user_types.'.User::TYPE_IMPORTER),
                    User::TYPE_EEAA_ADMIN=> trans('dashboard.user_types.'.User::TYPE_EEAA_ADMIN),
                ]
            ]
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(StoreRequest::class);

        $this->addUserFields();

        $this->crud->addFields([
            'name'        => 'type',
            'label'       => trans('dashboard.user_type'),
            'type'        => 'select_from_array',
            'options'     => [
                User::TYPE_NOU_ADMIN => trans('dashboard.user_types.'.User::TYPE_NOU_ADMIN),
                User::TYPE_IMPORTER => trans('dashboard.user_types.'.User::TYPE_IMPORTER),
                User::TYPE_EEAA_ADMIN=> trans('dashboard.user_types.'.User::TYPE_EEAA_ADMIN),
            ],
            'allows_null' => false,
        ],
        [
            'name'  => 'phone',
            'label' => trans('dashboard.phone'),
            'type'  => 'text',
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->crud->setValidation(UpdateRequest::class);
        $this->addUserFields();
        $this->crud->addFields([
            [
            'name'        => 'type',
            'label'       => trans('dashboard.user_type'),
            'type'        => 'select_from_array',
            'options'     => [
                User::TYPE_NOU_ADMIN => trans('dashboard.user_types.'.User::TYPE_NOU_ADMIN),
                User::TYPE_EEAA_ADMIN=> trans('dashboard.user_types.'.User::TYPE_EEAA_ADMIN),
                User::TYPE_IMPORTER => trans('dashboard.user_types.'.User::TYPE_IMPORTER),
            ],
            'allows_null' => false,
            ],
            [
            'name'  => 'phone',
            'label' => trans('dashboard.phone'),
            'type'  => 'text',
            ]
        ]);
    }


}

