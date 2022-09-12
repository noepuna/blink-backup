<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-success-status class="mb-4" :status="session('message')" />
        
        <x-validation-errors class="mb-4" :errors="$errors" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ url('create-post') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title:')" />

                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus />
                    </div>
                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description:')" />

                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  autofocus />
                    </div>
                    <!-- Price -->
                    <div>
                        <x-input-label for="price" :value="__('Price:')" />

                        <x-text-input id="price" class="block mt-1 w-full" type="number" min="1" step="any" name="price" :value="old('price')"  autofocus />
                    </div>
                    <!-- Image URL -->
                    <div>
                        <x-input-label for="img_src" :value="__('Image URL:')" />

                        <x-text-input id="img_src" class="block mt-1 w-full" type="text" name="img_src" :value="old('img_src')"  autofocus />
                    </div>
                    <div>
                        <x-primary-button class="ml-3">
                            {{ __('Make Post') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>