<!-- resources/views/student-details/create.blade.php -->

<x-app-layout>
    <div class="max-w-md mx-auto p-6 bg-white rounded shadow mt-10">
        <h2 class="text-xl font-semibold mb-4">Set Up Your Student Profile</h2>
        <form method="POST" action="{{ route('student-details.store') }}">
            @csrf

            <div class="mb-4">
                <label for="university_id" class="block font-medium mb-1">University</label>
                <select name="university_id" id="university_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select University</option>
                    @foreach ($universities as $uni)
                        <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                    @endforeach
                </select>
                @error('university_id')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="college_id" class="block font-medium mb-1">College</label>
                <select name="college_id" id="college_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select College</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                    @endforeach
                </select>
                @error('college_id')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="major_id" class="block font-medium mb-1">Major</label>
                <select name="major_id" id="major_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select Major</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
                @error('major_id')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>



            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Save Profile
            </button>
        </form>
    </div>
</x-app-layout>
