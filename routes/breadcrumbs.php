<?php

Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', '/');
});

Breadcrumbs::register('languages', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('languages', action('LanguageController@index'));
});

Breadcrumbs::register('language', function($breadcrumbs)
{
    $breadcrumbs->parent('languages');
    $breadcrumbs->push('language');
});

Breadcrumbs::register('strings', function($breadcrumbs, $language)
{ 
    $breadcrumbs->parent('languages');
    $breadcrumbs->push($language['lang_name'].' / strings', route('languages.strings.index',$language));
});


Breadcrumbs::register('string', function($breadcrumbs, $language, $string, $route_name)
{
    $breadcrumbs->parent('strings',$language);
    $breadcrumbs->push('string', route($route_name,[$language, $string]));
});

Breadcrumbs::register('screen_names', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Screen Names',  route('screen_names.index'));
});


Breadcrumbs::register('screen_name', function($breadcrumbs)
{
    $breadcrumbs->parent('screen_names');
    $breadcrumbs->push('Screen Name');
});


Breadcrumbs::register('screen_name_on_string', function($breadcrumbs, $language, $string, $route_name)
{
    $breadcrumbs->parent('string',$language, $string, $route_name);
    $breadcrumbs->push('Screen Name');
});


Breadcrumbs::register('control_names', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Control Names',  route('control_names.index'));
});


Breadcrumbs::register('control_name', function($breadcrumbs)
{
    $breadcrumbs->parent('control_names');
    $breadcrumbs->push('Control Name');
});

Breadcrumbs::register('rewards', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('rewards',route('rewards.index'));
});


Breadcrumbs::register('reward', function($breadcrumbs, $reward)
{
    $breadcrumbs->parent('rewards');
    $breadcrumbs->push('reward',route('rewards.edit', ['reward'=>$reward->id]));
});