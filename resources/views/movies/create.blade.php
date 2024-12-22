@extends('app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6">Add Movie</h2>

    <form class="space-y-6" action="">
        <div>
            <label for="title" class="block text-lg mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="description" class="block text-lg mb-2">Description</label>
            <textarea name="description" id="description" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600"></textarea>
        </div>
        <div>
            <label for="release_date" class="block text-lg mb-2">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="characters" class="block text-lg mb-2">Characters</label>
            <input type="text" name="characters" id="characters" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="genres" class="block text-lg mb-2">Genres</label>
            <input type="text" name="genres" id="genres" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="image" class="block text-lg mb-2">Image</label>
            <input type="text" name="image" id="image" class="w-full p-2 bg-gray-800 border borer-gray-700 rounded focus:outline-non focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
        </div>
    </form>
</div>
@endsection
