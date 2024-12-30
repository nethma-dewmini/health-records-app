<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto py-10 px-6">
        <!-- Page Header -->
        <h1 class="text-3xl font-bold text-[#003366] mb-6 text-center">Edit Appointment</h1>

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

        <!-- Edit Appointment Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <form action="{{ route('appointment.update', ['appointment' => $appointment]) }}" method="POST" class="space-y-6">
                @csrf
                @method('put')

                <!-- Patient -->
                <div>
                    <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                    <select
                        id="patient_id"
                        name="patient_id"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->first_name }} {{ $patient->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Doctor -->
                <div>
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700">Doctor</label>
                    <select
                        id="doctor_id"
                        name="doctor_id"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->first_name }} {{ $doctor->last_name }} ({{ $doctor->speciality }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Appointment Date -->
                <div>
                    <label for="appointment_date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                    <input
                        type="date"
                        id="appointment_date"
                        name="appointment_date"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#003366] focus:border-[#003366]"
                        value="{{ old('appointment_date', $appointment->appointment_date?->format('Y-m-d')) }}"
                        required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-[#003366] hover:bg-[#001f33] text-white px-6 py-2 rounded-md font-semibold shadow-md">
                        Update Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
