<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/job/{{ $job['id'] }}" class="hover:text-blue-500 hover:underline">
                    <div class="flex">
                        <p class="font-bold">{{ $job['title'] }}</p>
                        : Pays {{ $job['salary'] }} per year.
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
