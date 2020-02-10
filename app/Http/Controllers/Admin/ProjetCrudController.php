<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProjetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProjetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Projet');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/projet');
        $this->crud->setEntityNameStrings('projet', 'projets');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProjetRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
        $this->crud->removeField('clients_id');
        $this->crud->removeField('image');

        $this->crud->addField([
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'upload'        => true,
            'crop'          => true,
            'prefix'        => 'uploads/',
        ]);

        $this->crud->addField([
            // 1-n relationship clients
            'label'     => 'Client',
            'type'      => 'select',
            'name'      => 'clients_id', // the column that contains the ID of that connected entity;
            'entity'    => 'client', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is
            'model'     => 'App\Models\Client',
            'options'   => (function ($query) {
                return $query->orderBy('nom', 'ASC')->get();
            }),
        ]);

        $this->crud->addField([  
            // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Tags",
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'model' => "App\Models\Tag", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'select_all' => true, // show Select All and Clear buttons?
        ]);

        $this->crud->removeField('slug');
        $this->crud->addField([
            'label'     => 'Slug',
            'type'      => 'text',
            'name'      => 'slug',
            'hint'      => '(Même que nom sans accents ni espaces)',
        ])->afterField('nom');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        
    }
}
