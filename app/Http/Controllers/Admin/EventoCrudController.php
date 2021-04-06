<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EventoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Evento::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/evento');
        CRUD::setEntityNameStrings('Evento', 'eventos');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('empresa_id')->label('Instituição');
        CRUD::column('campu_id')->label('Campus');
        CRUD::column('name');
        CRUD::column('data')->type('datime');
        CRUD::column('horario')->type('time');
        CRUD::column('active_certficado')->label('Status Certificado')->type('enum');
        CRUD::column('active')->label('Status Evento')->type('enum');

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
        CRUD::setValidation(EventoRequest::class);

        CRUD::field('empresa_id')->label('Instituição');
        CRUD::field('campu_id')->label('Campus');
        CRUD::field('name')->label('Nome do Evento');
        CRUD::field('slug')->type('hidden')->label('URL do Evento');
        CRUD::field('description')->type('ckeditor')->label('Descrição do Evento');
        CRUD::field('palestrante')->type('ckeditor')->label('Palestrante (Adicionar todos os palestrantes do evento)');
        CRUD::field('publico')->type('ckeditor')->label('Público direcionado ao Evento (Professores, Alunos, Externo)');
        CRUD::field('data')->type('date')->label('Data do Evento');
        CRUD::field('horario')->type('time')->label('Horário de Início do Evento');
        CRUD::field('carga_horaria')->type('number')->label('Carga Horária do Evento (usado no certificado)');
        CRUD::field('local')->label('Local do Evento (Sala, Auditório, Laboratório de Informática)');
        CRUD::field('local_url')->label('Informar Link de acesso (Somente para Eventos Online)');
        CRUD::field('duracao')->type('number')->label('Duração do Evento (Em dias)');
        CRUD::field('capacidade')->type('number')->label('Capacidade (o número de inscrições será limitado a capacidade do evento)');
        CRUD::field('recursos')->type('textarea')->label('Recursos Necessários pelos participantes (Caderno, Computador, Acesso a internet)');
        CRUD::field('certificado')->label('Certificado (como será entregue o certificado, data de liberação)');

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
        CRUD::field('empresa_id')->label('Instituição');
        CRUD::field('campu_id')->label('Campus');
        CRUD::field('logo')->type('image')->label('Imagem do Evento');
        CRUD::field('name')->label('Nome do Evento');
        CRUD::field('slug')->type('hidden')->label('URL do Evento');
        CRUD::field('description')->type('ckeditor')->label('Descrição do Evento');
        CRUD::field('palestrante')->type('ckeditor')->label('Palestrante (Adicionar todos os palestrantes do evento)');
        CRUD::field('publico')->type('ckeditor')->label('Público direcionado ao Evento (Professores, Alunos, Externo)');
        CRUD::field('data')->type('date')->label('Data do Evento');
        CRUD::field('horario')->type('time')->label('Horário de Início do Evento');
        CRUD::field('carga_horaria')->type('number')->label('Carga Horária do Evento (usado no certificado)');
        CRUD::field('local')->label('Local do Evento (Sala, Auditório, Laboratório de Informática)');
        CRUD::field('local_url')->label('Informar Link de acesso (Somente para Eventos Online)');
        CRUD::field('duracao')->type('number')->label('Duração do Evento (Em dias)');
        CRUD::field('capacidade')->type('number')->label('Capacidade (o número de inscrições será limitado a capacidade do evento)');
        CRUD::field('recursos')->type('textarea')->label('Recursos Necessários pelos participantes (Caderno, Computador, Acesso a internet)');
        CRUD::field('certificado')->label('Certificado (como será entregue o certificado, data de liberação)');
        CRUD::field('certificado_url')->label('CERTIFICADO URL');
        CRUD::field('preview_url')->label('PREVIEW');
        CRUD::field('token')->label('TOKEN');
        CRUD::field('active_certficado')->label('Status Certificado')->type('enum');
        CRUD::field('active')->label('Status Evento')->type('enum');
    }
}
