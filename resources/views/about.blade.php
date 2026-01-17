@extends('frontend.app')

@section('content')

<!-- Set entire page background to light blue gradient -->
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50">
    
    <!-- Premium Hero Section - Fixed Background -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-700 py-24 md:py-32">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full animate-pulse"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-cyan-300/20 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-blue-300/20 rounded-full animate-ping" style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-1/3 right-1/4 w-20 h-20 bg-white/10 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 animate-float">
            <div class="w-20 h-20 bg-white/20 rounded-full backdrop-blur-sm flex items-center justify-center">
                <span class="text-2xl">🐾</span>
            </div>
        </div>
        <div class="absolute bottom-32 right-16 animate-float" style="animation-delay: 1.5s;">
            <div class="w-16 h-16 bg-cyan-200/30 rounded-full backdrop-blur-sm flex items-center justify-center">
                <span class="text-xl">❤️</span>
            </div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Premium Badge -->
                <div class="inline-flex items-center bg-white/30 backdrop-blur-lg rounded-full px-6 py-3 mb-8 border border-white/50">
                    <span class="w-2 h-2 bg-cyan-300 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-black font-semibold text-sm">Trusted by 10,000+ Pet Lovers</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-6 leading-tight text-black">
                    <span class="block text-4xl md:text-5xl mb-4">Find Your Perfect</span>
                    <span class="block text-black drop-shadow-lg">Furry Friend</span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-12 text-black max-w-4xl mx-auto leading-relaxed font-semibold">
                    Where love finds a home. Adopt, and shop — give a homeless pet a loving family and discover unconditional love.
                </p>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-6 mb-16">
                    <a href="{{ route('browse.pets') }}" 
                       class="group bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-500 hover:to-blue-600 text-black px-12 py-5 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[280px] relative overflow-hidden border-2 border-white">
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <i class="fas fa-paw mr-4 text-xl group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>
                        <span class="relative z-10">Browse Available Pets</span>
                    </a>
                    <a href="#adoption-process" 
                       class="group bg-white/90 backdrop-blur-lg border-2 border-white text-blue-800 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-blue-900 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[280px]">
                        <i class="fas fa-play-circle mr-4 text-xl group-hover:scale-110 transition-transform duration-300"></i>
                        How to Adopt
                    </a>
                </div>
                
                <!-- Premium Stats Section -->
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-8 max-w-5xl mx-auto border border-white/20 shadow-2xl">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="text-center group">
                            <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">2,500+</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Pets Adopted</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">98%</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Success Rate</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">150+</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Rescue Partners</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">24/7</div>
                            <div class="text-black text-lg font-semibold tracking-wide">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New: Pet Categories Gallery -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Find Your Perfect Match
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Explore our diverse range of pets waiting for their forever homes
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'dog', 'title' => 'Dogs', 'count' => '245 Available', 'img' => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'color' => 'blue'],
                    ['icon' => 'cat', 'title' => 'Cats', 'count' => '189 Available', 'img' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'color' => 'cyan'],
                    ['icon' => 'rabbit', 'title' => 'Small Pets', 'count' => '67 Available', 'img' => 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'color' => 'indigo'],
                    ['icon' => 'dove', 'title' => 'Birds & More', 'count' => '42 Available', 'img' => 'https://images.unsplash.com/photo-1552728089-57bdde30beb3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80', 'color' => 'blue']
                ] as $category)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-blue-100">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $category['img'] }}" alt="{{ $category['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-{{ $category['color'] }}-500 to-{{ $category['color'] }}-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 -mt-12 relative z-10">
                            <i class="fas fa-{{ $category['icon'] }} text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-black mb-2">{{ $category['title'] }}</h3>
                        <p class="text-black font-semibold mb-4">{{ $category['count'] }}</p>
                        <a href="#" class="inline-block bg-gray-100 text-black px-6 py-2 rounded-full text-sm font-bold group-hover:bg-gray-200 transition-colors duration-300 border-2 border-black">
                            Explore {{ $category['title'] }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-cyan-50 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-flex items-center bg-blue-100 text-blue-800 rounded-full px-4 py-2 mb-6">
                            <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                            <span class="font-semibold text-sm">Our Mission</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                            Creating Forever Homes for Every Pet
                        </h2>
                        <p class="text-lg text-black mb-6 leading-relaxed">
                            At PetPals, we believe every pet deserves a loving home. Our mission is to connect compassionate families with animals in need, creating lifelong bonds that transform both human and animal lives.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <p class="text-black flex-1">Rescue and rehabilitate homeless animals</p>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <p class="text-black flex-1">Provide comprehensive medical care and behavioral training</p>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <p class="text-black flex-1">Match pets with compatible families for successful adoptions</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl p-1 shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="Happy family with adopted pet" 
                                 class="w-full h-96 object-cover rounded-3xl">
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-6 shadow-2xl border border-blue-100">
                            <div class="text-3xl font-black text-blue-600 mb-2">5+ Years</div>
                            <div class="text-black font-semibold">Of Saving Lives</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New: Featured Success Stories - Fixed Image Sizes -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Transformation Stories
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    See how our rescued pets have transformed lives and found their forever homes
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['before' => 'https://images.unsplash.com/photo-1548767797-d8c844163c4c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Max', 'story' => 'Rescued from neglect, now living his best life'],
                    ['before' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Luna', 'story' => 'From stray to spoiled house cat'],
                    ['before' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'after' => 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'name' => 'Coco', 'story' => 'Rescued rabbit now enjoying a loving home']
                ] as $story)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-blue-100">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/80 to-cyan-500/80 z-10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <span class="text-white font-bold text-lg">Happy Ending!</span>
                        </div>
                        <img src="{{ $story['after'] }}" alt="{{ $story['name'] }} after" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-black text-black mb-2">{{ $story['name'] }}</h3>
                        <p class="text-black mb-4">{{ $story['story'] }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-black">
                                <span class="mr-2">Before</span>
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-blue-300">
                                    <img src="{{ $story['before'] }}" alt="Before" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <i class="fas fa-arrow-right text-blue-500"></i>
                            <div class="flex items-center text-sm text-black">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-green-300">
                                    <img src="{{ $story['after'] }}" alt="After" class="w-full h-full object-cover">
                                </div>
                                <span class="ml-2">After</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Quick Pet Preview Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-cyan-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 text-6xl">🐾</div>
            <div class="absolute bottom-10 right-10 text-6xl">🐾</div>
            <div class="absolute top-1/2 left-1/4 text-4xl">❤️</div>
            <div class="absolute bottom-1/3 right-1/3 text-5xl">🐶</div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-black">
                    Meet Our Furry Friends
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    These adorable companions are waiting to fill your home with love and joy
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-12">
                @foreach([
                    ['name' => 'Buddy', 'type' => 'Golden Retriever', 'img' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '2 years'],
                    ['name' => 'Luna', 'type' => 'Domestic Cat', 'img' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '1 year'],
                    ['name' => 'Max', 'type' => 'Beagle', 'img' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '3 years'],
                    ['name' => 'Coco', 'type' => 'Rabbit', 'img' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '6 months'],
                    ['name' => 'Rio', 'type' => 'Parrot', 'img' => 'https://images.unsplash.com/photo-1517423447168-cb804aafa6e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '4 years'],
                    ['name' => 'Sky', 'type' => 'Husky', 'img' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'age' => '2 years']
                ] as $pet)
                <div class="group bg-white rounded-3xl p-4 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 text-center border border-blue-100 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                    <div class="relative mb-4">
                        <div class="w-24 h-24 mx-auto rounded-2xl overflow-hidden border-4 border-blue-200 group-hover:border-blue-400 transition-all duration-300 shadow-lg">
                            <img src="{{ $pet['img'] }}" alt="{{ $pet['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-heart text-white text-xs"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-black text-lg mb-1">{{ $pet['name'] }}</h4>
                    <p class="text-black text-sm font-medium mb-1">{{ $pet['type'] }}</p>
                    <p class="text-black text-xs">{{ $pet['age'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center">
                <a href="{{ route('browse.pets') }}" 
                   class="group bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-12 py-4 rounded-2xl font-bold text-lg hover:from-blue-700 hover:to-cyan-700 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center border-2 border-black">
                    <i class="fas fa-paw mr-3 group-hover:rotate-12 transition-transform duration-300"></i> 
                    Meet All Our Pets
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Why Adopt Section -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Why Choose PetPals?
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    We're not just an adoption service - we're a community dedicated to animal welfare and successful pet placements.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['icon' => 'heart', 'title' => 'Save a Life', 'desc' => 'Every adoption saves a life and makes space for another animal in need. You are not just getting a pet - you are being a hero.', 'gradient' => 'from-blue-500 to-cyan-500'],
                    ['icon' => 'stethoscope', 'title' => 'Health Guaranteed', 'desc' => 'All our pets are vaccinated, spayed/neutered, microchipped, and thoroughly health screened before adoption.', 'gradient' => 'from-blue-500 to-indigo-500'],
                    ['icon' => 'hands-helping', 'title' => 'Lifetime Support', 'desc' => 'We provide ongoing support, training resources, and veterinary advice for the entire life of your adopted pet.', 'gradient' => 'from-cyan-500 to-blue-500']
                ] as $benefit)
                <div class="group bg-white p-8 rounded-3xl text-center border border-blue-200 hover:border-transparent shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 relative overflow-hidden">
                    <!-- Background Gradient on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br {{ $benefit['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                    
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br {{ $benefit['gradient'] }} rounded-3xl flex items-center justify-center mx-auto mb-4 shadow-2xl group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-{{ $benefit['icon'] }} text-white text-2xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-black mb-6">{{ $benefit['title'] }}</h3>
                    <p class="text-black leading-relaxed text-lg font-medium">
                        {{ $benefit['desc'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- New: Adoption Impact Section - Fixed Colors -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-cyan-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-white/10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-white">
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
                    <div class="bg-white/20 backdrop-blur-lg rounded-3xl p-8 border border-white/30">
                        <div class="text-6xl font-black text-white mb-4 opacity-90">{{ $impact['number'] }}</div>
                        <h3 class="text-2xl font-black text-white mb-4">{{ $impact['title'] }}</h3>
                        <p class="text-blue-100 leading-relaxed font-medium">{{ $impact['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-12">
                    <a href="#adoption-process" 
                       class="group bg-white text-blue-800 px-12 py-5 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 inline-flex items-center border-2 border-blue-300">
                        <i class="fas fa-heart mr-4 text-xl group-hover:scale-110 transition-transform duration-300"></i>
                        Make Your Impact Today
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section - Fixed Image Sizes and Card Consistency -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-cyan-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Meet Our Team
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Passionate professionals dedicated to animal welfare and successful adoptions
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'Dr. Sarah Johnson', 'role' => 'Veterinary Director', 'img' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => '10+ years of veterinary experience specializing in shelter medicine and animal rehabilitation.'],
                    ['name' => 'Michael Chen', 'role' => 'Adoption Coordinator', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => 'Matches hundreds of pets with their perfect families each year through careful screening.'],
                    ['name' => 'Jessica Martinez', 'role' => 'Animal Behaviorist', 'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'bio' => 'Specializes in rehabilitation and training for rescue animals with behavioral challenges.']
                ] as $member)
                <div class="group bg-white rounded-3xl p-6 text-center border border-blue-200 hover:border-transparent shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 flex flex-col h-full">
                    <div class="w-24 h-24 mx-auto rounded-2xl overflow-hidden border-4 border-blue-200 mb-6 shadow-lg group-hover:border-blue-400 transition-all duration-300 flex-shrink-0">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <h3 class="text-2xl font-black text-black mb-2">{{ $member['name'] }}</h3>
                    <div class="text-blue-600 font-semibold mb-4">{{ $member['role'] }}</div>
                    <p class="text-black leading-relaxed flex-grow">{{ $member['bio'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Adoption Process Section -->
    <section id="adoption-process" class="py-20 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2020%2020%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22%233b82f6%22%20fill-opacity%3D%220.03%22%20fill-rule%3D%22evenodd%22%3E%3Ccircle%20cx%3D%223%22%20cy%3D%223%22%20r%3D%223%22/%3E%3Ccircle%20cx%3D%2213%22%20cy%3D%2213%22%20r%3D%223%22/%3E%3C/g%3E%3C/svg%3E')]"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Simple Adoption Process
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Our streamlined 4-step process makes finding and bringing home your new best friend easy and enjoyable.
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['num' => '1', 'title' => 'Browse Pets', 'desc' => 'Search our database of adorable pets waiting for their forever homes.', 'color' => 'blue', 'icon' => 'search'],
                    ['num' => '2', 'title' => 'Apply Online', 'desc' => 'Fill out our adoption application form to tell us about your home.', 'color' => 'cyan', 'icon' => 'file-alt'],
                    ['num' => '3', 'title' => 'Meet & Greet', 'desc' => 'Schedule a meeting to ensure it is the perfect match for everyone.', 'color' => 'indigo', 'icon' => 'handshake'],
                    ['num' => '4', 'title' => 'Bring Home', 'desc' => 'Complete the adoption and welcome your new family member home!', 'color' => 'blue', 'icon' => 'home']
                ] as $step)
                <div class="text-center group relative">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-{{ $step['color'] }}-100 to-{{ $step['color'] }}-200 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:from-{{ $step['color'] }}-200 group-hover:to-{{ $step['color'] }}-300 transition-all duration-500 shadow-2xl group-hover:scale-110">
                            <i class="fas fa-{{ $step['icon'] }} text-{{ $step['color'] }}-700 text-2xl"></i>
                        </div>
                        @if($step['num'] != '4')
                        <div class="hidden md:block absolute top-12 left-1/2 w-full h-2 bg-gradient-to-r from-{{ $step['color'] }}-200 to-{{ $step['color'] }}-200 -z-10 group-hover:from-{{ $step['color'] }}-300 group-hover:to-{{ $step['color'] }}-300 transition-all duration-500"></div>
                        @endif
                    </div>
                    <h3 class="text-2xl font-black text-black mb-4">{{ $step['title'] }}</h3>
                    <p class="text-black leading-relaxed font-medium">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-16">
                <a href="#" 
                   class="group bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-12 py-5 rounded-2xl font-bold text-lg hover:from-blue-600 hover:to-cyan-600 transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl shadow-lg inline-flex items-center border-2 border-black">
                    <i class="fas fa-play-circle mr-4 text-2xl group-hover:scale-110 transition-transform duration-300"></i> 
                    Start Your Adoption Journey
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Success Stories Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-cyan-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                    Happy Tails
                </h2>
                <p class="text-xl text-black max-w-3xl mx-auto leading-relaxed font-medium">
                    Heartwarming stories from families who found their perfect companions through PetPals.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach([
                    ['name' => 'The Johnson Family', 'pet' => 'Charlie (Golden Retriever)', 'img' => 'https://images.unsplash.com/photo-1542736667-069246bdbc6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'Adopting Charlie was the best decision we ever made. He has brought so much joy to our family. The process was smooth and the PetPals team was incredibly supportive!'],
                    ['name' => 'Michael & Alex', 'pet' => 'Bella (Domestic Shorthair)', 'img' => 'https://images.unsplash.com/photo-1511988617509-a57c8a288659?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'Bella has transformed our home with her playful energy and loving nature. The matching process was excellent - they really understood what we were looking for in a pet.'],
                    ['name' => 'The Martinez Family', 'pet' => 'Simba & Nala (Kittens)', 'img' => 'https://images.unsplash.com/photo-1579208575657-c2fccb0d1c7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', 'review' => 'We adopted two kittens, and they have been the perfect addition to our family. The adoption counselors were so helpful in finding us the right pair. Highly recommend PetPals!']
                ] as $testimonial)
                <div class="group bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-blue-100">
                    <div class="flex items-center mb-6">
                        <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-2xl object-cover border-4 border-blue-300 shadow-lg">
                        <div class="ml-4">
                            <h4 class="font-black text-black text-lg">{{ $testimonial['name'] }}</h4>
                            <p class="text-black text-sm font-medium">{{ $testimonial['pet'] }}</p>
                        </div>
                    </div>
                    <p class="text-black mb-6 leading-relaxed font-medium">"{{ $testimonial['review'] }}"</p>
                    <div class="flex text-yellow-400 text-lg">
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
                   class="group text-blue-600 font-bold hover:text-blue-700 transition-colors duration-300 inline-flex items-center text-xl border-2 border-black px-6 py-3 rounded-2xl">
                    Read More Success Stories 
                    <i class="fas fa-arrow-right ml-4 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Final CTA Section - Fixed Background and Colors -->
    <section class="py-20 bg-gradient-to-br from-blue-700 via-blue-600 to-cyan-600 relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black mb-6 text-black">
                Ready to Find Your New Best Friend?
            </h2>
            <p class="text-xl mb-10 max-w-3xl mx-auto text-black font-semibold leading-relaxed">
                Join thousands of happy families who found their perfect pet through PetPals. Start your adoption journey today!
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-6 mb-12">
                <a href="{{ route('browse.pets') }}" 
                   class="group bg-gradient-to-r from-cyan-400 to-blue-500 text-black px-12 py-5 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[300px] border-2 border-white">
                    <i class="fas fa-search mr-4 text-2xl group-hover:rotate-12 transition-transform duration-300"></i> 
                    Browse Available Pets
                </a>
                <a href="#" 
                   class="group bg-white/90 backdrop-blur-lg border-2 border-white text-blue-800 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-blue-900 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center justify-center min-w-[300px]">
                    <i class="fas fa-question-circle mr-4 text-2xl group-hover:scale-110 transition-transform duration-300"></i> 
                    Adoption FAQs
                </a>
            </div>
            
            <div class="mt-12 flex flex-wrap justify-center gap-8">
                @foreach([
                    ['icon' => 'shield-alt', 'text' => '100% Safe Process'],
                    ['icon' => 'clock', 'text' => '24/7 Support'],
                    ['icon' => 'award', 'text' => 'Verified Shelters'],
                    ['icon' => 'heart', 'text' => 'Lifetime Guarantee']
                ] as $feature)
                <div class="flex items-center bg-white/30 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/40 group hover:bg-white/40 transition-all duration-300">
                    <i class="fas fa-{{ $feature['icon'] }} mr-3 text-cyan-100 group-hover:scale-110 transition-transform duration-300"></i>
                    <span class="font-bold text-lg text-black drop-shadow-sm">{{ $feature['text'] }}</span>
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

/* Custom scroll behavior for smooth navigation */
html {
    scroll-behavior: smooth;
}
</style>

@endsection