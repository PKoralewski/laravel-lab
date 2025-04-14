<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>
    <h2 class="text-lg font-bold">{{ $job['title'] }}</h2>
    <p>
        This job pay {{ $job['salary'] }} per year.
    </p>
    <p class="mt-6">
        <x-link href="/jobs/{{ $job->id }}/edit">Edit Job</x-link>
    </p>
</x-layout>
