@extends('frontend.app')

@section('content')

<div class="min-h-screen bg-gray-50">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#fffaf5]">
        <div class="mx-auto grid min-h-[520px] w-full max-w-[1250px] items-center gap-8 px-5 py-10 md:grid-cols-2 md:gap-10 md:px-8 md:py-8 xl:max-w-[1040px] xl:grid-cols-[610px_400px] xl:gap-[30px] xl:px-0">
            <div class="max-w-[610px] py-2 md:py-4">
                <p class="mb-5 inline-flex items-center gap-2 rounded-full bg-[#ffebe2] px-4 py-2 text-sm font-bold text-[#d95d3f]">
                    Better Care <span aria-hidden="true">•</span> Happier Pets
                </p>
                <h1 class="mb-5 text-4xl font-black leading-[1.08] text-slate-900 sm:text-5xl xl:text-[50px]">
                    Everything your pet<br>
                    needs, <span class="text-[#ef704d]">all in one place.</span>
                </h1>
                <p class="mb-6 max-w-[510px] text-base leading-7 text-slate-600 sm:text-lg">
                    Meet your new best friend and find the care, guidance, and essentials to help them feel right at home.
                </p>
                <div class="flex flex-col gap-3 sm:flex-row sm:gap-4">
                    <a href="{{ route('browse.pets') }}" class="inline-flex min-h-12 items-center justify-center gap-3 rounded-full bg-[#ef704d] px-8 py-3 font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#df5d3c]">
                        Browse Pets <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('browse.pets') }}" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#ef704d] px-8 py-3 font-bold text-[#d95d3f] transition hover:bg-[#fff0e9]">
                        Adopt a Pet
                    </a>
                </div>

                <div class="mt-8 grid max-w-[590px] grid-cols-1 gap-4 border-t border-[#eadfd7] pt-5 sm:grid-cols-3 sm:gap-2">
                    <div class="flex items-center gap-3 text-sm text-slate-700 sm:border-r sm:border-[#eadfd7] sm:pr-2">
                        <i class="fas fa-shield-heart text-xl text-[#ef704d]" aria-hidden="true"></i>
                        <span><strong class="block font-bold">Thoughtful matching</strong><span class="text-slate-500">Find your right fit</span></span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-700 sm:border-r sm:border-[#eadfd7] sm:px-2">
                        <i class="fas fa-paw text-xl text-[#ef704d]" aria-hidden="true"></i>
                        <span><strong class="block font-bold">Pets come first</strong><span class="text-slate-500">Care at every step</span></span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-700 sm:pl-2">
                        <i class="fas fa-heart text-xl text-[#ef704d]" aria-hidden="true"></i>
                        <span><strong class="block font-bold">A better beginning</strong><span class="text-slate-500">Love starts here</span></span>
                    </div>
                </div>
            </div>

            <div class="relative isolate mx-auto h-[440px] w-full max-w-[650px] bg-[#fffaf5] md:h-[460px] xl:mx-0 xl:h-[500px] xl:w-full xl:max-w-none">
                <img
                    src="{{ asset('images/pet-hero.jpg') }}"
                    alt="A playful puppy and kitten cuddled together beneath a blanket"
                    class="hero-photo-blend relative z-10 h-full max-w-full object-contain object-left"
                >
            </div>
        </div>
    </section>

    <!-- Pet Shop Categories and Featured Products -->
    <section class="bg-white py-12 sm:py-14">
        <div class="page-container max-w-7xl">
            <div class="mb-6 flex items-end justify-between gap-4">
                <div>
                    <p class="mb-1 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">Shop by category</p>
                    <h2 class="text-2xl font-black text-slate-900 sm:text-3xl">Explore Our Categories</h2>
                </div>
                <a href="{{ route('browse.pets') }}" class="mb-1 inline-flex shrink-0 items-center gap-2 text-sm font-bold text-[#df6546] hover:text-[#bb4c31]">
                    View All <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach([
                    ['name' => 'Dogs', 'href' => route('browse.pets', ['search' => 'dog']), 'image' => asset('images/categories/dogs.jpg'), 'fit' => 'object-cover'],
                    ['name' => 'Cats', 'href' => route('browse.pets', ['search' => 'cat']), 'image' => asset('images/categories/cats.jpg'), 'fit' => 'object-cover'],
                    ['name' => 'Food', 'href' => '#product-vitalpet', 'image' => asset('images/categories/food.jpg'), 'fit' => 'object-contain p-2'],
                    ['name' => 'Toys', 'href' => '#product-rope-toy', 'image' => asset('images/categories/toys.png'), 'fit' => 'object-cover'],
                    ['name' => 'Grooming', 'href' => route('contact'), 'image' => asset('images/categories/grooming.jpg'), 'fit' => 'object-contain p-1'],
                ] as $category)
                <a href="{{ $category['href'] }}" class="group overflow-hidden rounded-lg border border-gray-100 bg-white transition hover:border-[#f3c0af] hover:shadow-sm">
                    <div class="h-32 overflow-hidden bg-[#faf7f3] sm:h-36">
                        <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="h-full w-full {{ $category['fit'] }} transition duration-300 group-hover:scale-105">
                    </div>
                    <div class="flex items-center justify-between px-3 py-3">
                        <span class="font-bold text-slate-900">{{ $category['name'] }}</span>
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#df6546]">Shop Now <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                    </div>
                </a>
                @endforeach
            </div>

            <div id="featured-products" class="mb-6 mt-11 flex items-end justify-between gap-4 border-t border-gray-100 pt-8">
                <div>
                    <p class="mb-1 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">Featured products</p>
                    <h2 class="text-2xl font-black text-slate-900 sm:text-3xl">Top Picks for Your Pets</h2>
                </div>
                <a href="{{ route('contact') }}" class="mb-1 inline-flex shrink-0 items-center gap-2 text-sm font-bold text-[#df6546] hover:text-[#bb4c31]">
                    Product Enquiries <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach([
                    ['id' => 'product-dog-food', 'name' => 'Chunky Adult Dog Food', 'detail' => 'Adult dog nutrition with real meat.', 'image' => asset('images/products/dog-food.jpg')],
                    ['id' => 'product-vitalpet', 'name' => 'VitalPet Adult Dog Food', 'detail' => 'Complete food for adult dogs.', 'image' => asset('images/products/pet-food.jpg')],
                    ['id' => 'product-pet-bed', 'name' => 'Cozy Pet Bed', 'detail' => 'A soft, supportive place to rest.', 'image' => asset('images/products/pet-bed.jpg')],
                    ['id' => 'product-rope-toy', 'name' => 'Rope Toy Set', 'detail' => 'Colorful toys for play and chewing.', 'image' => asset('images/products/rope-toy.jpg')],
                ] as $product)
                <article id="{{ $product['id'] }}" class="flex h-full flex-col overflow-hidden rounded-lg border border-gray-100 bg-white transition hover:border-[#f3c0af] hover:shadow-sm">
                    <div class="flex h-52 shrink-0 items-center justify-center overflow-hidden bg-[#faf8f5] p-3">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="h-full w-full object-contain">
                    </div>
                    <div class="flex flex-1 flex-col p-4">
                        <p class="mb-1 text-xs font-semibold uppercase tracking-wide text-[#d9795b]">Pet essentials</p>
                        <h3 class="mb-1 min-h-12 text-base font-extrabold text-slate-900">{{ $product['name'] }}</h3>
                        <p class="min-h-10 text-sm leading-5 text-slate-600">{{ $product['detail'] }}</p>
                        <a href="{{ route('contact') }}" class="mt-auto inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#ef704d] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#df5d3c]">
                            Enquire <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Adoption Spotlight -->
    <section class="bg-[#fffaf5] py-12 sm:py-14">
        <div class="page-container max-w-7xl">
            <div class="grid items-center gap-7 lg:grid-cols-[240px_minmax(0,1fr)] lg:gap-8">
                <div class="relative flex h-full flex-col justify-center py-2">
                    <p class="mb-2 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">Adoption</p>
                    <h2 class="mb-3 text-3xl font-black leading-tight text-slate-900">Adopt a Friend</h2>
                    <p class="mb-5 max-w-sm text-sm leading-6 text-slate-600">
                        Give a loving home to a pet in need. Find your perfect companion and make a difference.
                    </p>
                    <a href="{{ route('browse.pets') }}" class="inline-flex w-fit items-center gap-2 rounded-full bg-[#ef704d] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#df5d3c]">
                        View All Pets <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                    </a>
                    <div class="mt-5 hidden items-center gap-2 text-[#ef704d]/60 sm:flex lg:absolute lg:-bottom-4 lg:right-0 lg:translate-x-5">
                        <i class="fas fa-paw text-3xl" aria-hidden="true"></i>
                        <span class="-rotate-6 font-semibold italic text-slate-600">Adopt, don't shop</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($availablePets as $pet)
                        @php
                            $petImage = $pet->image_url
                                ? (str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url))
                                : asset('images/pet-hero.jpg');
                            $petType = $pet->species ?: optional($pet->petType)->name ?: 'Pet';
                        @endphp
                        <article class="overflow-hidden rounded-lg border border-[#eee8e2] bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <a href="{{ route('pets.show', $pet->id) }}" class="relative block h-52 overflow-hidden bg-[#f6f2ed] sm:h-56">
                                <img src="{{ $petImage }}" alt="{{ $pet->name }}" class="h-full w-full object-cover" onerror="this.src='{{ asset('images/pet-hero.jpg') }}'">
                                <span class="absolute right-3 top-3 rounded-full bg-white/95 px-2.5 py-1 text-[11px] font-bold text-[#d96a4c]">Available</span>
                            </a>
                            <div class="p-4">
                                <h3 class="mb-1 text-lg font-extrabold text-slate-900">{{ $pet->name }}</h3>
                                <p class="text-xs text-slate-500">
                                    {{ $pet->age ? $pet->age . ' years' : 'Age not listed' }} <span aria-hidden="true">·</span> {{ $pet->breed ?: ucfirst($petType) }}
                                </p>
                                <a href="{{ route('pets.show', $pet->id) }}" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#df6546] hover:text-[#bb4c31]">
                                    Adopt Now <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                                </a>
                            </div>
                        </article>
                    @empty
                    @endforelse

                    <article class="overflow-hidden rounded-lg border border-[#eee8e2] bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <a href="{{ route('contact') }}" class="relative block h-52 overflow-hidden bg-[#f6f2ed] sm:h-56">
                            <img src="{{ asset('parrot.jpg') }}" alt="Colorful parrot perched on a branch" class="h-full w-full object-cover">
                            <span class="absolute right-3 top-3 rounded-full bg-white/95 px-2.5 py-1 text-[11px] font-bold text-[#d96a4c]">Adoption enquiry</span>
                        </a>
                        <div class="p-4">
                            <h3 class="mb-1 text-lg font-extrabold text-slate-900">Parrot</h3>
                            <p class="text-xs text-slate-500">Bird <span aria-hidden="true">·</span> Ask us about adoption</p>
                            <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#df6546] hover:text-[#bb4c31]">
                                Ask About Adoption <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-[#f1e8df] bg-[#fffaf5] py-7">
        <div class="page-container grid grid-cols-2 gap-5 md:grid-cols-4 md:gap-0">
            @foreach([
                ['icon' => 'heart', 'title' => 'Thoughtful Matching', 'detail' => 'Find your right companion'],
                ['icon' => 'shield-heart', 'title' => 'Trusted Care', 'detail' => 'Pets come first'],
                ['icon' => 'house-medical', 'title' => 'Healthy Starts', 'detail' => 'Care information that matters'],
                ['icon' => 'headset', 'title' => 'Adoption Support', 'detail' => 'Help through every step'],
            ] as $benefit)
                <div class="flex items-center gap-3 md:justify-center md:border-r md:border-[#eadfd7] md:px-4 last:md:border-r-0">
                    <i class="fas fa-{{ $benefit['icon'] }} text-xl text-[#ef704d]" aria-hidden="true"></i>
                    <div>
                        <h3 class="text-sm font-extrabold text-slate-800">{{ $benefit['title'] }}</h3>
                        <p class="mt-0.5 text-xs text-slate-500">{{ $benefit['detail'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Adoption Process -->
    <section id="adoption-process" class="bg-[#fffaf5] py-16 sm:py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Simple Adoption Process</h2>
                <p class="section-subtitle mx-auto">
                    Our 4-step process makes it easy to find and bring home your new best friend.
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['num' => '1', 'title' => 'Browse Pets', 'desc' => 'Search our database of adorable pets waiting for their forever homes.'],
                    ['num' => '2', 'title' => 'Apply Online', 'desc' => 'Fill out our adoption application form to tell us about your home.'],
                    ['num' => '3', 'title' => 'Meet & Greet', 'desc' => 'Schedule a meeting to ensure it is the perfect match for everyone.'],
                    ['num' => '4', 'title' => 'Bring Home', 'desc' => 'Complete the adoption and welcome your new family member home!'],
                ] as $step)
                <div class="text-center group relative">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 rounded-full border border-[#f3d5c8] bg-[#ffebe2] flex items-center justify-center mx-auto transition-colors duration-300 group-hover:bg-[#f9ddd1]">
                            <span class="text-[#df6546] font-black text-2xl">{{ $step['num'] }}</span>
                        </div>
                        @if($step['num'] != '4')
                        <div class="hidden md:block absolute top-10 left-1/2 w-full h-px bg-[#edcfc1] -z-10"></div>
                        @endif
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">{{ $step['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-14">
                <a href="{{ route('browse.pets') }}" class="inline-flex items-center gap-2 rounded-full bg-[#ef704d] px-6 py-3 font-bold text-white transition hover:bg-[#df5d3c]">
                    <i class="fas fa-circle-play text-lg"></i>
                    Start Your Adoption Journey
                </a>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="bg-[#fffaf5] py-16 sm:py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <p class="mb-2 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">Community stories</p>
                <h2 class="section-title mb-4">Happy Tails</h2>
                <p class="section-subtitle mx-auto">
                    Read heartwarming stories from families who found their perfect companions through PetPals.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Sarah Johnson', 'pet' => 'Charlie (Golden Retriever)', 'img' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80', 'review' => 'Adopting Charlie was the best decision we ever made. He has brought so much joy to our family. The process was smooth and the PetPals team was incredibly supportive!'],
                    ['name' => 'Michael Chen', 'pet' => 'Bella (Domestic Shorthair)', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80', 'review' => 'Bella has transformed our home with her playful energy and loving nature. The matching process was excellent - they really understood what we were looking for in a pet.'],
                    ['name' => 'Jessica Martinez', 'pet' => 'Simba & Nala (Kittens)', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80', 'review' => 'We adopted two kittens, and they have been the perfect addition to our family. The adoption counselors were so helpful in finding us the right pair. Highly recommend PetPals!']
                ] as $testimonial)
                <div class="h-full rounded-lg border border-[#eee8e2] bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-center mb-6">
                        <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}" class="w-14 h-14 rounded-full object-cover border-2 border-[#ffebe2]">
                        <div class="ml-4">
                            <h4 class="font-black text-gray-900">{{ $testimonial['name'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $testimonial['pet'] }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">"{{ $testimonial['review'] }}"</p>
                    <div class="flex text-[#ef704d]">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="border-y border-[#f1e8df] bg-[#fffaf5] py-14 sm:py-16">
        <div class="page-container text-center">
            <div class="mx-auto max-w-2xl">
                <p class="mb-2 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">PetPals updates</p>
                <h2 class="mb-4 text-3xl font-black text-slate-900 sm:text-4xl">
                    Stay Updated
                </h2>
                <p class="mb-7 text-base leading-relaxed text-slate-600 sm:text-lg">
                    Subscribe to our newsletter for the latest pet arrivals, adoption stories, and care tips.
                </p>

                <form class="flex flex-col gap-2 rounded-xl border border-[#eadfd7] bg-white p-2 shadow-sm sm:flex-row">
                    <input type="email" placeholder="Enter your email address"
                           class="min-w-0 flex-1 rounded-lg border border-transparent bg-transparent px-4 py-3 text-slate-700 placeholder:text-slate-400 focus:border-[#ef704d] focus:outline-none focus:ring-2 focus:ring-[#ef704d]/20">
                    <button type="submit" class="rounded-lg bg-[#ef704d] px-6 py-3 font-bold text-white transition hover:bg-[#df5d3c]">
                        Subscribe Now
                    </button>
                </form>
                <p class="mt-4 text-sm text-slate-500">
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="bg-[#fffaf5] py-14 sm:py-16">
        <div class="page-container text-center">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-wide text-[#ef704d]">Start your story</p>
            <h2 class="mb-4 text-3xl font-black text-slate-900 sm:text-4xl">Ready to Find Your New Best Friend?</h2>
            <p class="mx-auto mb-8 max-w-2xl leading-relaxed text-slate-600">
                Join thousands of happy families who found their perfect pet through PetPals. Start your adoption journey today!
            </p>

            <div class="mb-8 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="{{ route('browse.pets') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#ef704d] px-8 py-3 font-bold text-white transition hover:bg-[#df5d3c]">
                    <i class="fas fa-magnifying-glass"></i>
                    Browse Available Pets
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#ef704d] px-8 py-3 font-bold text-[#d95d3f] transition hover:bg-[#fff0e9]">
                    <i class="fas fa-circle-question"></i>
                    Adoption FAQs
                </a>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                @foreach([
                    ['icon' => 'shield-halved', 'text' => '100% Safe Process'],
                    ['icon' => 'clock', 'text' => '24/7 Support'],
                    ['icon' => 'award', 'text' => 'Verified Shelters']
                ] as $feature)
                <div class="flex items-center gap-2 rounded-full border border-[#eadfd7] bg-white px-4 py-2.5">
                    <i class="fas fa-{{ $feature['icon'] }} text-[#ef704d]"></i>
                    <span class="text-sm font-bold text-slate-700">{{ $feature['text'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
.animate-float {
    animation: float 6s ease-in-out infinite;
}
</style>

@endsection
