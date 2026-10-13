@extends('frontend.app')

@section('content')

<div class="min-h-screen bg-gray-50">

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-700 via-blue-600 to-blue-800 py-20 md:py-28 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-amber-400/20 rounded-full animate-float"></div>
        </div>

        <div class="page-container text-center relative z-10">
            <div class="max-w-5xl mx-auto">

                <!-- Pet Icons -->
                <div class="flex justify-center space-x-8 mb-10">
                    <span class="text-6xl inline-block animate-bounce transform hover:scale-110 transition-transform duration-300">🐶</span>
                    <span class="text-6xl inline-block animate-bounce transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.3s;">🐱</span>
                    <span class="text-6xl inline-block animate-bounce transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.6s;">🐰</span>
                    <span class="text-6xl inline-block animate-bounce transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.9s;">🐦</span>
                </div>

                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight text-white">
                    Find Your Perfect
                    <span class="block text-amber-400">Furry Friend</span>
                </h1>

                <p class="text-xl md:text-2xl mb-10 text-blue-50 max-w-3xl mx-auto leading-relaxed font-medium">
                    Adopt, and shop — give a homeless pet a loving home and discover unconditional love <i class="fas fa-heart"></i>
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                    <a href="{{ route('browse.pets') }}"
                       class="group bg-white text-blue-700 px-10 py-4 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-3 min-w-[260px]">
                        <i class="fas fa-paw text-xl group-hover:rotate-12 transition-transform duration-300"></i>
                        Browse Available Pets
                    </a>
                    <a href="#adoption-process"
                       class="group bg-white/10 backdrop-blur-lg border-2 border-white/60 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-3 min-w-[260px]">
                        <i class="fas fa-circle-play text-xl group-hover:scale-110 transition-transform duration-300"></i>
                        How to Adopt
                    </a>
                </div>

                <!-- Stats Section -->
                <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-8 md:p-10 max-w-5xl mx-auto shadow-2xl">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach([
                            ['num' => '2,500+', 'label' => 'Pets Adopted'],
                            ['num' => '98%', 'label' => 'Success Rate'],
                            ['num' => '150+', 'label' => 'Rescue Partners'],
                            ['num' => '24/7', 'label' => 'Support'],
                        ] as $stat)
                        <div class="text-center">
                            <div class="text-4xl md:text-5xl font-black text-blue-600 mb-1">{{ $stat['num'] }}</div>
                            <div class="text-gray-600 font-semibold tracking-wide">{{ $stat['label'] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Pets Spotlight -->
    <section class="py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Featured Pets of the Week</h2>
                <p class="section-subtitle mx-auto">
                    These adorable pets are looking for their forever homes. Could one of them be your perfect match?
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Max', 'type' => 'Golden Retriever', 'age' => '2 years', 'location' => 'New York', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80', 'description' => 'Friendly and energetic, loves playing fetch and cuddles'],
                    ['name' => 'Luna', 'type' => 'Siamese Cat', 'age' => '1.5 years', 'location' => 'Chicago', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80', 'description' => 'Playful and curious, gets along well with other pets'],
                    ['name' => 'Coco', 'type' => 'Rabbit', 'age' => '8 months', 'location' => 'Los Angeles', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80', 'description' => 'Gentle and affectionate, loves fresh vegetables and hay']
                ] as $pet)
                <div class="group card overflow-hidden hover:-translate-y-1">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $pet['img'] }}" alt="{{ $pet['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4 badge-adopt shadow">Featured</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="text-2xl font-black text-gray-900">{{ $pet['name'] }}</h3>
                                <p class="text-gray-500 font-medium">{{ $pet['type'] }} • {{ $pet['age'] }}</p>
                            </div>
                            <p class="text-gray-500 text-sm font-medium flex items-center gap-1">
                                <i class="fas fa-location-dot text-blue-500"></i> {{ $pet['location'] }}
                            </p>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ $pet['description'] }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('browse.pets') }}" class="btn-accent">
                                <i class="fas fa-heart"></i> Adopt Me
                            </a>
                            <div class="flex gap-2">
                                <button class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center hover:bg-blue-100 transition-colors duration-300">
                                    <i class="fas fa-share-nodes text-blue-600"></i>
                                </button>
                                <button class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center hover:bg-blue-100 transition-colors duration-300">
                                    <i class="far fa-heart text-blue-600"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('browse.pets') }}" class="btn-primary">
                    <i class="fas fa-magnifying-glass"></i>
                    View All Available Pets
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Pet Preview -->
    <section class="py-16 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Quick Peek at Our Pets</h2>
                <p class="section-subtitle mx-auto">
                    Take a quick look at some of our adorable pets waiting for their forever homes
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-12">
                @foreach([
                    ['name' => 'Buddy', 'type' => 'Golden Retriever', 'img' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80'],
                    ['name' => 'Luna', 'type' => 'Domestic Cat', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80'],
                    ['name' => 'Max', 'type' => 'Beagle', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80'],
                    ['name' => 'Coco', 'type' => 'Rabbit', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80'],
                    ['name' => 'Rio', 'type' => 'Parrot', 'img' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'],
                    ['name' => 'Sky', 'type' => 'Husky', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80']
                ] as $pet)
                <div class="group card p-4 hover:-translate-y-1 text-center">
                    <div class="relative mb-4">
                        <div class="w-24 h-24 mx-auto rounded-2xl overflow-hidden border-4 border-blue-100 group-hover:border-blue-400 transition-all duration-300">
                            <img src="{{ $pet['img'] }}" alt="{{ $pet['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-heart text-white text-xs"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1">{{ $pet['name'] }}</h4>
                    <p class="text-gray-500 text-sm">{{ $pet['type'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('browse.pets') }}" class="btn-primary">
                    <i class="fas fa-paw"></i>
                    Meet All Our Pets
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Pet Services -->
    <section class="py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Our Pet Services</h2>
                <p class="section-subtitle mx-auto">
                    We offer comprehensive services to ensure the health and happiness of your new companion
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'syringe', 'title' => 'Vaccinations', 'desc' => 'Complete vaccination protocols for all adopted pets', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80'],
                    ['icon' => 'user-doctor', 'title' => 'Health Checkups', 'desc' => 'Thorough health examinations by certified veterinarians', 'img' => 'https://images.unsplash.com/photo-1579168765467-3b235f938439?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80'],
                    ['icon' => 'paw', 'title' => 'Training Support', 'desc' => 'Behavioral training resources for new pet parents', 'img' => 'https://images.unsplash.com/photo-1558788353-f76d92427f16?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80'],
                    ['icon' => 'house', 'title' => 'Home Delivery', 'desc' => 'Safe transport of your new pet directly to your home', 'img' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80']
                ] as $service)
                <div class="group card overflow-hidden hover:-translate-y-1">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ $service['img'] }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-{{ $service['icon'] }} text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-900 mb-2">{{ $service['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $service['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Adopt -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Why Adopt from PetPals?</h2>
                <p class="section-subtitle mx-auto">
                    We connect loving families with pets in need, creating lifelong bonds and saving lives every day.
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

    <!-- Pet Categories -->
    <section class="py-20">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Find By Category</h2>
                <p class="section-subtitle mx-auto">
                    Explore pets by category to find your perfect match
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'dog', 'title' => 'Dogs', 'count' => '245', 'iconBg' => 'bg-blue-600', 'badge' => 'bg-blue-100 text-blue-700 group-hover:bg-blue-200', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80'],
                    ['icon' => 'cat', 'title' => 'Cats', 'count' => '189', 'iconBg' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 group-hover:bg-green-200', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80'],
                    ['icon' => 'paw', 'title' => 'Small Pets', 'count' => '67', 'iconBg' => 'bg-blue-600', 'badge' => 'bg-blue-100 text-blue-700 group-hover:bg-blue-200', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80'],
                    ['icon' => 'dove', 'title' => 'Birds', 'count' => '42', 'iconBg' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 group-hover:bg-green-200', 'img' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80']
                ] as $category)
                <div class="group card overflow-hidden hover:-translate-y-1 cursor-pointer">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ $category['img'] }}" alt="{{ $category['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 {{ $category['iconBg'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 -mt-12 relative z-10 border-4 border-white">
                            <i class="fas fa-{{ $category['icon'] }} text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-900 mb-1">{{ $category['title'] }}</h3>
                        <p class="text-gray-500 font-semibold mb-4 text-sm">{{ $category['count'] }} Pets Available</p>
                        <span class="badge {{ $category['badge'] }} transition-colors duration-300">
                            Explore Now
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pet Care Resources -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
                <h2 class="section-title mb-4">Pet Care Resources</h2>
                <p class="section-subtitle mx-auto">
                    Helpful guides and articles to ensure you provide the best care for your new pet
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['title' => 'Preparing Your Home for a New Pet', 'excerpt' => 'Learn how to create a safe and welcoming environment for your new furry family member.', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80', 'read_time' => '5 min read'],
                    ['title' => 'Nutrition Guide for Different Life Stages', 'excerpt' => 'Understand the dietary needs of pets at various stages of their lives for optimal health.', 'img' => 'https://images.unsplash.com/photo-1579168765467-3b235f938439?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80', 'read_time' => '8 min read'],
                    ['title' => 'Training Tips for First-Time Pet Owners', 'excerpt' => 'Essential training techniques to build a strong bond with your new companion.', 'img' => 'https://images.unsplash.com/photo-1558788353-f76d92427f16?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80', 'read_time' => '6 min read']
                ] as $resource)
                <div class="group card overflow-hidden hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $resource['img'] }}" alt="{{ $resource['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <span class="badge-buy mb-4">{{ $resource['read_time'] }}</span>
                        <h3 class="text-lg font-black text-gray-900 mb-3">{{ $resource['title'] }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ $resource['excerpt'] }}</p>
                        <a href="#" class="group text-blue-600 font-bold hover:text-blue-700 transition-colors duration-300 inline-flex items-center gap-2">
                            Read More
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="#" class="btn-primary">
                    <i class="fas fa-book-open"></i>
                    View All Resources
                </a>
            </div>
        </div>
    </section>

    <!-- Adoption Process -->
    <section id="adoption-process" class="py-20">
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
                        <div class="w-24 h-24 bg-blue-50 rounded-3xl flex items-center justify-center mx-auto group-hover:bg-blue-100 transition-all duration-300 shadow-sm group-hover:scale-110">
                            <span class="text-blue-600 font-black text-3xl">{{ $step['num'] }}</span>
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
                <a href="{{ route('browse.pets') }}" class="btn-accent">
                    <i class="fas fa-circle-play text-lg"></i>
                    Start Your Adoption Journey
                </a>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="py-20 bg-white">
        <div class="page-container">
            <div class="text-center mb-14">
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

    <!-- Newsletter -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-700">
        <div class="page-container text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-white">
                    Stay Updated
                </h2>
                <p class="text-lg mb-8 text-blue-100 leading-relaxed">
                    Subscribe to our newsletter for the latest pet arrivals, adoption stories, and care tips.
                </p>

                <form class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 flex flex-col md:flex-row gap-4">
                    <input type="email" placeholder="Enter your email address"
                           class="flex-grow px-5 py-3 rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-white">
                    <button type="submit" class="bg-amber-400 text-gray-900 px-6 py-3 rounded-xl font-bold hover:bg-amber-500 transition-all duration-300">
                        Subscribe Now
                    </button>
                </form>
                <p class="text-blue-100 mt-4 text-sm">
                    We respect your privacy. Unsubscribe at any time.
                </p>
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
                    ['icon' => 'award', 'text' => 'Verified Shelters']
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
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
.animate-float {
    animation: float 6s ease-in-out infinite;
}
</style>

@endsection
