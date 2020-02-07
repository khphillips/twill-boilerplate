@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'images', 'label' => 'Images'],
        ['fieldset' => 'meta', 'label' => 'Meta',],
    ]
])

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
    
@stop

@section('fieldsets')
    <a17-fieldset title="Images" id="images">
        @formField('medias',[
            'name' => 'hero_image',
            'label' => 'Hero image',
        ])
    </a17-fieldset>
    <a17-fieldset title="Meta" id="meta" :open="false">
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
    </a17-fieldset>
@stop
