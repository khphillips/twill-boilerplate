@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'Site title',
        'name' => 'site_title',
        'textLimit' => '80'
    ])
    @formField('input', [
        'label' => 'Contact Email',
        'name' => 'site_contact_email',
        'textLimit' => '100'
    ])
    @formField('input', [
        'label' => 'Phone',
        'name' => 'site_contact_phone',
        'textLimit' => '100'
    ])
    @formField('input', [
        'label' => 'Address',
        'name' => 'site_contact_address',
        'textLimit' => '250'
    ])
@stop