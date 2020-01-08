@extends(isset($item->template) ? $item->template : 'layouts.app')

@section('meta_title', (isset($item->meta_title) && $item->meta_title != '') ? $item->meta_title : $item->title)
@section('meta_description', (isset($item->meta_description) && $item->meta_description != '') ? $item->meta_description : $item->description)

@section('content')
<v-card max-width="500" class="mx-auto">
    <v-card-title>
        <h1>{{ $item->title }}</h1>
    </v-card-title>
    <v-card-text class="text-left">
        <p>{{ $item->description }}</p>
    </v-card-text>   
</v-card>

{!! $item->renderBlocks(false) !!}

@endsection