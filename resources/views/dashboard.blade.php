<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#003366] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Patient Section -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold text-[#003366]">Patient Section</h3>
                    <p class="text-gray-700 mt-2">Manage patient details and records.</p>
                    <a href="{{ route('patient.index') }}" class="mt-4 inline-block bg-[#003366] hover:bg-[#001f33] text-white px-4 py-2 rounded-md">
                        Go to Patient Page
                    </a>
                </div>

                <!-- Doctor Section -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold text-[#003366]">Doctor Section</h3>
                    <p class="text-gray-700 mt-2">Access and manage doctor information.</p>
                    <a href="{{ route('doctor.index') }}" class="mt-4 inline-block bg-[#003366] hover:bg-[#001f33] text-white px-4 py-2 rounded-md">
                        Go to Doctor Page
                    </a>
                </div>

                <!-- Appointment Section -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold text-[#003366]">Appointment Section</h3>
                    <p class="text-gray-700 mt-2">View and manage appointments.</p>
                    <a href="{{ route('appointment.index') }}" class="mt-4 inline-block bg-[#003366] hover:bg-[#001f33] text-white px-4 py-2 rounded-md">
                        Go to Appointment Page
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

