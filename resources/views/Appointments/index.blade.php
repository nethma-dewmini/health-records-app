<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-[#003366] mb-6">Appointments</h1>

        <!-- Success Message -->
        <div>
            @if(session()->has('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Create New Appointment Button -->
        <div class="mb-6">
            <a href="{{ route('appointment.create') }}" class="bg-[#003366] hover:bg-[#001f33] text-white px-4 py-2 rounded-md">
                Make a New Appointment
            </a>
        </div>

        <!-- Appointments Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead class="bg-[#003366] text-white">
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Patient Name</th>
                        <th class="py-3 px-4 border-b">Doctor Name</th>
                        <th class="py-3 px-4 border-b">Appointment Date</th>
                        <th class="py-3 px-4 border-b">Edit</th>
                        <th class="py-3 px-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 border-b">{{ $appointment->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                            <td class="py-3 px-4 border-b">Dr.{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }} ({{ $appointment->doctor->specialty }})</td>
                            <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('appointment.edit', ['appointment' => $appointment]) }}" class="text-blue-500 hover:text-blue-900">Edit</a>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
