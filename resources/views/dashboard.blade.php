<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7x1 mt-4">
        <div class="flex mb-4">
            @foreach ($stripe_plans as $item)           
            <div class="md:w-1/2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                        <h2 class="text-4xl">Plan</h2>
                        <h4 class="text-xl mt-5">{{ number_format($item['amount'] / 100,2) }}{{ $item['currency'] }} / {{ $item['interval'] }}</h4>
                        <form action="{{ route('pay') }}" method="GET" class="mt-15">
                            <input type="hidden" name="id" value="{{ base64_encode($item['id']) }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
