<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        
        <h2 class="text-xl font-bold mb-4">Participants in: {{ $course->title }}</h2>

        <table class="w-full text-sm">
            <thead>
                <tr>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->students as $student)
                    <tr>
                        <td class="border p-2">{{ $student->name ?? '-' }}</td>
                        <td class="border p-2">{{ $student->email ?? '-' }}</td>
                        <td class="border p-2">{{ $student->phone ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-app-layout>
