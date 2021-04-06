<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CertificateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CertificateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CertificateCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Certificate::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/certificate');
        CRUD::setEntityNameStrings('Certificado', 'Certificados');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('texto_1');
        CRUD::column('texto_2');
        CRUD::column('texto_3');
        CRUD::column('texto_4');
        CRUD::column('texto_5');
        CRUD::column('carga_horaria');
        CRUD::column('assinatura_1_imagem');
        CRUD::column('assinatura_1_nome');
        CRUD::column('assinatura_1_texto');
        CRUD::column('assinatura_2_imagem');
        CRUD::column('assinatura_2_nome');
        CRUD::column('assinatura_2_texto');
        CRUD::column('assinatura_3_imagem');
        CRUD::column('assinatura_3_nome');
        CRUD::column('assinatura_3_texto');
        CRUD::column('empresa_logo');
        CRUD::column('evento_logo');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CertificateRequest::class);

        CRUD::field('texto_1');
        CRUD::field('texto_2');
        CRUD::field('texto_3');
        CRUD::field('texto_4');
        CRUD::field('texto_5');
        CRUD::field('carga_horaria');
        CRUD::field('assinatura_1_imagem');
        CRUD::field('assinatura_1_nome');
        CRUD::field('assinatura_1_texto');
        CRUD::field('assinatura_2_imagem');
        CRUD::field('assinatura_2_nome');
        CRUD::field('assinatura_2_texto');
        CRUD::field('assinatura_3_imagem');
        CRUD::field('assinatura_3_nome');
        CRUD::field('assinatura_3_texto');
        CRUD::field('empresa_logo');
        CRUD::field('evento_logo');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
}
