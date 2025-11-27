@extends('frontend.app')

@section('content')

<!-- Contact Header -->
<section class="bg-gradient-to-br from-blue-600 to-purple-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Get In Touch</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            We'd love to hear from you! Whether you have questions about adoption or want to share your story, we're here to help.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            
            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Let's Connect</h2>
                    <p class="text-gray-600 text-lg">
                        Have questions about pet adoption? Our team is here to help you find your perfect furry companion.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="space-y-6">
                    <!-- Phone -->
                    <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg">Call Us</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                            <p class="text-sm text-gray-500">Mon-Fri from 8am to 6pm</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg">Email Us</h3>
                            <p class="text-gray-600">hello@petpals.org</p>
                            <p class="text-sm text-gray-500">We'll respond within 24 hours</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg">Visit Us</h3>
                            <p class="text-gray-600">123 Pet Avenue</p>
                            <p class="text-gray-600">New York, NY 10001</p>
                            <p class="text-sm text-gray-500">Open for visits by appointment</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="pt-6">
                    <h3 class="font-semibold text-gray-800 text-lg mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow duration-300">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-paw text-white text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Send us a Message</h2>
                    <p class="text-gray-600 mt-2">We'll get back to you as soon as possible</p>
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Enter your full name" 
                                   required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   placeholder="your.email@example.com" 
                                   required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        </div>
                    </div>

                    <!-- Subject Field -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-gray-400"></i>
                            </div>
                            <select id="subject" 
                                    name="subject" 
                                    required
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 appearance-none bg-white">
                                <option value="">Select a subject</option>
                                <option value="Adoption Inquiry">Adoption Inquiry</option>
                                <option value="Volunteer Opportunity">Volunteer Opportunity</option>
                                <option value="Donation Question">Donation Question</option>
                                <option value="General Question">General Question</option>
                                <option value="Success Story">Success Story</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-comment text-gray-400"></i>
                            </div>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5" 
                                      placeholder="Tell us how we can help you..." 
                                      required
                                      class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Quick answers to common questions about pet adoption</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- FAQ 1 -->
            <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow duration-300">
                <h3 class="font-semibold text-gray-800 text-lg mb-2 flex items-center">
                    <i class="fas fa-paw text-blue-500 mr-3"></i>
                    How long does adoption take?
                </h3>
                <p class="text-gray-600">The adoption process typically takes 3-7 days, including application review, meet & greet, and final paperwork.</p>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow duration-300">
                <h3 class="font-semibold text-gray-800 text-lg mb-2 flex items-center">
                    <i class="fas fa-home text-green-500 mr-3"></i>
                    What are the adoption requirements?
                </h3>
                <p class="text-gray-600">You'll need a stable home environment, ability to provide care, and commitment to the pet's lifelong wellbeing.</p>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow duration-300">
                <h3 class="font-semibold text-gray-800 text-lg mb-2 flex items-center">
                    <i class="fas fa-stethoscope text-purple-500 mr-3"></i>
                    Are pets vaccinated and spayed/neutered?
                </h3>
                <p class="text-gray-600">Yes! All our pets receive complete veterinary care including vaccinations, spay/neuter, and health checks.</p>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow duration-300">
                <h3 class="font-semibold text-gray-800 text-lg mb-2 flex items-center">
                    <i class="fas fa-heart text-red-500 mr-3"></i>
                    Can I return a pet if it doesn't work out?
                </h3>
                <p class="text-gray-600">We offer a 30-day trial period and lifetime return policy. Your pet's happiness is our priority.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Meet Your New Best Friend?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Start your adoption journey today and give a pet their forever home.</p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('browse.pets') }}" 
               class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:-translate-y-1 shadow-lg flex items-center justify-center">
                <i class="fas fa-search mr-2"></i> Browse Available Pets
            </a>
            <a href="#" 
               class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                <i class="fas fa-calendar mr-2"></i> Schedule a Visit
            </a>
        </div>
    </div>
</section>

@endsection