<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Success') }}
        </h2>
    </x-slot>
    <div class="max-w-7x1 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h2 class="text-3xl">Only Subscribed users can access this page!</h2>
                <div class="flex">
                    <div class="md:w-1/2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                            <img src="{{ asset('img/sub.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                            <p class="text-lg font-semibold pt-15">You have successfully subscribed to the plan of {{ number_format($plan['amount'] / 100,2) }}{{ $plan['currency'] }} / {{ $plan['interval'] }}</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('dashboard') }}" class=" mt-15 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Change Plan
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
