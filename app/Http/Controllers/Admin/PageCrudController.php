<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Page');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page');
        $this->crud->setEntityNameStrings('page', 'pages');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
        $this->crud->removeButton('delete');
        

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PageRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
        $this->crud->removeField('slug');
        $this->crud->addField([
            'label'     => 'Slug (Même que nom sans accents ni espaces)',
            'type'      => 'text',
            'name'      => 'slug',
        ])->afterField('titre');

        $this->crud->removeField('tri');
        $this->crud->addField([
            'label'     => 'Tri',
            'type'      => 'number',
            'name'      => 'tri',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
