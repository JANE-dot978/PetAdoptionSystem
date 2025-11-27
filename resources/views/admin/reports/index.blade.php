@extends('layouts.admin')

@section('header', 'Reports & Analytics')

@section('content')

<div class="space-y-8">
    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 font-semibold text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-users text-blue-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Purchases -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-green-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 font-semibold text-sm">Total Purchases</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalPurchases }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-shopping-cart text-green-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Adoptions -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-purple-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 font-semibold text-sm">Total Adoptions</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalAdoptions }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-heart text-purple-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-orange-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 font-semibold text-sm">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">Ksh {{ number_format($totalRevenue) }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-money-bill-wave text-orange-600 text-2xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- STATUS BREAKDOWN -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Purchases Status -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-6 text-gray-900">Purchases Status</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <span class="text-gray-700 font-semibold">Pending</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">{{ $pendingPurchases }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-gray-700 font-semibold">Completed</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">{{ $completedPurchases }}</span>
                </div>
            </div>
            <a href="{{ route('admin.reports.purchases') }}" class="mt-6 block w-full bg-green-600 text-white text-center py-3 rounded-lg font-bold hover:bg-green-700 transition">
                View Purchases Report
            </a>
        </div>

        <!-- Adoptions Status -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-6 text-gray-900">Adoptions Status</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <span class="text-gray-700 font-semibold">Pending</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">{{ $pendingAdoptions }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-gray-700 font-semibold">Approved</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">{{ $completedAdoptions }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <span class="text-gray-700 font-semibold">Rejected</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">{{ $rejectedAdoptions }}</span>
                </div>
            </div>
            <a href="{{ route('admin.reports.adoptions') }}" class="mt-6 block w-full bg-purple-600 text-white text-center py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                View Adoptions Report
            </a>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-xl font-bold mb-6 text-gray-900">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.reports.purchases') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-lg font-bold hover:shadow-lg transition text-center">
                <i class="fas fa-chart-bar mr-2"></i> Purchases Report
            </a>
            <a href="{{ route('admin.reports.adoptions') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-lg font-bold hover:shadow-lg transition text-center">
                <i class="fas fa-chart-pie mr-2"></i> Adoptions Report
            </a>
            <a href="{{ route('admin.reports.users') }}" class="bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-lg font-bold hover:shadow-lg transition text-center">
                <i class="fas fa-users mr-2"></i> Users Report
            </a>
        </div>
    </div>

</div>

@endsection
