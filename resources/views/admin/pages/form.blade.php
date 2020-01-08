@extends('twill::layouts.form')

@section('contentFields')
     @formField('input', [
        'name' => 'description',
        'label' => 'Description',
        'translated' => false,
        'maxlength' => 100
    ])
    @formField('input', [
        'name' => 'page_url',
        'label' => 'Page URL',
        'translated' => false,
        'maxlength' => 200
    ])
    @formField('select', [
        'name' => 'template',
        'label' => 'Template',
        'options' => [
        	[
        		'value' => 'layouts.page',
        		'label' => 'Page Template'
        	]
        ],
        'searchable' => false,
        'default' => 'layouts.page'
    ])
    @formField('input', [
        'name' => 'meta_title',
        'label' => 'Meta Title',
        'translated' => false,
        'maxlength' => 200
    ])
    @formField('input', [
        'name' => 'meta_description',
        'label' => 'Meta Description',
        'translated' => false,
        'maxlength' => 200
    ])
@stop
