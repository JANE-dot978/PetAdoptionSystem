@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-12">

    <!-- INTRO SECTION -->
    <div class="bg-blue-50 p-8 rounded-2xl shadow mb-10 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Find Your Perfect Pet 🐾</h1>
        <p class="text-gray-700 text-lg leading-relaxed max-w-2xl mx-auto">
            Choose to adopt or buy a loving pet. We guide you through every step to ensure
            a safe, ethical and happy experience.
        </p>
    </div>

    <!-- SEARCH + SPECIES FILTER -->
    <form method="GET" action="{{ route('browse.pets') }}" class="bg-white p-6 rounded-xl shadow-md mb-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div class="md:col-span-2">
                <label class="font-semibold text-gray-700">Search for a pet:</label>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Type a pet name or type (e.g. cats, dogs)..."
                       class="w-full border rounded-lg p-3 mt-2"
                       oninput="this.form.submit()">
            </div>

            <div>
                <label class="font-semibold text-gray-700">Type</label>
                <select name="species" onchange="this.form.submit()" class="w-full border rounded-lg p-3 mt-2">
                    <option value="">All species</option>
                    @foreach($types as $t)
                        <option value="{{ $t }}" {{ request('species') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- PET GRID -->
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($pets as $pet)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 flex flex-col">

                <!-- IMAGE CONTAINER WITH OVERLAY -->
                <div class="relative overflow-hidden h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex-shrink-0">
                    <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}"
                         alt="{{ $pet->name }}"
                         onerror="this.src='https://placehold.co/600x400?text=Pet+Image'"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    <!-- AVAILABILITY BADGE -->
                    <div class="absolute top-4 right-4 z-10">
                        @if(in_array($pet->availability, ['adoption', 'both']))
                            <span class="bg-green-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                FOR ADOPTION
                            </span>
                        @elseif(in_array($pet->availability, ['sale', 'both']))
                            <span class="bg-blue-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                FOR SALE
                            </span>
                        @endif
                    </div>

                    <!-- HEART ICON -->
                    <button onclick="toggleFavorite(event, {{ $pet->id }})" 
                            class="absolute top-4 left-4 z-20 bg-white rounded-full p-3 shadow-lg hover:bg-red-50 transition duration-300">
                        <svg class="w-6 h-6 text-gray-400 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>

                <!-- CONTENT -->
                <div class="p-6 flex flex-col flex-grow">
                    
                    <!-- PET NAME & TYPE -->
                    <div class="mb-3">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $pet->name }}</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ ucfirst($pet->species) }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $pet->age }} yr{{ $pet->age > 1 ? 's' : '' }}</span>
                        </div>
                    </div>

                    <!-- PET INFO -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-center text-sm">
                            <div class="text-center flex-1">
                                <p class="text-gray-500 font-semibold uppercase text-xs">Gender</p>
                                <p class="text-gray-900 font-bold mt-1">{{ ucfirst($pet->gender) }}</p>
                            </div>
                            <div class="w-px h-6 bg-gray-200"></div>
                            <div class="text-center flex-1">
                                <p class="text-gray-500 font-semibold uppercase text-xs">Age</p>
                                <p class="text-gray-900 font-bold mt-1">{{ $pet->age }}y</p>
                            </div>
                            @if(in_array($pet->availability, ['sale', 'both']))
                            <div class="w-px h-6 bg-gray-200"></div>
                            <div class="text-center flex-1">
                                <p class="text-gray-500 font-semibold uppercase text-xs">Price</p>
                                <p class="text-green-600 font-bold mt-1">Ksh {{ number_format($pet->price) }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="space-y-3 mt-auto">

                        @if(in_array($pet->availability, ['adoption', 'both']))
                            <button onclick="openTermsModal('adopt', {{ $pet->id }})"
                               class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 rounded-lg font-bold shadow-md hover:shadow-lg transition-all duration-300 text-sm flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z"></path>
                                </svg>
                                Adopt Me
                            </button>
                        @endif

                        @if(in_array($pet->availability, ['sale', 'both']))
                            <button onclick="openTermsModal('buy', {{ $pet->id }})"
                               class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-3 rounded-lg font-bold shadow-md hover:shadow-lg transition-all duration-300 text-sm flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"></path>
                                </svg>
                                Buy Now
                            </button>
                        @endif

                    </div>

                </div>

            </div>

        @empty
            <div class="col-span-3 text-center py-16">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-2xl font-bold text-gray-600">No pets found</p>
                <p class="text-gray-500 mt-2">Try adjusting your search criteria</p>
            </div>
        @endforelse

    </div>

    <!-- TERMS AND CONDITIONS MODAL -->
    <div id="termsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-96 overflow-y-auto">
            
            <!-- MODAL HEADER -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 sticky top-0">
                <h2 class="text-2xl font-bold">Terms & Conditions</h2>
            </div>

            <!-- MODAL BODY -->
            <div class="p-8">
                <div class="space-y-4 text-gray-700 text-sm leading-relaxed">
                    <h3 class="font-bold text-lg text-gray-900">Pet Adoption & Purchase Agreement</h3>
                    
                    <div>
                        <h4 class="font-semibold text-gray-900">1. Commitment to Pet Care</h4>
                        <p>I commit to providing proper care, nutrition, shelter, and veterinary care for the pet throughout its life.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900">2. Legal Responsibility</h4>
                        <p>I take full legal responsibility for the pet and agree to comply with all local animal welfare laws and regulations.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900">3. Health & Vaccination</h4>
                        <p>I agree to maintain all required vaccinations and health checks as recommended by a veterinarian.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900">4. No Return Without Cause</h4>
                        <p>Once the transaction is finalized, the pet cannot be returned unless there are documented health issues within 7 days.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900">5. Payment Terms</h4>
                        <p>Payment must be completed before the pet is handed over. All transactions are final and non-refundable.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900">6. Liability</h4>
                        <p>PetPals is not liable for any injuries or damages caused by the pet after adoption or purchase.</p>
                    </div>
                </div>
            </div>

            <!-- MODAL FOOTER -->
            <div class="bg-gray-50 p-6 border-t flex gap-4">
                <label class="flex items-center gap-3 flex-1">
                    <input type="checkbox" id="agreeCheckbox" class="w-5 h-5 rounded">
                    <span class="text-gray-700 font-semibold">I agree to the terms and conditions</span>
                </label>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="bg-gray-50 p-6 border-t flex gap-4">
                <button onclick="closeTermsModal()"
                   class="flex-1 bg-gray-400 text-white py-3 rounded-xl font-bold hover:bg-gray-500 transition">
                    Cancel
                </button>
                <button onclick="proceedWithAction()"
                   id="proceedBtn"
                   class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                   disabled>
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="mt-12">
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                gap: 0.5rem;
                flex-wrap: wrap;
            }
            .pagination a, .pagination span {
                padding: 0.75rem 1rem;
                border-radius: 0.5rem;
                font-weight: 600;
                transition: all 0.3s;
            }
            .pagination a {
                background: white;
                border: 2px solid #e5e7eb;
                color: #1f2937;
            }
            .pagination a:hover {
                background: #3b82f6;
                color: white;
                border-color: #3b82f6;
            }
            .pagination .active span {
                background: #3b82f6;
                color: white;
                border: 2px solid #3b82f6;
            }
            .pagination .disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }
        </style>
        {{ $pets->links() }}
    </div>
