<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Featured') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-success-status class="mb-4" :status="session('message')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>User ID</th>
                            <th>Featured</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <form action="{{ url('new-features') }}" method="POST">
                            @csrf
                            @method('PUT')
                            @forelse ($posts as $post)
                            <tr>
                                <td><a href="{{ url('/post/'.$post->id) }}" >{{ $post->title }}</a></td>
                                <td>{{ $post->user_id }}</td>
                                @if ( $post->featured == 1 )
                                    <td><input type="checkbox" checked="checked" name="checkfeature[]" value='{{$post->id}}'></td>
                                @else
                                    <td><input type="checkbox" name="checkfeature[]" value='{{$post->id}}'></td>
                                @endif
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Record Found.</td>
                            </tr>
                            @endforelse
                            <input type="submit" value="Save">
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>