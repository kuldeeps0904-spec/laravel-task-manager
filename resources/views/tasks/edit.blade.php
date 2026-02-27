@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Edit Task</h1>
        <a href="{{ route('tasks.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
            &larr; Back to Tasks
        </a>
    </div>

    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-2 px-3 border" required>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md py-2 px-3">{{ old('description', $task->description) }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <!-- Hidden input to send 0 when unchecked -->
                            <input type="hidden" name="is_completed" value="0">
                            <input id="is_completed" name="is_completed" type="checkbox" value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_completed" class="font-medium text-gray-700">Mark as Completed</label>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