</div>
@endsection

<script>
let currentAction = null;
let currentPetId = null;

function toggleFavorite(event, petId) {
    event.preventDefault();
    const button = event.currentTarget;
    const svg = button.querySelector('svg');
    svg.classList.toggle('text-gray-400');
    svg.classList.toggle('text-red-500');
    button.classList.toggle('bg-white');
    button.classList.toggle('bg-red-50');
}

function openTermsModal(action, petId) {
    // Check if user is authenticated
    @if(!auth()->check())
        window.location.href = '{{ route("login") }}';
        return;
    @endif

    currentAction = action;
    currentPetId = petId;
    document.getElementById('termsModal').classList.remove('hidden');
    document.getElementById('termsModal').classList.add('flex');
    document.getElementById('agreeCheckbox').checked = false;
    document.getElementById('proceedBtn').disabled = true;
}

function closeTermsModal() {
    document.getElementById('termsModal').classList.add('hidden');
    document.getElementById('termsModal').classList.remove('flex');
    currentAction = null;
    currentPetId = null;
}

// Enable Proceed button when checkbox is checked
document.addEventListener('DOMContentLoaded', function() {
    const agreeCheckbox = document.getElementById('agreeCheckbox');
    const proceedBtn = document.getElementById('proceedBtn');

    if (agreeCheckbox) {
        agreeCheckbox.addEventListener('change', function() {
            proceedBtn.disabled = !this.checked;
        });
    }
});

function proceedWithAction() {
    if (currentAction === 'adopt') {
        window.location.href = '{{ route("pets.process", ":id") }}'.replace(':id', currentPetId);
    } else if (currentAction === 'buy') {
        window.location.href = '{{ route("pets.process", ":id") }}'.replace(':id', currentPetId);
    }
    closeTermsModal();
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('termsModal');
    if (event.target === modal) {
        closeTermsModal();
    }
});
</script>
