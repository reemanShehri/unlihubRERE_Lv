<x-app-layout>

       <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

    <div class="max-w-md mx-auto p-6 bg-white rounded shadow mt-10">
        <h2 class="text-xl font-semibold mb-4">Update Academic Information</h2>
        <form method="POST" action="{{ route('student-details.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="university_id" class="block font-medium mb-1">University</label>
                <select name="university_id" id="university_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select University</option>
                    @foreach ($universities as $uni)
                        <option value="{{ $uni->id }}" {{ $uni->id == $student->university_id ? 'selected' : '' }}>
                            {{ $uni->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="college_id" class="block font-medium mb-1">College</label>
                <select name="college_id" id="college_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select College</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" {{ $college->id == $student->college_id ? 'selected' : '' }}>
                            {{ $college->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="major_id" class="block font-medium mb-1">Major</label>
                <select name="major_id" id="major_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select Major</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}" {{ $major->id == $student->major_id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:underline">Back to Profile</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Update Information
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
