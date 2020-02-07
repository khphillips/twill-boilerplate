@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'Default Meta Title',
        'name' => 'default_meta_title',
        'textLimit' => '80'
    ])
    @formField('input', [
        'label' => 'Default Meta Description',
        'name' => 'default_meta_description',
        'textLimit' => '256'
    ])
    @formField('input', [
        'label' => 'Meta Title Prefix',
        'name' => 'meta_title_prefix',
        'textLimit' => '80'
    ])
    @formField('input', [
        'label' => 'Meta Title Suffix',
        'name' => 'meta_title_suffix',
        'textLimit' => '80'
    ])
@stop