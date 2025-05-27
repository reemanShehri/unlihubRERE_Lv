<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-users-cog mr-3 text-indigo-600"></i>
                User Management System
            </h2>
            <div class="flex items-center space-x-2">
                <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm flex items-center">
                    <i class="fas fa-user-check mr-1"></i> {{ count($users) }} Active Users
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Search and Filters -->
        <div class="mb-6 bg-white p-4 rounded-xl shadow-sm">
            <form id="search-form" class="grid grid-cols-1 md:grid-cols-4 gap-4" autocomplete="off">
                <!-- Search by Name -->
                <div class="relative">
                    <label for="name-search" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-user mr-1"></i> Search by Name
                    </label>
                    <div class="relative">
                        <input
                            type="text"
                            id="name-search"
                            name="name"
                            placeholder="Search by user name..."
                            class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            style="direction: ltr;"
                        />
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Filter by Major -->
                <div>
                    <label for="major-filter" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-graduation-cap mr-1"></i> Major
                    </label>
                    <select
                        id="major-filter"
                        name="major"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="">All Majors</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter by Activity -->
                <div>
                    <label for="activity-filter" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-clock mr-1"></i> Last Activity
                    </label>
                    <select
                        id="activity-filter"
                        name="activity"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="">All Users</option>
                        <option value="today">Active Today</option>
                        <option value="week">Active This Week</option>
                        <option value="month">Active This Month</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Control Buttons -->
                <div class="flex items-end space-x-2">
                    <button
                        type="submit"
                        class="flex-1 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center justify-center"
                    >
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                    <button
                        type="reset"
                        id="reset-filters"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300"
                    >
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- User Cards -->
        <div id="users-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($users as $user)
                <div
                    class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 border border-gray-100"
                >
                    <!-- Card Header -->
                    <div
                        class="bg-gradient-to-r from-indigo-50 to-blue-50 p-4 flex items-center justify-between"
                    >
                        <div class="flex items-center">
                            <!-- User Icon -->
                            <div
                                class="bg-indigo-100 text-indigo-600 rounded-full w-12 h-12 flex items-center justify-center"
                            >
                                <i class="fas fa-user text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800">{{ $user->name }}</h3>
                                <p class="text-xs text-gray-500 flex items-center">
                                    @if($user->last_active_at)
                                        <i
                                            class="fas fa-circle text-green-500 text-xs mr-1"
                                        ></i>
                                        Active {{ $user->last_active_at->diffForHumans() }}
                                    @else
                                        <i
                                            class="fas fa-circle text-gray-400 text-xs mr-1"
                                        ></i>
                                        Inactive
                                    @endif
                                </p>
                            </div>
                        </div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full"
                            >{{ $user->student->major->name ?? 'N/A' }}</span
                        >
                    </div>

                    <!-- Card Content -->
                    <div class="p-4">
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="text-gray-600 flex items-center truncate">
                                <i class="fas fa-envelope mr-1 text-indigo-500"></i>
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="text-gray-600 flex items-center truncate">
                                <i class="fas fa-university mr-1 text-indigo-500"></i>
                                <span>{{ $user->student->university->name ?? 'N/A' }}</span>
                            </div>
                            <div class="text-gray-600 flex items-center">
                                <i class="fas fa-calendar-alt mr-1 text-indigo-500"></i>
                                <span>Joined {{ $user->created_at ? $user->created_at->diffForHumans() : 'N/A' }}</span>
                            </div>

                            <div class="text-gray-600 flex items-center truncate">
                                <i class="fas fa-id-card mr-1 text-indigo-500"></i>
                                <span>{{ $user->student->college->name ?? 'N/A' }}</span>
                            </div>

                            <div class="text-gray-600 flex items-center truncate">
                                <i class="fas fa-phone mr-1 text-indigo-500"></i>
                                <span>{{ $user->phone ?? 'No phone' }}</span>
                            </div>

                            <!-- Bio -->
                            <div class="text-gray-600 col-span-2">
                                <i class="fas fa-info-circle mr-1 text-indigo-500"></i>
                                <span class="block truncate">{{ $user->bio ?? 'No bio available' }}</span>
                            </div>

                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="border-t border-gray-100 px-4 py-3 flex justify-end space-x-2"
                    >
                        <a
                            href="{{ route('users.show', ['user' => $user->id]) }}"
                            class="text-indigo-600 hover:text-indigo-800 p-2 rounded-full hover:bg-indigo-50"
                            title="View Profile"
                        >
                            <i class="fas fa-eye"></i>
                        </a>
                        <a
                            href="#"
                            class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50"
                            title="Send Message"
                        >
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a
                            href="#"
                            class="text-green-600 hover:text-green-800 p-2 rounded-full hover:bg-green-50"
                            title="Edit User"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No Results Message -->
        <div
            id="no-results"
            class="hidden text-center py-10"
        >
            <i class="fas fa-user-slash text-4xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-medium text-gray-500">No matching results</h3>
            <p class="text-gray-400 mt-2">Try adjusting your search criteria</p>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="mt-6 bg-white px-4 py-3 rounded-lg shadow-sm">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <!-- Search & Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchForm = document.getElementById('search-form');
            const resetBtn = document.getElementById('reset-filters');
            const usersContainer = document.getElementById('users-container');
            const noResults = document.getElementById('no-results');

            // Submit event to search users
            searchForm.addEventListener('submit', function (e) {
                e.preventDefault();
                searchUsers();
            });

            // Reset filters and search
            resetBtn.addEventListener('click', function () {
                searchForm.reset();
                searchUsers();
            });

            // Auto-search when major changes
            document.getElementById('major-filter').addEventListener('change', function () {
                searchUsers();
            });

            // Auto-search when activity filter changes
            document.getElementById('activity-filter').addEventListener('change', function () {
                searchUsers();
            });

            // Function to search users via AJAX
            function searchUsers() {
                const formData = new FormData(searchForm);

                axios.post("{{ route('users.search') }}", formData)
                    .then(response => {
                        const users = response.data.users;
                        usersContainer.innerHTML = '';

                        if (users.length === 0) {
                            noResults.classList.remove('hidden');
                            return;
                        } else {
                            noResults.classList.add('hidden');
                        }

                        users.forEach(user => {
                            const card = createUserCard(user);
                            usersContainer.appendChild(card);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching users:', error);
                    });
            }

            // Create user card element
 function createUserCard(user) {
    const div = document.createElement('div');
    function createUserCard(user) {
    console.log('Phone:', user.phone);
    console.log('Bio:', user.bio);
    // باقي الكود...
}

    div.className = "bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 border border-gray-100";

    div.innerHTML = `
        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 p-4 flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-indigo-100 text-indigo-600 rounded-full w-12 h-12 flex items-center justify-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div class="ml-3">
                    <h3 class="font-semibold text-gray-800">${user.name}</h3>
                    <p class="text-xs text-gray-500 flex items-center">
                        ${user.last_active_at ?
                            `<i class="fas fa-circle text-green-500 text-xs mr-1"></i>Active ${user.last_active_at}` :
                            `<i class="fas fa-circle text-gray-400 text-xs mr-1"></i>Inactive`
                        }
                    </p>
                </div>
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">${user.major_name || 'N/A'}</span>
        </div>
        <div class="p-4">
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="text-gray-600 flex items-center truncate">
                    <i class="fas fa-envelope mr-1 text-indigo-500"></i><span>${user.email}</span>
                </div>
                <div class="text-gray-600 flex items-center truncate">
                    <i class="fas fa-university mr-1 text-indigo-500"></i><span>${user.university_name || 'N/A'}</span>
                </div>
                <div class="text-gray-600 flex items-center">
                    <i class="fas fa-calendar-alt mr-1 text-indigo-500"></i><span>Joined ${user.created_at}</span>
                </div>
                <div class="text-gray-600 flex items-center truncate">
                    <i class="fas fa-id-card mr-1 text-indigo-500"></i><span>${user.college_name || 'N/A'}</span>
                </div>

            </div>
        </div>
        <div class="border-t border-gray-100 px-4 py-3 flex justify-end space-x-2">
            <a href="/users/${user.id}" class="text-indigo-600 hover:text-indigo-800 p-2 rounded-full hover:bg-indigo-50" title="View Profile">
                <i class="fas fa-eye"></i>
            </a>
            <a href="#" class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50" title="Send Message">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="#" class="text-green-600 hover:text-green-800 p-2 rounded-full hover:bg-green-50" title="Edit User">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    `;

    return div;
}

            // Initial load
            searchUsers();
        });
    </script>
</x-app-layout>
