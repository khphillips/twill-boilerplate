<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ isset($title) && $title != '' ? $title : site_settings("default_meta_title") }}</title>
	  <meta name='description' content='{{ isset($description) ? $title : site_settings("default_meta_description") }}' />
      <link rel="stylesheet" href="{{ asset_path('assets/css/chunk-vendors.css') }}">
      <link rel="stylesheet" href="{{ asset_path('assets/css/index.css') }}">
  </head>