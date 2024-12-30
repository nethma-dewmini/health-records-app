<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Doctor Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-10 px-6">
        <!-- Page Header -->
        <h1 class="text-3xl font-bold text-[#003366] mb-6 text-center">Create New Doctor Account</h1>

        <!-- Error Messages -->
        <div>
            @if($errors->any())
                <ul class="bg-red-100 text-red-800 p-4 rounded-md mb-6">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Create Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <form action="{{ route('doctors.store') }}" method="POST" class="space-y-6">
                @csrf
                @method('post')

                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('first_name') }}"
                        required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('last_name') }}"
                        required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('email') }}"
                        required>
                </div>

                <!-- Specialty -->
                <div>
                    <label for="specialty" class="block text-sm font-medium text-gray-700">Specialty</label>
                    <input
                        type="text"
                        id="specialty"
                        name="specialty"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('specialty') }}"
                        required>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('phone') }}"
                        required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-[#003366] hover:bg-[#001f33] text-white px-6 py-2 rounded-md font-semibold shadow-md">
                        Create Doctor
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
