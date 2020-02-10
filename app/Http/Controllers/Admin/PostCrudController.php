<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Post');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/post');
        $this->crud->setEntityNameStrings('post', 'posts');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PostRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
        $this->crud->removeField('categories_id');
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
            'label'     => 'Categorie',
            'type'      => 'select',
            'name'      => 'categories_id', // the column that contains the ID of that connected entity;
            'entity'    => 'categorie', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is
            'model'     => 'App\Models\Categorie',
            'options'   => (function ($query) {
                return $query->orderBy('nom', 'ASC')->get();
            })
        ]);

        $this->crud->removeField('slug');
        $this->crud->addField([
            'label'     => 'Slug',
            'type'      => 'text',
            'name'      => 'slug',
            'hint'      => '(Même que nom sans accents ni espaces)',
        ])->afterField('titre');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
