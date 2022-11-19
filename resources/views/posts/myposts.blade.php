<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="container">
                <div class="row">
                        @forelse ($posts as $post)
                        <div class="col-md-3" style="padding-top: 20px;">
                            <x-my-posts-card id="{{$post->id}}" title="{{$post->title}}" imgurl="{{$post->img_src}}"  price="{{$post->price}}"  id="{{$post->id}}"/>
                        </div>
                        @empty    
                            <h3>No Record Found.</h3>
                        @endforelse
                </div>
            </div>
</x-app-layout>