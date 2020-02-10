<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- <li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> -->
<li><br/></li>
<li>Principale</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon fa fa-file'></i> Pages</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon fa fa-book'></i> Posts</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('projet') }}'><i class='nav-icon fa fa-clipboard'></i> Projets</a></li>
<li><br/></li>
<li>Secondaire</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categorie') }}'><i class='nav-icon fa fa-archive'></i> Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon fa fa-user'></i> Clients</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class='nav-icon fa fa-tag'></i> Tags</a></li>    

