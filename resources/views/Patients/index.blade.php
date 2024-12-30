<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-[#003366] mb-6">Patient</h1>

        <!-- Success Message -->
        <div>
            @if(session()->has('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Create New Account Button -->
        <div class="mb-6">
            <a href="{{ route('patient.create') }}" class="bg-[#003366] hover:bg-[#001f33] text-white px-4 py-2 rounded-md">
                Create a New Account
            </a>
        </div>

        <!-- Patients Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead class="bg-[#003366] text-white">
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">First Name</th>
                        <th class="py-3 px-4 border-b">Last Name</th>
                        <th class="py-3 px-4 border-b">Email</th>
                        <th class="py-3 px-4 border-b">Date of Birth</th>
                        <th class="py-3 px-4 border-b">Phone</th>
                        <th class="py-3 px-4 border-b">Edit</th>
                        <th class="py-3 px-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients as $patient)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 border-b">{{ $patient->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $patient->first_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $patient->last_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $patient->email }}</td>
                            <td class="py-3 px-4 border-b">{{ $patient->dob }}</td>
                            <td class="py-3 px-4 border-b">{{ $patient->phone }}</td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('patient.edit', ['patient' => $patient]) }}" class="text-blue-500 hover:text-blue-900">Edit</a>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-90" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-4 text-center text-gray-500">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
