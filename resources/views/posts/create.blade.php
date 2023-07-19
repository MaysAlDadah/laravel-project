

{{--<x-app-layout>--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">{{ __('Content') }}</label>
                            <textarea class="form-control" id="contents" name="contents" rows="5" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--</x-app-layout>--}}



























{{--@section('content')--}}
{{--    <h1>Create Post</h1>--}}

{{--    <form action="{{ route('postsstore') }}" method="POST">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <label for="title">Title:</label>--}}
{{--            <input type="text" id="title" name="title" value="{{ old('title') }}" required>--}}
{{--            @error('title')--}}
{{--            <div>{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="content">Content:</label>--}}
{{--            <textarea id="content" name="content" required>{{ old('content') }}</textarea>--}}
{{--            @error('content')--}}
{{--            <div>{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <button type="submit">Create</button>--}}
{{--    </form>--}}
{{--@endsection--}}


