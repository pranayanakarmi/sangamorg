@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Admin Settings</h1>
    <form method="POST" action="#">
        @csrf
        <!-- Example setting: Site Name -->
        <div class="mb-4">
            <label for="site_name" class="block text-gray-700">Site Name</label>
            <input type="text" id="site_name" name="site_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('site_name', config('app.name')) }}">
        </div>
        <!-- Add more settings fields here -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Settings</button>
    </form>
</div>
@endsection
