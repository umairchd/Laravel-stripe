<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Payment') }}
        </h2>
    </x-slot>
    <div class="max-w-7x1 mt-4">
        <div class="flex mb-4">
            <div class="md:w-1/3"></div>
            <div class="md:w-1/3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                        <form action="{{ route('subscription') }}" method="POST" class="mt-5" id="payment-form">
                            @csrf
                            <input type="hidden" name="stripe_plan_id" value="{{ base64_decode($req->id) }}">
                            <input type="hidden" name="payment_method" value="" id="payment_method">
                            <div id="card-element" class="mb-10"></div>
                            <div id="card-errors" role="alert"></div>
                            <a data-secret="{{ $intent->client_secret }}" id="card-button" class=" mt-10 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                Make Payment
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3"></div>
        </div>
    </div>
</x-app-layout>
