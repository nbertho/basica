<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTE PAR DEFAUT
  Route::get('/', 'PagesController@redirectToPage')->name('default.route');

// ROUTES DES PAGES
  Route::get('pages/{id}/{slug}.html', 'PagesController@showAction')->name('pages.show');

// ROUTES DES PROJETS
  Route::get('projet/{id}/{slug}.html', 'ProjetsController@showAction')->name('projets.show');

// ROUTES DES POSTS
  Route::get('post/{id}/{slug}.html', 'PostsController@showAction')->name('post.show');

// ROUTE RSS
  Route::get('/feed.xml', 'PostsController@feedRss')->name('rss.feed');
