<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Jobs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('jobs.create') }}">Create Job</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    {{-- create a table --}}
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">ID
                                </th>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">
                                    Title</th>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">
                                    Description</th>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">
                                    Salary</th>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">
                                    Location</th>
                                <th scope="col" class="text-left px-6 py-3 border-b text-xs uppercase font-medium">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($jobs) --}}
                            @foreach ($jobs as $job)
                                <tr class="border-b">
                                    <th scope="row" class="text-left px-6 py-3">{{ $loop->iteration }}</th>
                                    <td class="text-left px-6 py-3">{{ $job->title }}</td>
                                    <td class="text-left px-6 py-3">{{ $job->description }}</td>
                                    <td class="text-left px-6 py-3">R {{ $job->salary }}</td>
                                    <td class="text-left px-6 py-3">{{ $job->location }}</td>
                                    <td class="text-left px-6 py-3">
                                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
