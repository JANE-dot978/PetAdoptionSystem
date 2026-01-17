@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <!-- INTRO SECTION -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-lg mb-8 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">Find Your Perfect Pet 🐾</h1>
        <p class="text-blue-50 text-sm leading-relaxed max-w-3xl mx-auto">
            Choose to adopt or buy a loving pet. We guide you through every step to ensure a safe, ethical and happy experience.
        </p>
    </div>

    <!-- SEARCH + SPECIES FILTER -->
    <form method="GET" action="{{ route('browse.pets') }}" class="bg-white p-5 rounded-xl shadow-md mb-8 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div class="md:col-span-2">
                <label class="font-semibold text-gray-700 text-sm">Search for a pet:</label>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Type a pet name or type (e.g. cats, dogs)..."
                       class="w-full border border-gray-300 rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       oninput="this.form.submit()">
            </div>

            <div>
                <label class="font-semibold text-gray-700 text-sm">Type</label>
                <select name="species" onchange="this.form.submit()" class="w-full border border-gray-300 rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All species</option>
                    @foreach($types as $t)
                        <option value="{{ $t }}" {{ request('species') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- PET GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 auto-rows-max">

        @forelse($pets as $pet)
            <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100 flex flex-col" style="height: 450px; min-height: 450px; max-height: 450px;">

                <!-- IMAGE CONTAINER WITH OVERLAY -->
                <div class="relative overflow-hidden h-56 bg-gradient-to-br from-gray-100 to-gray-200 flex-shrink-0">
                    <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}"
                         alt="{{ $pet->name }}"
                         onerror="this.src='https://placehold.co/600x400?text=Pet+Image'"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    <!-- AVAILABILITY BADGE -->
                    <div class="absolute top-2 right-2 z-10 flex gap-1 flex-wrap justify-end">
                        @if(in_array($pet->availability, ['adoption', 'both']))
                            <span class="bg-green-500 text-white px-2 py-0.5 rounded-full text-xs font-bold shadow">
                                ADOPT
                            </span>
                        @endif
                        @if(in_array($pet->availability, ['sale', 'both']))
                            <span class="bg-blue-500 text-white px-2 py-0.5 rounded-full text-xs font-bold shadow">
                                BUY
                            </span>
                        @endif
                    </div>

                    <!-- HEART ICON (server-side favorite) -->
                    <button onclick="toggleFavorite(event, {{ $pet->id }})"
                        class="absolute top-2 left-2 z-20 bg-white rounded-full p-2 shadow hover:bg-red-50 transition duration-300"
                        data-pet-id="{{ $pet->id }}"
                        aria-label="Favorite">
                        @php
                            $isFavorited = auth()->check() && auth()->user()->favoritePets->contains($pet->id);
                        @endphp
                        <svg class="w-5 h-5 transition duration-300 {{ $isFavorited ? 'text-red-500' : 'text-gray-400' }}" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>

                <!-- CONTENT -->
                <div class="p-2 flex flex-col flex-grow overflow-hidden">
                    
                    <!-- PET NAME & TYPE -->
                    <div class="mb-1">
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition line-clamp-1">{{ $pet->name }}</h3>
                        <div class="flex items-center gap-1 mt-0.5 flex-wrap">
                            <span class="inline-block bg-blue-100 text-blue-700 px-1.5 py-0.5 rounded-full text-xs font-semibold">
                                {{ ucfirst($pet->species) }}
                            </span>
                            <span class="text-gray-500 text-xs">{{ $pet->age }}yr</span>
                        </div>
                    </div>

                    <!-- PET INFO GRID -->
                    <div class="bg-gray-50 rounded-lg p-1.5 mb-1 grid grid-cols-3 gap-0.5 text-center text-xs">
                        <div>
                            <p class="text-gray-500 font-semibold uppercase text-xs">Gender</p>
                            <p class="text-gray-900 font-bold text-xs">{{ substr(ucfirst($pet->gender), 0, 1) }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 font-semibold uppercase text-xs">Age</p>
                            <p class="text-gray-900 font-bold text-xs">{{ $pet->age }}</p>
                        </div>
                        @if(in_array($pet->availability, ['sale', 'both']))
                        <div>
                            <p class="text-gray-500 font-semibold uppercase text-xs">Price</p>
                            <p class="text-green-600 font-bold text-xs">KSH {{ $pet->price ? floor($pet->price / 1000) . 'k' : '-' }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- SHORT DESCRIPTION -->
                    @if($pet->description)
                        <p class="text-gray-600 text-xs mb-1 line-clamp-1">{{ $pet->description }}</p>
                    @endif

                    <!-- BUTTONS -->
                    <div class="space-y-0.5 mt-auto">
                        <!-- Top Row: Details Button + Side Badge -->
                        <div class="flex gap-1">
                            <button onclick="openPetDetails({{ $pet->id }})"
                               class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-1.5 rounded-lg font-bold shadow transition text-xs flex items-center justify-center gap-1">
                                👁️ Details
                            </button>
                            
                            @if(in_array($pet->availability, ['adoption', 'both']))
                                <button onclick="openTermsModal('adopt', {{ $pet->id }})"
                                   class="bg-green-500 hover:bg-green-600 text-white py-1.5 px-2 rounded-lg font-bold shadow transition text-xs whitespace-nowrap">
                                    Adopt Me
                                </button>
                            @endif

                            @if(in_array($pet->availability, ['sale', 'both']))
                                <button onclick="openTermsModal('buy', {{ $pet->id }})"
                                   class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-2 rounded-lg font-bold shadow transition text-xs whitespace-nowrap">
                                    Buy Me
                                </button>
                            @endif
                        </div>

                        <!-- Bottom Row: Full Width Adopt/Buy Buttons (if both available) -->
                        @if($pet->availability === 'both')
                            <div class="flex gap-1">
                                <button onclick="openTermsModal('adopt', {{ $pet->id }})"
                                   class="flex-1 bg-green-500 hover:bg-green-600 text-white py-1 rounded-lg font-bold shadow transition text-xs">
                                    🐾 Adopt
                                </button>
                                <button onclick="openTermsModal('buy', {{ $pet->id }})"
                                   class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-1 rounded-lg font-bold shadow transition text-xs">
                                    💳 Buy
                                </button>
                            </div>
                        @endif
                    </div>

                </div>

            </div>

        @empty
            <div class="col-span-1 md:col-span-3 lg:col-span-3 text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-xl font-bold text-gray-600">No pets found</p>
                <p class="text-gray-500 text-sm">Try adjusting your search criteria</p>
            </div>
        @endforelse

    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
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

<!-- PET DETAILS MODAL -->
<div id="petDetailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 overflow-y-auto">
    <div class="bg-white rounded-3xl shadow-2xl max-w-3xl w-full my-8">
        
        <!-- MODAL HEADER -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 flex justify-between items-center sticky top-0">
            <h2 class="text-3xl font-bold" id="petDetailsTitle">Pet Details</h2>
            <button onclick="closePetDetails()" class="text-white hover:bg-blue-800 rounded-full p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- MODAL BODY -->
        <div class="p-8 overflow-y-auto max-h-[70vh]">
            <div id="petDetailsContent">
                <!-- Content will be loaded here -->
            </div>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="bg-gray-50 p-6 border-t flex flex-col gap-3 sticky bottom-0">
            <div class="flex gap-3">
                <button id="adoptBtnModal" onclick="openTermsModalFromDetails('adopt', currentDetailPetId)"
                   class="flex-1 bg-green-500 text-white py-4 px-4 rounded-xl font-bold hover:bg-green-600 transition text-lg hidden">
                    🐾 Adopt Pet
                </button>
                <button id="buyBtnModal" onclick="openTermsModalFromDetails('buy', currentDetailPetId)"
                   class="flex-1 bg-blue-500 text-white py-4 px-4 rounded-xl font-bold hover:bg-blue-600 transition text-lg hidden">
                    💳 Buy Pet
                </button>
            </div>
            <button onclick="closePetDetails()"
               class="w-full bg-gray-400 text-white py-3 rounded-xl font-bold hover:bg-gray-500 transition">
                Close
            </button>
        </div>
    </div>
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

@endsection

<script>
let currentAction = null;
let currentPetId = null;
let currentDetailPetId = null;
let petDetailsData = {!! json_encode($pets->keyBy('id')) !!};

function toggleFavorite(event, petId) {
    event.preventDefault();
    const button = event.currentTarget;
    
    @if(!auth()->check())
        window.location.href = '{{ route("login") }}';
        return;
    @endif

    fetch(`/pets/${petId}/favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    })
    .then(res => res.json())
    .then(data => {
        const svg = button.querySelector('svg');
        if (data.favorited) {
            svg.classList.remove('text-gray-400');
            svg.classList.add('text-red-500');
        } else {
            svg.classList.remove('text-red-500');
            svg.classList.add('text-gray-400');
        }
    })
    .catch(err => console.error('Error toggling favorite:', err));
}

function openPetDetails(petId) {
    const pet = petDetailsData[petId];
    if (!pet) return;

    currentDetailPetId = petId;

    const healthStatus = [];
    if (pet.vaccinated === 'yes') healthStatus.push('✓ Vaccinated');
    if (pet.neutered_spayed === 'yes') healthStatus.push('✓ Neutered/Spayed');
    
    const detailedInfo = `
        <div class="space-y-6">
            <!-- Image -->
            <div>
                <img src="${pet.image_url && pet.image_url.includes('http') ? pet.image_url : '/storage/' + pet.image_url}" 
                     alt="${pet.name}" 
                     onerror="this.src='https://placehold.co/600x400?text=Pet+Image'"
                     class="w-full h-80 object-cover rounded-lg shadow-lg">
            </div>

            <!-- Basic Info -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg text-center">
                    <p class="text-gray-600 font-semibold text-xs uppercase">Age</p>
                    <p class="text-2xl font-bold text-gray-900">${pet.age} yrs</p>
                </div>
                <div class="bg-pink-50 p-4 rounded-lg text-center">
                    <p class="text-gray-600 font-semibold text-xs uppercase">Gender</p>
                    <p class="text-2xl font-bold text-gray-900 capitalize">${pet.gender}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg text-center">
                    <p class="text-gray-600 font-semibold text-xs uppercase">Species</p>
                    <p class="text-2xl font-bold text-gray-900 capitalize">${pet.species || 'N/A'}</p>
                </div>
                <div class="bg-yellow-50 p-4 rounded-lg text-center">
                    <p class="text-gray-600 font-semibold text-xs uppercase">Weight</p>
                    <p class="text-2xl font-bold text-gray-900">${pet.weight ? pet.weight + ' kg' : 'N/A'}</p>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                ${pet.breed ? `<div class="bg-gray-50 p-4 rounded-lg"><p class="text-gray-600 font-semibold mb-1">Breed</p><p class="text-gray-900">${pet.breed}</p></div>` : ''}
                ${pet.color ? `<div class="bg-gray-50 p-4 rounded-lg"><p class="text-gray-600 font-semibold mb-1">Color</p><p class="text-gray-900">${pet.color}</p></div>` : ''}
            </div>

            <!-- Health Status -->
            ${healthStatus.length > 0 ? `
            <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
                <p class="text-gray-600 font-semibold mb-2">Health Status</p>
                <div class="space-y-1">
                    ${healthStatus.map(status => `<p class="text-green-700 font-semibold">${status}</p>`).join('')}
                </div>
            </div>
            ` : ''}

            <!-- Special Needs -->
            ${pet.special_needs ? `
            <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg">
                <p class="text-gray-600 font-semibold mb-2">Special Needs</p>
                <p class="text-gray-900">${pet.special_needs}</p>
            </div>
            ` : ''}

            <!-- Description -->
            ${pet.detailed_description ? `
            <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                <p class="text-gray-600 font-semibold mb-2">About ${pet.name}</p>
                <p class="text-gray-900 leading-relaxed">${pet.detailed_description}</p>
            </div>
            ` : ''}

            <!-- Price -->
            ${pet.availability.includes('sale') ? `
            <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-lg border-2 border-green-300">
                <p class="text-gray-600 font-semibold mb-2">Asking Price</p>
                <p class="text-4xl font-bold text-green-700">KSH ${Number(pet.price || 0).toLocaleString()}</p>
            </div>
            ` : ''}
        </div>
    `;

    document.getElementById('petDetailsTitle').textContent = pet.name;
    document.getElementById('petDetailsContent').innerHTML = detailedInfo;
    
    // Show/hide action buttons based on availability
    const adoptBtn = document.getElementById('adoptBtnModal');
    const buyBtn = document.getElementById('buyBtnModal');
    
    if (pet.availability.includes('adoption')) {
        adoptBtn.classList.remove('hidden');
    } else {
        adoptBtn.classList.add('hidden');
    }
    
    if (pet.availability.includes('sale')) {
        buyBtn.classList.remove('hidden');
    } else {
        buyBtn.classList.add('hidden');
    }
    
    document.getElementById('petDetailsModal').classList.remove('hidden');
    document.getElementById('petDetailsModal').classList.add('flex');
}

function closePetDetails() {
    document.getElementById('petDetailsModal').classList.add('hidden');
    document.getElementById('petDetailsModal').classList.remove('flex');
    currentDetailPetId = null;
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

function openTermsModalFromDetails(action, petId) {
    // Check if user is authenticated
    @if(!auth()->check())
        window.location.href = '{{ route("login") }}';
        return;
    @endif

    closePetDetails();
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
    const detailsModal = document.getElementById('petDetailsModal');
    const termsModal = document.getElementById('termsModal');
    
    if (event.target === detailsModal) {
        closePetDetails();
    }
    if (event.target === termsModal) {
        closeTermsModal();
    }
});
</script>
