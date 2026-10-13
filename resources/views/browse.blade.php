@extends('frontend.app')

@section('content')
<section class="browse-events-page">
    <div class="browse-events-shell">
        <header class="browse-events-header">
            <h1>Available Pets</h1>
            <span></span>
        </header>

        <form method="GET" action="{{ route('browse.pets') }}" class="browse-search">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search pets by name or type..." aria-label="Search pets">
            <select name="species" aria-label="Species">
                <option value="">All species</option>
                @foreach($types as $t)<option value="{{ $t }}" {{ request('species') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>@endforeach
            </select>
            <button type="submit"><i class="fas fa-magnifying-glass"></i> Find Pets</button>
        </form>

        <div class="browse-pet-list">
        @forelse($pets as $pet)
            <article class="browse-pet-row">
                <div class="browse-pet-age"><span>{{ strtoupper(substr($pet->species ?: 'PET', 0, 3)) }}</span><strong>{{ $pet->age }}</strong><small>yrs</small></div>
                <div class="browse-pet-info">
                    <p class="browse-pet-meta"><i class="fa-regular fa-calendar"></i> Available now</p>
                    <h2>{{ $pet->name }}</h2>
                    <p class="browse-pet-location"><i class="fa-solid fa-location-dot"></i> {{ ucfirst($pet->species ?: 'Pet') }} · {{ ucfirst($pet->gender ?: 'Unknown') }}</p>
                    <p class="browse-pet-description">{{ $pet->description ?: ($pet->name . ' is looking for a loving new home.') }}</p>
                    @if(in_array($pet->availability, ['sale', 'both']))<p class="browse-pet-price">KSH {{ number_format($pet->price ?? 0) }}</p>@endif
                    <div class="browse-pet-actions">
                        <button type="button" onclick="openPetDetails({{ $pet->id }})" class="browse-outline-button">View Details</button>
                        @if(in_array($pet->availability, ['adoption', 'both']))<button type="button" onclick="openTermsModal('adopt', {{ $pet->id }})" class="browse-primary-button">Adopt Me</button>@endif
                        @if(in_array($pet->availability, ['sale', 'both']))<button type="button" onclick="openTermsModal('buy', {{ $pet->id }})" class="browse-primary-button">Buy Me</button>@endif
                    </div>
                </div>
                <div class="browse-pet-image">
                    <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}" alt="{{ $pet->name }}" onerror="this.src='https://placehold.co/600x400?text=Pet+Image'">
                    <button onclick="toggleFavorite(event, {{ $pet->id }})" class="browse-favorite" data-pet-id="{{ $pet->id }}" aria-label="Favorite">
                        @php $isFavorited = auth()->check() && auth()->user()->favoritePets->contains($pet->id); @endphp
                        <svg class="w-4 h-4 {{ $isFavorited ? 'text-red-500' : 'text-gray-500' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                </div>
            </article>
        @empty
            <div class="browse-empty"><i class="fas fa-paw"></i><p>No pets found. Try another search.</p></div>
        @endforelse
        </div>

        <div class="browse-pagination">{{ $pets->links() }}</div>
    </div>
</section>

<style>
@import url('https://fonts.googleapis.com/css2?family=Chewy&family=Nunito:wght@400;600;700;800&display=swap');
.browse-events-page{min-height:100vh;background:#fff1d3;padding:30px 20px 60px;color:#111}.browse-events-shell{max-width:722px;margin:auto}.browse-events-header{text-align:center;margin:0 0 25px}.browse-events-header h1{margin:0;font:39px/1 Chewy,cursive}.browse-events-header span{display:block;width:37px;height:3px;background:#ff7114;margin:8px auto}.browse-search{height:37px;background:#fff;border:1px solid #e2dbd0;border-radius:999px;box-shadow:0 1px 2px rgba(50,35,15,.08);display:flex;align-items:center;overflow:hidden;margin-bottom:27px}.browse-search input{height:100%;min-width:0;flex:1;border:0;background:transparent;padding:0 16px;outline:0;color:#29354b;font:10px Nunito,sans-serif}.browse-search select{height:100%;max-width:110px;border:0;border-left:1px solid #eee3d3;background:#fff;padding:0 8px;outline:0;color:#4d5360;font:10px Nunito,sans-serif}.browse-search button,.browse-primary-button{border:0;border-radius:999px;background:#ff7114;color:#fff;font:800 10px Nunito,sans-serif;cursor:pointer}.browse-search button{height:31px;padding:0 18px;margin-right:3px}.browse-pet-list{border-top:1px solid #ffbd78}.browse-pet-row{display:grid;grid-template-columns:61px 1fr 180px;gap:19px;padding:29px 10px 24px;border-bottom:1px solid #ffd59f;min-height:167px}.browse-pet-age{border-right:1px solid #ffb465;text-align:left;font-family:Nunito,sans-serif;display:flex;flex-direction:column;align-items:flex-start}.browse-pet-age span{font-size:9px;color:#555}.browse-pet-age strong{font-size:22px;line-height:23px}.browse-pet-age small{font-size:9px}.browse-pet-info{font-family:Nunito,sans-serif}.browse-pet-meta{margin:0 0 5px;color:#6c7483;font-size:9px}.browse-pet-meta i,.browse-pet-location i{color:#ff7114;margin-right:4px}.browse-pet-info h2{margin:0 0 4px;font:18px/20px Chewy,cursive}.browse-pet-location,.browse-pet-description,.browse-pet-price{margin:0 0 8px;color:#303b53;font:10px/15px Nunito,sans-serif}.browse-pet-description{max-width:380px}.browse-pet-price{font-weight:800;color:#111}.browse-pet-actions{display:flex;gap:7px}.browse-primary-button,.browse-outline-button{height:27px;padding:0 14px}.browse-outline-button{border:1px solid #ff7114;border-radius:999px;background:transparent;color:#e8630a;font:800 10px Nunito,sans-serif;cursor:pointer}.browse-pet-image{position:relative;width:180px;height:160px;overflow:hidden;border-radius:9px;box-shadow:0 2px 4px rgba(65,48,20,.18)}.browse-pet-image img{width:100%;height:100%;object-fit:cover}.browse-favorite{position:absolute;right:7px;top:7px;width:28px;height:28px;border:0;border-radius:50%;background:#fff;display:grid;place-items:center;cursor:pointer}.browse-empty{padding:60px;text-align:center;font:600 14px Nunito,sans-serif}.browse-empty i{font-size:30px;color:#ff7114}.browse-pagination{margin-top:25px;display:flex;justify-content:center}.browse-pagination nav{font:12px Nunito,sans-serif}body:has(.browse-events-page){margin:0;background:#fff}body:has(.browse-events-page) nav{height:34px;background:#fff1d3!important;border-bottom:1px solid rgba(170,139,90,.16)!important;box-shadow:none!important;position:static!important}body:has(.browse-events-page) nav>.page-container{max-width:280px;padding:0;margin:auto}body:has(.browse-events-page) nav>.page-container>div{height:33px;justify-content:center}body:has(.browse-events-page) nav>.page-container>div>a,body:has(.browse-events-page) nav>.page-container>div>div:nth-child(3){display:none!important}body:has(.browse-events-page) nav>.page-container>div>div:nth-child(2){display:flex!important;height:100%;gap:20px}body:has(.browse-events-page) nav>.page-container>div>div:nth-child(2) a{height:100%;display:inline-flex;align-items:center;color:#151515!important;text-decoration:none;font:600 10px Nunito,sans-serif}body:has(.browse-events-page) nav>.page-container>div>div:nth-child(2) a:nth-child(3){border:1px solid #ff7114;border-radius:3px;color:#ff7114!important;height:24px;align-self:center;padding:0 3px}body:has(.browse-events-page) footer{display:none!important}@media(max-width:600px){.browse-pet-row{grid-template-columns:44px 1fr;gap:12px}.browse-pet-image{grid-column:2;width:100%;max-width:250px;height:180px;order:3}.browse-search select{display:none}.browse-events-page{padding:28px 14px}.browse-events-header h1{font-size:34px}}
</style>
<script>document.addEventListener('DOMContentLoaded',function(){var links=document.querySelectorAll('nav a');if(links.length){links[3].textContent='Events';links[links.length-1].textContent='Contact Us';}});</script>

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
                   class="btn-accent flex-1 !py-4 text-lg hidden">
                    <i class="fas fa-paw"></i> Adopt Pet
                </button>
                <button id="buyBtnModal" onclick="openTermsModalFromDetails('buy', currentDetailPetId)"
                   class="btn-primary flex-1 !py-4 text-lg hidden">
                    <i class="fas fa-credit-card"></i> Buy Pet
                </button>
            </div>
            <button onclick="closePetDetails()"
               class="btn-outline w-full !py-3">
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
                   class="btn-outline flex-1 !py-3">
                    Cancel
                </button>
                <button onclick="proceedWithAction()"
                   id="proceedBtn"
                   class="btn-primary flex-1 !py-3"
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
    if (pet.vaccinated === 'yes') healthStatus.push('âœ“ Vaccinated');
    if (pet.neutered_spayed === 'yes') healthStatus.push('âœ“ Neutered/Spayed');
    
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

