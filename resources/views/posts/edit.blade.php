
{{--x-app-layout>>--}}
{{--<x-slot name="header">--}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Post') }}
    </h2>
{{--</x-slot>--}}

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required >
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('content') }}</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{ old('content', $post->content) }}" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--</x-app-layout>--}}
