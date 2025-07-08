{{-- resources/views/economic-groups/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Economic Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                    <a href="{{ route('group.create') }}"
                       class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        {{ __('Add New Group') }}
                    </a>
                <table class="w-full bg-white shadow rounded">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left px-4 py-2">{{ __('Name') }}</th>
                        <th class="text-right px-4 py-2">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($groups as $group)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $group->name }}</td>
                            <td class="px-4 py-2 text-right space-x-2">
                                <a href="{{ route('group.edit', $group) }}"
                                   class="text-blue-500 hover:underline">{{ __('Edit') }}</a>

                                <form action="{{ route('group.update', $group->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('{{ __('Are you sure?') }}')"
                                            class="text-red-500 hover:underline">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">
                                {{ __('No economic groups found.') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
