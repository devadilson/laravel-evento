<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmpresaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmpresaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmpresaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Empresa::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/empresa');
        CRUD::setEntityNameStrings('Empresa', 'empresas');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('logo')->type('image')->label('Logo');
        CRUD::column('name')->label('Empresa');
        CRUD::column('slug')->label('Bread');
        CRUD::column('slug_name')->label('Url');
        CRUD::column('active')->label('Status');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EmpresaRequest::class);

        CRUD::field('logo')->type('image')->label('Logo da Empresa');
        CRUD::field('name')->label('Nome da Empresa');
        CRUD::field('slug')->label('Bread da Empresa');
        CRUD::field('slug_name')->label('Url Amigável');
        CRUD::field('description')->type('ckeditor')->label('Descrição do Empresa');
        CRUD::field('active')->type('enum')->label('Status');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();      
    }

    protected function setupShowOperation()
    {
        CRUD::column('logo')->type('image')->label('Logo');
        CRUD::column('name')->label('Empresa');
        CRUD::column('slug')->label('Bread');
        CRUD::column('slug_name')->label('Url');
        CRUD::column('description')->type('textarea')->label('Descrição do Empresa');
        CRUD::column('active')->label('Status');
        $this->crud->removeColumn('extras');
    }
}
