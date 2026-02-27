@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Task Details</h1>
        <a href="{{ route('tasks.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
            &larr; Back to Tasks
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $task->title }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Created {{ $task->created_at->diffForHumans() }}
                </p>
            </div>
            <div>
                @if($task->is_completed)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Completed
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Pending
                    </span>
                @endif
            </div>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                        Description
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 whitespace-pre-wrap">
                        {{ $task->description ?: 'No description provided.' }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Last Updated
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $task->updated_at->format('M j, Y g:i A') }}
                    </dd>
                </div>
            </dl>
        </div>
        <div class="border-t border-gray-200 px-4 py-4 sm:px-6 bg-gray-50 flex justify-end space-x-3">
            <a href="{{ route('tasks.edit', $task) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit Task
            </a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Delete Task
                </button>
            </form>
        </div>
    </div>
@endsection
