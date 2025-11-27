@extends('frontend.app')

@section('content')

<!-- Set entire page background to light pink/beige -->
<div class="min-h-screen bg-gradient-to-br from-rose-50 to-amber-50">
    
    <!-- Enhanced Hero Section -->
    <section class="bg-gradient-to-br from-purple-800 via-purple-700 to-pink-700 py-20 md:py-28 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full animate-pulse"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-yellow-400/20 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-pink-500/20 rounded-full animate-ping" style="animation-delay: 0.5s;"></div>
        </div>

        <!-- Floating Pet Shapes -->
        <div class="absolute top-20 left-10 animate-float">
            <div class="w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm"></div>
        </div>
        <div class="absolute bottom-32 right-16 animate-float" style="animation-delay: 1.5s;">
            <div class="w-12 h-12 bg-yellow-400/30 rounded-full backdrop-blur-sm"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-5xl mx-auto">
                
                <!-- Animated Pet Icons -->
                <div class="flex justify-center space-x-8 mb-10">
                    <div class="animate-bounce transform hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">🐶</span>
                    </div>
                    <div class="animate-pulse transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.3s;">
                        <span class="text-6xl">🐱</span>
                    </div>
                    <div class="animate-bounce transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.6s;">
                        <span class="text-6xl">🐰</span>
                    </div>
                    <div class="animate-pulse transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.9s;">
                        <span class="text-6xl">🐦</span>
                    </div>
                </div>
                
                <h1 class="text-6xl md:text-8xl font-black mb-6 leading-tight text-black">
                    <span class="text-5xl ">Find Your Perfect</span>
                    <span class="block text-yellow-400 drop-shadow-lg text-5xl">Furry Friend</span>
                </h1>
                
                <p class="text-2xl md:text-3xl mb-10 text-black max-w-4xl mx-auto leading-relaxed font-medium">
                    Adopt, and shop — give a homeless pet a loving home and discover unconditional love ♥
                </p>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-6 mb-16">
                    <a href="{{ route('browse.pets') }}" 
                       class="group bg-gradient-to-r from-yellow-400 to-yellow-500 text-black px-12 py-5 rounded-2xl font-bold text-xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[280px]">
                        <i class="fas fa-paw mr-4 text-2xl group-hover:rotate-12 transition-transform duration-300"></i>
                        Browse Available Pets
                    </a>
                    <a href="#adoption-process" 
                       class="group bg-white/90 backdrop-blur-lg border-2 border-white text-black px-12 py-5 rounded-2xl font-bold text-xl hover:bg-white hover:text-purple-800 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[280px]">
                        <i class="fas fa-play-circle mr-4 text-2xl group-hover:scale-110 transition-transform duration-300"></i>
                        How to Adopt
                    </a>
                </div>
                
                <!-- Premium Stats Section -->
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-10 max-w-5xl mx-auto border border-white/20 shadow-2xl">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="text-center group">
                            <div class="text-5xl font-black text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">2,500+</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Pets Adopted</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-5xl font-black text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">98%</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Success Rate</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-5xl font-black text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">150+</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Rescue Partners</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-5xl font-black text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">24/7</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: Featured Pets Spotlight Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Featured Pets of the Week
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    These adorable pets are looking for their forever homes. Could one of them be your perfect match?
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Max', 'type' => 'Golden Retriever', 'age' => '2 years', 'location' => 'New York', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80', 'description' => 'Friendly and energetic, loves playing fetch and cuddles'],
                    ['name' => 'Luna', 'type' => 'Siamese Cat', 'age' => '1.5 years', 'location' => 'Chicago', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80', 'description' => 'Playful and curious, gets along well with other pets'],
                    ['name' => 'Coco', 'type' => 'Rabbit', 'age' => '8 months', 'location' => 'Los Angeles', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80', 'description' => 'Gentle and affectionate, loves fresh vegetables and hay']
                ] as $pet)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-amber-100">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $pet['img'] }}" alt="{{ $pet['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4 bg-yellow-400 text-black px-3 py-1 rounded-full font-bold text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-2xl font-black text-black">{{ $pet['name'] }}</h3>
                                <p class="text-black font-medium">{{ $pet['type'] }} • {{ $pet['age'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-black text-sm font-medium flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-purple-500"></i> {{ $pet['location'] }}
                                </p>
                            </div>
                        </div>
                        <p class="text-black mb-6 leading-relaxed">{{ $pet['description'] }}</p>
                        <div class="flex justify-between items-center">
                            <a href="#" class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-bold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                                <i class="fas fa-heart mr-2 group-hover:scale-110 transition-transform duration-300"></i> 
                                Adopt Me
                            </a>
                            <div class="flex space-x-2">
                                <button class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center hover:bg-amber-200 transition-colors duration-300">
                                    <i class="fas fa-share-alt text-black"></i>
                                </button>
                                <button class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center hover:bg-amber-200 transition-colors duration-300">
                                    <i class="far fa-heart text-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('browse.pets') }}" 
                   class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-2xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center">
                    <i class="fas fa-search mr-3 group-hover:rotate-12 transition-transform duration-300"></i> 
                    View All Available Pets
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Quick Pet Preview Section -->
    <section class="py-16 relative overflow-hidden bg-gradient-to-br from-amber-50 to-rose-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 text-6xl">🐾</div>
            <div class="absolute bottom-10 right-10 text-6xl">🐾</div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-14">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-black">
                    Quick Peek at Our Pets
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Take a quick look at some of our adorable pets waiting for their forever homes
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-12">
                @foreach([
                    ['name' => 'Buddy', 'type' => 'Golden Retriever', 'img' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80'],
                    ['name' => 'Luna', 'type' => 'Domestic Cat', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80'],
                    ['name' => 'Max', 'type' => 'Beagle', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80'],
                    ['name' => 'Coco', 'type' => 'Rabbit', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80'],
                    ['name' => 'Rio', 'type' => 'Parrot', 'img' => 'https://images.unsplash.com/photo-1517423447168-cb804aafa6e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'],
                    ['name' => 'Sky', 'type' => 'Husky', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80']
                ] as $pet)
                <div class="group bg-white rounded-3xl p-4 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 text-center border border-amber-100">
                    <div class="relative mb-4">
                        <div class="w-24 h-24 mx-auto rounded-2xl overflow-hidden border-4 border-amber-300 group-hover:border-purple-400 transition-all duration-300 shadow-lg">
                            <img src="{{ $pet['img'] }}" alt="{{ $pet['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-heart text-white text-xs"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-black text-lg mb-1">{{ $pet['name'] }}</h4>
                    <p class="text-black text-sm font-medium">{{ $pet['type'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center">
                <a href="{{ route('browse.pets') }}" 
                   class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-2xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center">
                    <i class="fas fa-paw mr-3 group-hover:rotate-12 transition-transform duration-300"></i> 
                    Meet All Our Pets
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- NEW: Pet Services Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Our Pet Services
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    We offer comprehensive services to ensure the health and happiness of your new companion
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'syringe', 'title' => 'Vaccinations', 'desc' => 'Complete vaccination protocols for all adopted pets', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80'],
                    ['icon' => 'user-md', 'title' => 'Health Checkups', 'desc' => 'Thorough health examinations by certified veterinarians', 'img' => 'https://images.unsplash.com/photo-1579168765467-3b235f938439?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80'],
                    ['icon' => 'paw', 'title' => 'Training Support', 'desc' => 'Behavioral training resources for new pet parents', 'img' => 'https://images.unsplash.com/photo-1558788353-f76d92427f16?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80'],
                    ['icon' => 'home', 'title' => 'Home Delivery', 'desc' => 'Safe transport of your new pet directly to your home', 'img' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80']
                ] as $service)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-amber-100">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ $service['img'] }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-{{ $service['icon'] }} text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-black mb-3">{{ $service['title'] }}</h3>
                        <p class="text-black leading-relaxed">{{ $service['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Why Adopt Section -->
    <section class="py-20 relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Why Adopt from PetPals?
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    We connect loving families with pets in need, creating lifelong bonds and saving lives every day.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'heart', 'title' => 'Save a Life', 'desc' => 'Every adoption saves a life and makes space for another animal in need. You are not just getting a pet - you are being a hero.', 'gradient' => 'from-blue-500 to-cyan-500'],
                    ['icon' => 'stethoscope', 'title' => 'Health Guaranteed', 'desc' => 'All our pets are vaccinated, spayed/neutered, microchipped, and thoroughly health screened before adoption.', 'gradient' => 'from-green-500 to-emerald-500'],
                    ['icon' => 'hands-helping', 'title' => 'Lifetime Support', 'desc' => 'We provide ongoing support, training resources, and veterinary advice for the entire life of your adopted pet.', 'gradient' => 'from-purple-500 to-pink-500']
                ] as $benefit)
                <div class="group bg-white p-8 rounded-3xl text-center border border-gray-200 hover:border-transparent shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 relative overflow-hidden">
                    <!-- Background Gradient on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br {{ $benefit['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                    
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br {{ $benefit['gradient'] }} rounded-3xl flex items-center justify-center mx-auto mb-4 shadow-2xl group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-{{ $benefit['icon'] }} text-white text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-black text-black mb-6">{{ $benefit['title'] }}</h3>
                    <p class="text-black leading-relaxed text-lg font-medium">
                        {{ $benefit['desc'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pet Categories Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Find By Category
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Explore pets by category to find your perfect match
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'dog', 'title' => 'Dogs', 'count' => '245', 'color' => 'amber', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=962&q=80'],
                    ['icon' => 'cat', 'title' => 'Cats', 'count' => '189', 'color' => 'blue', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1143&q=80'],
                    ['icon' => 'rabbit', 'title' => 'Small Pets', 'count' => '67', 'color' => 'green', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80'],
                    ['icon' => 'dove', 'title' => 'Birds', 'count' => '42', 'color' => 'purple', 'img' => 'https://images.unsplash.com/photo-1517423447168-cb804aafa6e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80']
                ] as $category)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 cursor-pointer relative">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $category['img'] }}" alt="{{ $category['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-{{ $category['color'] }}-500 to-{{ $category['color'] }}-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 -mt-12 relative z-10">
                            <i class="fas fa-{{ $category['icon'] }} text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-black mb-2">{{ $category['title'] }}</h3>
                        <p class="text-black font-semibold mb-4">{{ $category['count'] }} Pets Available</p>
                        <div class="flex justify-center">
                            <span class="bg-{{ $category['color'] }}-100 text-black px-4 py-2 rounded-full text-sm font-bold group-hover:bg-{{ $category['color'] }}-200 transition-colors duration-300">
                                Explore Now
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- NEW: Pet Care Resources Section -->
    <section class="py-20 relative overflow-hidden bg-gradient-to-br from-amber-50 to-rose-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Pet Care Resources
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Helpful guides and articles to ensure you provide the best care for your new pet
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['title' => 'Preparing Your Home for a New Pet', 'excerpt' => 'Learn how to create a safe and welcoming environment for your new furry family member.', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1064&q=80', 'read_time' => '5 min read'],
                    ['title' => 'Nutrition Guide for Different Life Stages', 'excerpt' => 'Understand the dietary needs of pets at various stages of their lives for optimal health.', 'img' => 'https://images.unsplash.com/photo-1579168765467-3b235f938439?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80', 'read_time' => '8 min read'],
                    ['title' => 'Training Tips for First-Time Pet Owners', 'excerpt' => 'Essential training techniques to build a strong bond with your new companion.', 'img' => 'https://images.unsplash.com/photo-1558788353-f76d92427f16?ixlib=rb-4.0.3&auto=format&fit=crop&w=1180&q=80', 'read_time' => '6 min read']
                ] as $resource)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-amber-100">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $resource['img'] }}" alt="{{ $resource['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-amber-100 text-black px-3 py-1 rounded-full text-xs font-bold">
                                {{ $resource['read_time'] }}
                            </span>
                        </div>
                        <h3 class="text-xl font-black text-black mb-3">{{ $resource['title'] }}</h3>
                        <p class="text-black mb-6 leading-relaxed">{{ $resource['excerpt'] }}</p>
                        <a href="#" class="group text-purple-600 font-bold hover:text-purple-700 transition-colors duration-300 inline-flex items-center">
                            Read More 
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="#" 
                   class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-2xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center">
                    <i class="fas fa-book-open mr-3 group-hover:rotate-12 transition-transform duration-300"></i> 
                    View All Resources
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Adoption Process Section -->
    <section id="adoption-process" class="py-20 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2020%2020%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22%23f59e0b%22%20fill-opacity%3D%220.05%22%20fill-rule%3D%22evenodd%22%3E%3Ccircle%20cx%3D%223%22%20cy%3D%223%22%20r%3D%223%22/%3E%3Ccircle%20cx%3D%2213%22%20cy%3D%2213%22%20r%3D%223%22/%3E%3C/g%3E%3C/svg%3E')]"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Simple Adoption Process
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Our 4-step process makes it easy to find and bring home your new best friend.
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['num' => '1', 'title' => 'Browse Pets', 'desc' => 'Search our database of adorable pets waiting for their forever homes.', 'color' => 'blue'],
                    ['num' => '2', 'title' => 'Apply Online', 'desc' => 'Fill out our adoption application form to tell us about your home.', 'color' => 'green'],
                    ['num' => '3', 'title' => 'Meet & Greet', 'desc' => 'Schedule a meeting to ensure it is the perfect match for everyone.', 'color' => 'yellow'],
                    ['num' => '4', 'title' => 'Bring Home', 'desc' => 'Complete the adoption and welcome your new family member home!', 'color' => 'purple']
                ] as $step)
                <div class="text-center group relative">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 bg-gradient-to-br from-{{ $step['color'] }}-100 to-{{ $step['color'] }}-200 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:from-{{ $step['color'] }}-200 group-hover:to-{{ $step['color'] }}-300 transition-all duration-500 shadow-2xl group-hover:scale-110">
                            <span class="text-{{ $step['color'] }}-700 font-black text-4xl">{{ $step['num'] }}</span>
                        </div>
                        @if($step['num'] != '4')
                        <div class="hidden md:block absolute top-16 left-1/2 w-full h-2 bg-gradient-to-r from-{{ $step['color'] }}-200 to-{{ $step['color'] }}-200 -z-10 group-hover:from-{{ $step['color'] }}-300 group-hover:to-{{ $step['color'] }}-300 transition-all duration-500"></div>
                        @endif
                    </div>
                    <h3 class="text-2xl font-black text-black mb-4">{{ $step['title'] }}</h3>
                    <p class="text-black leading-relaxed font-medium">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-16">
                <a href="#" 
                   class="group bg-gradient-to-r from-green-500 to-emerald-500 text-white px-12 py-5 rounded-2xl font-bold text-lg hover:from-green-600 hover:to-emerald-600 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center">
                    <i class="fas fa-play-circle mr-4 text-2xl group-hover:scale-110 transition-transform duration-300"></i> 
                    Start Your Adoption Journey
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Success Stories Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-black">
                    Happy Tails
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Read heartwarming stories from families who found their perfect companions through PetPals.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Sarah Johnson', 'pet' => 'Charlie (Golden Retriever)', 'img' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80', 'review' => 'Adopting Charlie was the best decision we ever made. He has brought so much joy to our family. The process was smooth and the PetPals team was incredibly supportive!'],
                    ['name' => 'Michael Chen', 'pet' => 'Bella (Domestic Shorthair)', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80', 'review' => 'Bella has transformed our home with her playful energy and loving nature. The matching process was excellent - they really understood what we were looking for in a pet.'],
                    ['name' => 'Jessica Martinez', 'pet' => 'Simba & Nala (Kittens)', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80', 'review' => 'We adopted two kittens, and they have been the perfect addition to our family. The adoption counselors were so helpful in finding us the right pair. Highly recommend PetPals!']
                ] as $testimonial)
                <div class="group bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-amber-100">
                    <div class="flex items-center mb-6">
                        <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-2xl object-cover border-4 border-amber-300 shadow-lg">
                        <div class="ml-4">
                            <h4 class="font-black text-black text-lg">{{ $testimonial['name'] }}</h4>
                            <p class="text-black text-sm font-medium">{{ $testimonial['pet'] }}</p>
                        </div>
                    </div>
                    <p class="text-black mb-6 leading-relaxed font-medium text-lg">"{{ $testimonial['review'] }}"</p>
                    <div class="flex text-amber-400 text-xl">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-16">
                <a href="#" 
                   class="group text-purple-600 font-bold hover:text-purple-700 transition-colors duration-300 inline-flex items-center text-xl">
                    Read More Success Stories 
                    <i class="fas fa-arrow-right ml-4 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- NEW: Newsletter Subscription Section -->
    <section class="py-20 relative overflow-hidden bg-gradient-to-br from-purple-600 to-pink-600">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-white">
                    Stay Updated
                </h2>
                <p class="text-2xl mb-10 text-purple-100 font-medium leading-relaxed">
                    Subscribe to our newsletter for the latest pet arrivals, adoption stories, and care tips.
                </p>
                
                <div class="bg-white/20 backdrop-blur-lg rounded-2xl p-8 border border-white/30">
                    <form class="flex flex-col md:flex-row gap-4">
                        <input type="email" placeholder="Enter your email address" 
                               class="flex-grow px-6 py-4 rounded-xl border-0 focus:ring-4 focus:ring-purple-300 text-lg font-medium">
                        <button type="submit" 
                                class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-black px-8 py-4 rounded-xl font-bold text-lg hover:from-yellow-500 hover:to-yellow-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                            Subscribe Now
                        </button>
                    </form>
                    <p class="text-purple-200 mt-4 text-sm">
                        We respect your privacy. Unsubscribe at any time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fixed Final CTA Section -->
    <section class="py-20 bg-gradient-to-br from-purple-700 to-purple-800 relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-5xl md:text-6xl font-black mb-6 text-white">
                Ready to Find Your New Best Friend?
            </h2>
            <p class="text-2xl mb-10 max-w-3xl mx-auto text-purple-100 font-medium leading-relaxed">
                Join thousands of happy families who found their perfect pet through PetPals. Start your adoption journey today!
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-6 mb-12">
                <a href="{{ route('browse.pets') }}" 
                   class="group bg-gradient-to-r from-yellow-400 to-yellow-500 text-black px-12 py-5 rounded-2xl font-bold text-xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[300px]">
                    <i class="fas fa-search mr-4 text-2xl group-hover:rotate-12 transition-transform duration-300"></i> 
                    Browse Available Pets
                </a>
                <a href="#" 
                   class="group bg-white/90 backdrop-blur-lg border-2 border-white text-black px-12 py-5 rounded-2xl font-bold text-xl hover:bg-white hover:text-purple-700 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[300px]">
                    <i class="fas fa-question-circle mr-4 text-2xl group-hover:scale-110 transition-transform duration-300"></i> 
                    Adoption FAQs
                </a>
            </div>
            
            <div class="mt-12 flex flex-wrap justify-center gap-8">
                @foreach([
                    ['icon' => 'shield-alt', 'text' => '100% Safe Process'],
                    ['icon' => 'clock', 'text' => '24/7 Support'],
                    ['icon' => 'award', 'text' => 'Verified Shelters']
                ] as $feature)
                <div class="flex items-center bg-white/20 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/30 group hover:bg-white/30 transition-all duration-300">
                    <i class="fas fa-{{ $feature['icon'] }} mr-3 text-yellow-400 group-hover:scale-110 transition-transform duration-300"></i>
                    <span class="font-bold text-lg text-white">{{ $feature['text'] }}</span>
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

.hover\:shadow-3xl:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
</style>

@endsection