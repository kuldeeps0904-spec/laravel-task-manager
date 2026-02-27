@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Your Tasks</h1>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        @if($tasks->count() > 0)
            <ul role="list" class="divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <li>
                        <div class="px-4 py-4 flex items-center sm:px-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                <div class="truncate">
                                    <div class="flex text-sm">
                                        <p class="font-medium {{ $task->is_completed ? 'text-gray-400 line-through' : 'text-indigo-600' }} truncate">
                                            {{ $task->title }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <p>{{ Str::limit($task->description, 50) ?? 'No description' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5 flex space-x-2">
                                    <div class="flex items-center text-sm text-gray-500 mr-4">
                                        <!-- Status Badge -->
                                        @if($task->is_completed)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @endif
                                    </div>
                                    <a href="{{ route('tasks.show', $task) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        View
                                    </a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No tasks</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new task.</p>
                <div class="mt-6">
                    <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Task
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
@endsection
