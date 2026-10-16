@extends('frontend.app')

@section('content')

<div id="about-page" class="min-h-screen bg-white">

    <section class="relative overflow-hidden bg-[#fffaf5]">
        <div class="mx-auto grid min-h-[520px] w-full max-w-[1250px] items-center gap-8 px-5 py-10 md:grid-cols-2 md:gap-10 md:px-8 md:py-8 xl:max-w-[1040px] xl:grid-cols-[610px_400px] xl:gap-[30px] xl:px-0">
            <div class="max-w-[610px] py-2 md:py-4">
                <p class="mb-5 inline-flex items-center gap-2 rounded-full bg-[#ffebe2] px-4 py-2 text-sm font-bold text-[#d95d3f]">
                    <span class="h-2 w-2 rounded-full bg-[#ef704d]"></span>
                    Trusted by 10,000+ Pet Lovers
                </p>
                <h1 class="mb-5 text-4xl font-black leading-[1.08] text-slate-900 sm:text-5xl xl:text-[50px]">
                    Find Your Perfect
                    <span class="block text-[#ef704d]">Furry Friend</span>
                </h1>
                <p class="mb-6 max-w-[510px] text-base leading-7 text-slate-600 sm:text-lg">
                    Where love finds a home. Adopt, and shop — give a homeless pet a loving family and discover unconditional love.
                </p>
                <div class="flex flex-col gap-3 sm:flex-row sm:gap-4">
                    <a href="{{ route('browse.pets') }}" class="group inline-flex min-h-12 items-center justify-center gap-3 rounded-full bg-[#ef704d] px-6 py-3 font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#df5d3c]">
                        <i class="fas fa-paw" aria-hidden="true"></i>
                        Browse Available Pets
                    </a>
                    <a href="#adoption-process" class="group inline-flex min-h-12 items-center justify-center gap-3 rounded-full border border-[#ef704d] px-6 py-3 font-bold text-[#d95d3f] transition hover:bg-[#fff0e9]">
                        <i class="fas fa-circle-play" aria-hidden="true"></i>
                        How to Adopt
                    </a>
                </div>

                <div class="mt-8 grid max-w-[590px] grid-cols-2 gap-x-4 gap-y-5 border-t border-[#eadfd7] pt-5 sm:gap-x-5">
                    @foreach([
                        ['num' => '2,500+', 'label' => 'Pets Adopted'],
                        ['num' => '98%', 'label' => 'Success Rate'],
                        ['num' => '150+', 'label' => 'Rescue Partners'],
                        ['num' => '24/7', 'label' => 'Support'],
                    ] as $stat)
                    <div>
                        <div class="text-2xl font-black text-[#d95d3f]">{{ $stat['num'] }}</div>
                        <div class="text-xs font-semibold text-slate-600 sm:text-sm">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="relative isolate mx-auto h-[360px] w-full max-w-[650px] bg-[#fffaf5] md:h-[460px] xl:mx-0 xl:h-[500px] xl:w-full xl:max-w-none">
                <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=85" alt="A family spending time with their adopted dog" class="hero-photo-blend relative z-10 h-full max-w-full object-contain object-left">
            </div>
        </div>
    </section>

    <!-- Pet Categories Gallery -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Find Your Perfect Match</h2>
                <p class="section-subtitle mx-auto">
                    Explore our diverse range of pets waiting for their forever homes
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'dog', 'title' => 'Dogs', 'count' => '245 Available', 'img' => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'iconBg' => 'bg-blue-600'],
                    ['icon' => 'cat', 'title' => 'Cats', 'count' => '189 Available', 'img' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'iconBg' => 'bg-green-500'],
                    ['icon' => 'paw', 'title' => 'Small Pets', 'count' => '67 Available', 'img' => 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'iconBg' => 'bg-blue-600'],
                    ['icon' => 'dove', 'title' => 'Birds & More', 'count' => '42 Available', 'img' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'iconBg' => 'bg-green-500']
                ] as $category)
                <div class="group card overflow-hidden hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $category['img'] }}" alt="{{ $category['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 {{ $category['iconBg'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 -mt-12 relative z-10 border-4 border-white">
                            <i class="fas fa-{{ $category['icon'] }} text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-900 mb-1">{{ $category['title'] }}</h3>
                        <p class="text-gray-500 font-semibold mb-4 text-sm">{{ $category['count'] }}</p>
                        <span class="badge-buy">Explore {{ $category['title'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-20">
        <div class="page-container">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-flex items-center bg-blue-100 text-blue-700 rounded-full px-4 py-2 mb-6">
                            <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                            <span class="font-semibold text-sm">Our Mission</span>
                        </div>
                        <h2 class="section-title mb-6">
                            Creating Forever Homes for Every Pet
                        </h2>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                            At PetPals, we believe every pet deserves a loving home. Our mission is to connect compassionate families with animals in need, creating lifelong bonds that transform both human and animal lives.
                        </p>
                        <div class="space-y-4">
                            @foreach([
                                'Rescue and rehabilitate homeless animals',
                                'Provide comprehensive medical care and behavioral training',
                                'Match pets with compatible families for successful adoptions',
                            ] as $point)
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <p class="text-gray-700 flex-1">{{ $point }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative">
                        <div class="rounded-3xl p-1 shadow-2xl bg-blue-600">
                            <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 alt="Happy family with adopted pet"
                                 class="w-full h-96 object-cover rounded-3xl">
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-6 shadow-2xl border border-gray-100">
                            <div class="text-3xl font-black text-blue-600 mb-1">5+ Years</div>
                            <div class="text-gray-700 font-semibold">Of Saving Lives</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transformation Stories -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Transformation Stories</h2>
                <p class="section-subtitle mx-auto">
                    See how our rescued pets have transformed lives and found their forever homes
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['before' => 'https://images.unsplash.com/photo-1548767797-d8c844163c4c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Max', 'story' => 'Rescued from neglect, now living his best life'],
                    ['before' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Luna', 'story' => 'From stray to spoiled house cat'],
                    ['before' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Coco', 'story' => 'Rescued rabbit now enjoying a loving home']
                ] as $story)
                <div class="group card overflow-hidden hover:-translate-y-1">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-blue-600/80 z-10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <span class="text-white font-bold text-lg">Happy Ending!</span>
                        </div>
                        <img src="{{ $story['after'] }}" alt="{{ $story['name'] }} after" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-black text-gray-900 mb-2">{{ $story['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $story['story'] }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500 gap-2">
                                <span>Before</span>
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-gray-200">
                                    <img src="{{ $story['before'] }}" alt="Before" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <i class="fas fa-arrow-right text-blue-500"></i>
                            <div class="flex items-center text-sm text-gray-500 gap-2">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-green-300">
                                    <img src="{{ $story['after'] }}" alt="After" class="w-full h-full object-cover">
                                </div>
                                <span>After</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose PetPals -->
    <section class="py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Why Choose PetPals?</h2>
                <p class="section-subtitle mx-auto">
                    We're not just an adoption service - we're a community dedicated to animal welfare and successful pet placements.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'heart', 'title' => 'Save a Life', 'desc' => 'Every adoption saves a life and makes space for another animal in need. You are not just getting a pet - you are being a hero.'],
                    ['icon' => 'stethoscope', 'title' => 'Health Guaranteed', 'desc' => 'All our pets are vaccinated, spayed/neutered, microchipped, and thoroughly health screened before adoption.'],
                    ['icon' => 'hands-holding-child', 'title' => 'Lifetime Support', 'desc' => 'We provide ongoing support, training resources, and veterinary advice for the entire life of your adopted pet.'],
                ] as $benefit)
                <div class="card p-8 text-center hover:-translate-y-1">
                    <div class="w-20 h-20 bg-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-{{ $benefit['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4">{{ $benefit['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $benefit['desc'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Adoption Impact -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="page-container text-center">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-white">
                    Your Impact Matters
                </h2>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed font-medium mb-12">
                    Every adoption creates a ripple effect of positive change
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach([
                        ['number' => '1', 'title' => 'Save a Life', 'desc' => 'You directly save an animal and create space for another rescue'],
                        ['number' => '2', 'title' => 'Support Shelters', 'desc' => 'Adoption fees help fund rescue operations and medical care'],
                        ['number' => '3', 'title' => 'Inspire Others', 'desc' => 'Your adoption story encourages more people to choose rescue']
                    ] as $impact)
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                        <div class="text-6xl font-black text-white mb-4 opacity-90">{{ $impact['number'] }}</div>
                        <h3 class="text-2xl font-black text-white mb-4">{{ $impact['title'] }}</h3>
                        <p class="text-blue-100 leading-relaxed font-medium">{{ $impact['desc'] }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    <a href="#adoption-process" class="btn bg-white text-blue-700 hover:bg-blue-50 !text-lg !px-10 !py-4 shadow-xl">
                        <i class="fas fa-heart"></i>
                        Make Your Impact Today
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Meet Our Team</h2>
                <p class="section-subtitle mx-auto">
                    Passionate professionals dedicated to animal welfare and successful adoptions
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Dr. Sarah Johnson', 'role' => 'Veterinary Director', 'img' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => '10+ years of veterinary experience specializing in shelter medicine and animal rehabilitation.'],
                    ['name' => 'Michael Chen', 'role' => 'Adoption Coordinator', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => 'Matches hundreds of pets with their perfect families each year through careful screening.'],
                    ['name' => 'Jessica Martinez', 'role' => 'Animal Behaviorist', 'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => 'Specializes in rehabilitation and training for rescue animals with behavioral challenges.']
                ] as $member)
                <div class="group card p-6 text-center hover:-translate-y-1 flex flex-col h-full">
                    <div class="w-24 h-24 mx-auto rounded-2xl overflow-hidden border-4 border-blue-100 mb-6 group-hover:border-blue-300 transition-all duration-300 flex-shrink-0">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-1">{{ $member['name'] }}</h3>
                    <div class="text-blue-600 font-semibold mb-4">{{ $member['role'] }}</div>
                    <p class="text-gray-600 leading-relaxed flex-grow">{{ $member['bio'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Adoption Process -->
    <section id="adoption-process" class="py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Simple Adoption Process</h2>
                <p class="section-subtitle mx-auto">
                    Our streamlined 4-step process makes finding and bringing home your new best friend easy and enjoyable.
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['num' => '1', 'title' => 'Browse Pets', 'desc' => 'Search our database of adorable pets waiting for their forever homes.', 'icon' => 'magnifying-glass'],
                    ['num' => '2', 'title' => 'Apply Online', 'desc' => 'Fill out our adoption application form to tell us about your home.', 'icon' => 'file-lines'],
                    ['num' => '3', 'title' => 'Meet & Greet', 'desc' => 'Schedule a meeting to ensure it is the perfect match for everyone.', 'icon' => 'handshake'],
                    ['num' => '4', 'title' => 'Bring Home', 'desc' => 'Complete the adoption and welcome your new family member home!', 'icon' => 'house'],
                ] as $step)
                <div class="text-center group relative">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-blue-50 rounded-3xl flex items-center justify-center mx-auto group-hover:bg-blue-100 transition-all duration-300 shadow-sm group-hover:scale-110">
                            <i class="fas fa-{{ $step['icon'] }} text-blue-600 text-2xl"></i>
                        </div>
                        @if($step['num'] != '4')
                        <div class="hidden md:block absolute top-12 left-1/2 w-full h-1 bg-blue-100 -z-10"></div>
                        @endif
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">{{ $step['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-14">
                <a href="#" class="btn-accent">
                    <i class="fas fa-circle-play text-lg"></i>
                    Start Your Adoption Journey
                </a>
            </div>
        </div>
    </section>

    <!-- Happy Tails -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Happy Tails</h2>
                <p class="section-subtitle mx-auto">
                    Heartwarming stories from families who found their perfect companions through PetPals.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'The Johnson Family', 'pet' => 'Charlie (Golden Retriever)', 'img' => 'https://images.unsplash.com/photo-1542736667-069246bdbc6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'Adopting Charlie was the best decision we ever made. He has brought so much joy to our family. The process was smooth and the PetPals team was incredibly supportive!'],
                    ['name' => 'Michael & Alex', 'pet' => 'Bella (Domestic Shorthair)', 'img' => 'https://images.unsplash.com/photo-1511988617509-a57c8a288659?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'Bella has transformed our home with her playful energy and loving nature. The matching process was excellent - they really understood what we were looking for in a pet.'],
                    ['name' => 'The Martinez Family', 'pet' => 'Simba & Nala (Kittens)', 'img' => 'https://images.unsplash.com/photo-1579208575657-c2fccb0d1c7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'We adopted two kittens, and they have been the perfect addition to our family. The adoption counselors were so helpful in finding us the right pair. Highly recommend PetPals!']
                ] as $testimonial)
                <div class="card p-8 hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}" class="w-14 h-14 rounded-2xl object-cover border-2 border-blue-100">
                        <div class="ml-4">
                            <h4 class="font-black text-gray-900">{{ $testimonial['name'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $testimonial['pet'] }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">"{{ $testimonial['review'] }}"</p>
                    <div class="flex text-amber-400">
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

    <!-- Final CTA -->
    <section class="py-20">
        <div class="page-container text-center">
            <h2 class="section-title mb-4">Ready to Find Your New Best Friend?</h2>
            <p class="section-subtitle mx-auto mb-10">
                Join thousands of happy families who found their perfect pet through PetPals. Start your adoption journey today!
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
                <a href="{{ route('browse.pets') }}" class="btn-primary !text-lg !px-10 !py-4">
                    <i class="fas fa-magnifying-glass"></i>
                    Browse Available Pets
                </a>
                <a href="#" class="btn-outline !text-lg !px-10 !py-4">
                    <i class="fas fa-circle-question"></i>
                    Adoption FAQs
                </a>
            </div>

            <div class="flex flex-wrap justify-center gap-6">
                @foreach([
                    ['icon' => 'shield-halved', 'text' => '100% Safe Process'],
                    ['icon' => 'clock', 'text' => '24/7 Support'],
                    ['icon' => 'award', 'text' => 'Verified Shelters'],
                    ['icon' => 'heart', 'text' => 'Lifetime Guarantee']
                ] as $feature)
                <div class="flex items-center gap-2 bg-white px-5 py-3 rounded-2xl border border-gray-100 shadow-sm">
                    <i class="fas fa-{{ $feature['icon'] }} text-blue-600"></i>
                    <span class="font-bold text-gray-700">{{ $feature['text'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

<style>
#about-page > section {
    padding-top: 3rem;
    padding-bottom: 3rem;
    background-color: #fff;
    background-image: none;
}

#about-page > section:nth-of-type(odd) {
    background-color: #fffaf5;
}

#about-page > section:first-of-type {
    padding-top: 0;
    padding-bottom: 0;
}

#about-page [class~="bg-gradient-to-br"] {
    background-color: #fffaf5;
    background-image: none;
}

#about-page > section.bg-gradient-to-br {
    background-color: #fff;
}

#about-page [class~="bg-blue-600"],
#about-page [class~="bg-blue-700"],
#about-page [class~="bg-blue-800"],
#about-page [class~="bg-green-500"] {
    background-color: #ef704d;
}

#about-page [class~="bg-blue-50"],
#about-page [class~="bg-blue-100"],
#about-page [class~="bg-green-100"] {
    background-color: #ffebe2;
}

#about-page [class~="bg-white/10"] {
    background-color: #fff;
}

#about-page [class~="text-blue-600"],
#about-page [class~="text-blue-700"] {
    color: #d95d3f;
}

#about-page [class~="text-blue-50"],
#about-page [class~="text-blue-100"] {
    color: #64748b;
}

#about-page [class~="border-blue-100"],
#about-page [class~="border-blue-300"],
#about-page [class~="border-green-300"] {
    border-color: #f3c0af;
}

#about-page > section:nth-of-type(6) [class~="text-white"] {
    color: #1e293b;
}

#about-page > section:nth-of-type(6) .btn {
    background-color: #ef704d;
    color: #fff;
}

#about-page .card {
    border-radius: 8px;
    border-color: #eee8e2;
    box-shadow: none;
}

#about-page [class~="rounded-3xl"],
#about-page [class~="rounded-2xl"],
#about-page [class~="rounded-xl"] {
    border-radius: 8px;
}

#about-page .btn-primary,
#about-page .btn-accent {
    background-color: #ef704d;
    color: #fff;
}

#about-page .btn-outline {
    border-color: #ef704d;
    color: #d95d3f;
}

#about-page .badge-buy {
    background-color: #ffebe2;
    color: #d95d3f;
}
</style>

@endsection
