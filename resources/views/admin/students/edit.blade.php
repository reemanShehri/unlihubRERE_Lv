<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Student</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- فقط بيانات الطالب التي نريد تعديلها --}}

                <div class="mb-4">
                    <label for="university_id" class="block text-gray-700 text-sm font-bold mb-2">University</label>
                    <select name="university_id" id="university_id" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled>Select a university</option>
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}"
                                {{ $student->university_id == $university->id ? 'selected' : '' }}>
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('university_id')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="major_id" class="block text-gray-700 text-sm font-bold mb-2">Major</label>
                    <select name="major_id" id="major_id" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled>Select a major</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}"
                                {{ $student->major_id == $major->id ? 'selected' : '' }}>
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('major_id')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                    <a href="{{ route('admin.students.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        // لو بدك تبرمج تحديث التخصصات حسب الكلية المختارة ممكن تضيف جافاسكريبت هنا لاحقاً
    </script>
</x-app-layout>
