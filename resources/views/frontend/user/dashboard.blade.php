@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Left / Main -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
                <div class="flex items-center justify-between gap-6">
                    <div>
                        <h1 class="text-2xl font-bold">Welcome back, {{ auth()->user()->name }} 👋</h1>
                        <p class="text-gray-500 mt-1">Here’s a summary of your activity and recent pets.</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center bg-gray-50 rounded-xl px-4 py-3">
                            <div class="text-sm text-gray-500">Adoptions</div>
                            <div class="text-2xl font-bold">{{ $adoptions->count() }}</div>
                        </div>
                        <div class="text-center bg-gray-50 rounded-xl px-4 py-3">
                            <div class="text-sm text-gray-500">Purchases</div>
                            <div class="text-2xl font-bold">{{ $purchases->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="bg-white rounded-2xl shadow-md p-4 mb-6">
                <div class="flex gap-2 p-1 bg-gray-100 rounded-lg">
                    <button id="tab-adoptions" class="flex-1 text-sm font-semibold py-2 rounded-lg text-blue-600 bg-white shadow-sm">Adoptions</button>
                    <button id="tab-purchases" class="flex-1 text-sm font-semibold py-2 rounded-lg text-gray-600">Purchases</button>
                </div>

                <!-- Adoptions -->
                <div id="adoptions-tab" class="mt-6">
                    @if($adoptions->isEmpty())
                        <div class="text-center py-12 text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l2-2 4 4M7 10V4m0 6l2-2m8 12H7a2 2 0 01-2-2V7"/></svg>
                            <p class="font-semibold">No adoption requests yet.</p>
                            <p class="text-sm">Browse pets and submit an adoption request to see it here.</p>
                        </div>
                    @else
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($adoptions as $adoption)
                                @php $pet = $adoption->pet; @endphp
                                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                    <div class="relative h-48 bg-gray-100">
                                        <img src="{{ str_starts_with($pet->image_url ?? '', 'http') ? $pet->image_url : asset('storage/' . ($pet->image_url ?? '')) }}" alt="{{ $pet->name }}" onerror="this.src='https://placehold.co/600x400?text=Pet+Image'" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">{{ $pet->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ ucfirst($pet->species) }} • {{ $pet->age }} yrs • {{ ucfirst($pet->gender) }}</p>
                                        <div class="mt-3 flex items-center justify-between">
                                            <div>
                                                @if($adoption->status === 'pending')
                                                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-semibold">Pending</span>
                                                @elseif($adoption->status === 'approved')
                                                    <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-semibold">Approved</span>
                                                @else
                                                    <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-semibold">Rejected</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('pets.show', $pet->id) }}" class="text-sm text-blue-600 font-semibold">View pet →</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Purchases -->
                <div id="purchases-tab" class="mt-6 hidden">
                    @if($purchases->isEmpty())
                        <div class="text-center py-12 text-gray-500">
                            <p class="font-semibold">No purchases yet.</p>
                            <p class="text-sm">Complete a purchase to see it here.</p>
                        </div>
                    @else
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($purchases as $purchase)
                                @php $pet = $purchase->pet; @endphp
                                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                    <div class="relative h-48 bg-gray-100">
                                        <img src="{{ str_starts_with($pet->image_url ?? '', 'http') ? $pet->image_url : asset('storage/' . ($pet->image_url ?? '')) }}" alt="{{ $pet->name }}" onerror="this.src='https://placehold.co/600x400?text=Pet+Image'" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">{{ $pet->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ ucfirst($pet->species) }} • {{ $pet->age }} yrs • {{ ucfirst($pet->gender) }}</p>
                                        <div class="mt-3 flex items-center justify-between">
                                            <div class="text-sm font-semibold text-green-600">Purchased</div>
                                            <a href="{{ route('pets.show', $pet->id) }}" class="text-sm text-blue-600 font-semibold">View pet →</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right / Sidebar -->
        <aside>
            <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
                <h4 class="text-sm text-gray-500">Account</h4>
                <div class="mt-4 flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-gray-100 overflow-hidden">
                        <img src="{{ str_starts_with(auth()->user()->profile_photo ?? '', 'http') ? auth()->user()->profile_photo : (auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : 'https://placehold.co/200x200?text=User') }}" alt="avatar" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="font-semibold">{{ auth()->user()->name }}</div>
                        <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h4 class="text-sm text-gray-500">Quick Actions</h4>
                <div class="mt-4 grid gap-3">
                    <a href="{{ route('browse.pets') }}" class="block w-full text-center py-2 rounded-lg bg-blue-600 text-white font-semibold">Browse Pets</a>
                    <a href="{{ route('profile.edit') }}" class="block w-full text-center py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold">Edit Profile</a>
                </div>
            </div>
        </aside>
    </div>
</div>

{{-- Tabs Script --}}
<script>
    const adoptionsTab = document.getElementById('adoptions-tab');
    const purchasesTab = document.getElementById('purchases-tab');
    const tabAdoptionsBtn = document.getElementById('tab-adoptions');
    const tabPurchasesBtn = document.getElementById('tab-purchases');

    function activateTab(tab) {
        if (tab === 'adoptions') {
            document.getElementById('adoptions-tab').classList.remove('hidden');
            document.getElementById('purchases-tab').classList.add('hidden');
            tabAdoptionsBtn.classList.add('text-blue-600','bg-white');
            tabAdoptionsBtn.classList.remove('text-gray-600');
            tabPurchasesBtn.classList.remove('text-blue-600','bg-white');
            tabPurchasesBtn.classList.add('text-gray-600');
        } else {
            document.getElementById('purchases-tab').classList.remove('hidden');
            document.getElementById('adoptions-tab').classList.add('hidden');
            tabPurchasesBtn.classList.add('text-blue-600','bg-white');
            tabPurchasesBtn.classList.remove('text-gray-600');
            tabAdoptionsBtn.classList.remove('text-blue-600','bg-white');
            tabAdoptionsBtn.classList.add('text-gray-600');
        }
    }

    tabAdoptionsBtn.addEventListener('click', () => activateTab('adoptions'));
    tabPurchasesBtn.addEventListener('click', () => activateTab('purchases'));

    // default
    activateTab('adoptions');
</script>
@endsection
