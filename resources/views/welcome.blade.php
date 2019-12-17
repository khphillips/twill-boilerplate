@extends('layouts.app')

@section('content')

<v-card max-width="500" class="mx-auto">
    <v-card-title>
        <h1>Hello!</h1>
    </v-card-title>
    <v-card-text class="text-left">
        <p>As I went on, still gaining velocity, the palpitation of night and day merged into one continuous greyness; the sky took on a wonderful deepness of blue, a splendid luminous color like that of early twilight; the jerking sun became a streak of fire, a brilliant arch, in space; the moon a fainter fluctuating band; and I could see nothing of the stars, save now and then a brighter circle flickering in the blue.</p>
        <div class="pa-4 ma-4 text-center">
            <v-btn small @click="add(1)">Normal</v-btn><br>
            @{{ counter }}
        </div>
    </v-card-text>   
</v-card>

<h2 dark class="white--text text-center">As I went on, still gaining velocity, the palpitation of night and day merged into one continuous greyness.</h2>
@endsection