<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Courses - UniHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#10b981',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-reverse': 'float-reverse 8s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'float-reverse': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .course-card {
            transition: all 0.3s ease;
            height: 100%;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .platform-logo {
            height: 40px;
            object-fit: contain;
            filter: grayscale(100%) opacity(0.7);
            transition: all 0.3s ease;
        }

        .platform-logo:hover {
            filter: grayscale(0) opacity(1);
        }

        .animated-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-slate-200 overflow-x-hidden">
    <x-app-layout>
        <!-- Animated Background Shapes -->
        <div class="fixed top-0 left-0 w-full h-full -z-10 overflow-hidden">
            <div class="animated-shape bg-indigo-500 w-64 h-64 -top-32 -left-32 animate-float"></div>
            <div class="animated-shape bg-green-500 w-96 h-96 -bottom-48 -right-48 animate-float-reverse"></div>
            <div class="animated-shape bg-purple-500 w-80 h-80 top-1/4 -right-40 animate-pulse-slow"></div>
            <div class="animated-shape bg-blue-500 w-72 h-72 bottom-1/3 -left-36 animate-float" style="animation-delay: 2s;"></div>
        </div>

        <!-- Hero Section -->
        <section class="hero-section py-12 relative overflow-hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Discover Free Online Courses</h1>
                        <p class="text-lg text-gray-600 mb-6">Gain access to diverse free courses offered by top global platforms

                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mt-6 ml-20">
                            <a href="#courses" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition-all duration-300 text-lg">
                                🎓 Browse Courses
                            </a>
                            <a href="#platforms" class="px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold rounded-xl shadow-md transition-all duration-300 text-lg">
                                🌐 View Platforms
                            </a>
                        </div>

                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ asset('images/image22.png') }}" alt="">
                        {{-- <img src="https://img.freepik.com/free-vector/online-tutorials-concept_52683-37481.jpg" alt="Online Learning" class="w-full rounded-xl shadow-lg"> --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
        <section id="courses" class="filter-section py-6 bg-white shadow-sm sticky top-0 z-10">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <select class="form-select w-full" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="programming">Programming</option>
                            <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="science">Science</option>
                            <option value="language">Languages</option>
                            <option value="personal">Personal Development</option>
                        </select>
                    </div>
                    <div>
                        <select class="form-select w-full" id="levelFilter">
                            <option value="">All Levels</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                    <div>
                        <select class="form-select w-full" id="platformFilter">
                            <option value="">All Platforms</option>
                            <option value="coursera">Coursera</option>
                            <option value="edx">edX</option>
                            <option value="udemy">Udemy</option>
                            <option value="futurelearn">FutureLearn</option>
                            <option value="khan">Khan Academy</option>

                              <!-- المنصات الجديدة -->
    <option value="edraak">Edraak</option>
    <option value="satar"> Satar</option>
    <option value="kaggle">Kaggle</option>
    <option value="freelancer">Freelancer Courses </option>
                        </select>
                    </div>
                    <div>
                        <input type="text" class="form-control w-full" id="searchInput" placeholder="Search courses...">
                    </div>
                    <div>
                        <button id="resetFilters" class="btn btn-outline-secondary w-full">Reset Filters</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section class="courses-section py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Featured Courses</h2>
                    <p class="text-gray-600">Learn new skills with these free courses</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="coursesContainer">
                    <!-- Courses will be loaded here dynamically -->
                </div>

                <div class="text-center mt-10">
                    <button class="btn btn-outline-primary px-8 py-3" id="loadMoreBtn">Load More Courses</button>
                </div>
            </div>
        </section>

        <!-- Platforms Section -->
        <section id="platforms" class="platforms-section py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Our Partner Platforms</h2>
                    <p class="text-gray-600">Free courses from these trusted platforms</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-items-center">
                    <a href="https://www.coursera.org/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
                        <img src="https://down-id.img.susercontent.com/file/582ea702c732e8b4e6557366316b5fa3" alt="Coursera" class="platform-logo">
                    </a>
                    <a href="https://www.edx.org/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
                        <img src="https://www.harvardmagazine.com/sites/default/files/img/article/0512/edxweb.jpg" alt="edX">
                                       </a>
                    <a href="https://www.udemy.com/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Udemy_logo.svg/2560px-Udemy_logo.svg.png" alt="Udemy" class="platform-logo">
                    </a>
                    <a href="https://www.futurelearn.com/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
                        <img src="https://assets.shortpedia.com/Voices/wp-content/uploads/2021/07/Futurelearn.jpg" alt="FutureLearn" class="platform-logo">
                    </a>
                    <a href="https://www.khanacademy.org/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
                        <img src="https://cdn.kastatic.org/images/khan-logo-dark-background.png" alt="Khan Academy" class="platform-logo">
                    </a>

                      <!-- المنصات الجديدة -->
    <a href="https://www.edraak.org/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
        <img src="https://cdn.al-ain.com/images/2018/9/18/127-220539-edrak-school-learning-jordan_700x400.jpeg" alt="edraak" class="platform-logo">
    </a>
    <a href="https://satr.codes/" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
        <img src="https://satr.codes/assets/images/logo.png" alt=" satar" class="platform-logo">
    </a>
    <a href="https://www.kaggle.com/learn" target="_blank" class="p-4 hover:bg-gray-50 rounded-lg transition-all">
        <img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/189_Kaggle_logo_logos-512.png" alt="kaggle" class="platform-logo">
    </a>


                </div>
                <div class="container mx-auto flex flex-col items-center justify-center px-4">
                    <p class="text-sm text-center">&copy; 2025 UniHub. All rights reserved.</p>
                </div>


                </div>            </div>
        </section>

        <!-- JavaScript -->
        <script>
            // Real free courses data with working links (20 courses)
            const coursesData = [
                {
                    id: 1,
                    title: "Introduction to Computer Science",
                    category: "programming",
                    level: "beginner",
                    platform: "edx",
                    image: "https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg",
                    duration: "6 weeks",
                    rating: 4.8,
                    link: "https://www.edx.org/course/introduction-computer-science-harvardx-cs50x"
                },
                {
                    id: 2,
                    title: "Machine Learning Fundamentals",
                    category: "programming",
                    level: "intermediate",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/artificial-intelligence-isometric-flowchart_1284-18088.jpg",
                    duration: "8 weeks",
                    rating: 4.7,
                    link: "https://www.coursera.org/learn/machine-learning"
                },
                {
                    id: 3,
                    title: "Graphic Design Basics",
                    category: "design",
                    level: "beginner",
                    platform: "udemy",
                    image: "https://img.freepik.com/free-vector/graphic-design-colorful-geometrical-lettering_52683-34588.jpg",
                    duration: "4 weeks",
                    rating: 4.6,
                    link: "https://www.udemy.com/course/graphic-design-fundamentals/"
                },
                {
                    id: 4,
                    title: "Business Strategy Specialization",
                    category: "business",
                    level: "intermediate",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/business-team-putting-together-jigsaw-puzzle-isolated-flat-vector-illustration-cartoon-partners-working-connection-teamwork-partnership-cooperation-concept_74855-9814.jpg",
                    duration: "5 months",
                    rating: 4.7,
                    link: "https://www.coursera.org/specializations/business-strategy"
                },
                {
                    id: 5,
                    title: "Digital Marketing Fundamentals",
                    category: "marketing",
                    level: "beginner",
                    platform: "futurelearn",
                    image: "https://img.freepik.com/free-vector/digital-marketing-background_52683-22133.jpg",
                    duration: "6 weeks",
                    rating: 4.5,
                    link: "https://www.futurelearn.com/courses/digital-marketing"
                },
                {
                    id: 6,
                    title: "English for Career Development",
                    category: "language",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/hand-drawn-english-school-background_23-2149464866.jpg",
                    duration: "10 weeks",
                    rating: 4.8,
                    link: "https://www.coursera.org/learn/careerdevelopment"
                },
                {
                    id: 7,
                    title: "Python for Everybody",
                    category: "programming",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg",
                    duration: "7 weeks",
                    rating: 4.8,
                    link: "https://www.coursera.org/specializations/python"
                },
                {
                    id: 8,
                    title: "Data Science Fundamentals",
                    category: "science",
                    level: "intermediate",
                    platform: "edx",
                    image: "https://i.pinimg.com/originals/f9/ef/d2/f9efd2127402e38f9bfbc0f59289b263.jpg",
                    duration: "12 weeks",
                    rating: 4.6,
                    link: "https://www.edx.org/professional-certificate/harvardx-data-science"
                },
                {
                    id: 9,
                    title: "Web Development for Beginners",
                    category: "programming",
                    level: "beginner",
                    platform: "udemy",
                    image: "https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg",
                    duration: "8 weeks",
                    rating: 4.7,
                    link: "https://www.udemy.com/course/the-web-developer-bootcamp/"
                },
                {
                    id: 10,
                    title: "Financial Markets",
                    category: "business",
                    level: "intermediate",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/hand-drawn-financial-concept_23-2149163215.jpg",
                    duration: "7 weeks",
                    rating: 4.7,
                    link: "https://www.coursera.org/learn/financial-markets-global"
                },
                {
                    id: 11,
                    title: "Learning How to Learn",
                    category: "personal",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/hand-drawn-people-learning-knowledge_23-2148859681.jpg",
                    duration: "4 weeks",
                    rating: 4.8,
                    link: "https://www.coursera.org/learn/learning-how-to-learn"
                },
                {
                    id: 12,
                    title: "Introduction to Psychology",
                    category: "science",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/psychology-concept-illustration_114360-3995.jpg",
                    duration: "6 weeks",
                    rating: 4.9,
                    link: "https://www.coursera.org/learn/introduction-psychology"
                },
                {
                    id: 13,
                    title: "Excel Skills for Business",
                    category: "business",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/business-presentation-concept-illustration_114360-1640.jpg",
                    duration: "6 weeks",
                    rating: 4.8,
                    link: "https://www.coursera.org/specializations/excel"
                },
                {
                    id: 14,
                    title: "Photography Basics",
                    category: "design",
                    level: "beginner",
                    platform: "udemy",
                    image: "https://img.freepik.com/free-vector/photographer-concept-illustration_114360-2663.jpg",
                    duration: "5 weeks",
                    rating: 4.6,
                    link: "https://www.udemy.com/course/photography-masterclass-complete-beginner-to-advanced-course/"
                },
                {
                    id: 15,
                    title: "Islamic",
                    category: "Science",
                    level: "beginner",
                    platform: "edraak",
                    image: "https://ar.dawahskills.com/wp-content/uploads/2019/09/%D8%A7%D9%84%D9%81%D9%86-%D8%A7%D9%84%D8%A5%D8%B3%D9%84%D8%A7%D9%85%D9%8A.jpg",
                    duration: "8 weeks",
                    rating: 4.5,
                    link: "https://www.edraak.org/programs/course/iis-vt3_2020/"
                },
                {
                    id: 16,
                    title: "Nutrition and Health",
                    category: "personal",
                    level: "beginner",
                    platform: "edx",
                    image: "https://img.freepik.com/free-vector/nutritionist-concept-illustration_114360-1429.jpg",
                    duration: "6 weeks",
                    rating: 4.6,
                    link: "https://www.edx.org/course/nutrition-and-health-human-microbiome"
                },
                {
                    id: 17,
                    title: "AI For Everyone",
                    category: "programming",
                    level: "beginner",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/artificial-intelligence-isometric-flowchart_1284-18088.jpg",
                    duration: "4 weeks",
                    rating: 4.7,
                    link: "https://www.coursera.org/learn/ai-for-everyone"
                },
                {
                    id: 18,
                    title: "Public Speaking",
                    category: "personal",
                    level: "intermediate",
                    platform: "udemy",
                    image: "https://img.freepik.com/free-vector/business-presentation-concept-illustration_114360-1640.jpg",
                    duration: "5 weeks",
                    rating: 4.6,
                    link: "https://www.udemy.com/course/public-speaking-and-presentation/"
                },
                {
                    id: 19,
                    title: "Game Development",
                    category: "programming",
                    level: "intermediate",
                    platform: "coursera",
                    image: "https://img.freepik.com/free-vector/game-streamer-concept-illustration_114360-2144.jpg",
                    duration: "8 weeks",
                    rating: 4.5,
                    link: "https://www.coursera.org/specializations/game-development"
                },
                {
                    id: 20,
                    title: "Entrepreneurship 101",
                    category: "business",
                    level: "beginner",
                    platform: "edx",
                    image: "https://img.freepik.com/free-vector/business-startup-concept-illustration_114360-1628.jpg",
                    duration: "6 weeks",
                    rating: 4.7,
                    link: "https://www.edx.org/course/entrepreneurship-101-who-is-your-customer"
                },


             // New Satar courses
    {
        id: 23,
        title: "SQL 102",
        category: "programming",
        level: "beginner",
        platform: "satar",
        image: "https://ebac.mx/blog/wp-content/uploads/2022/09/image1-8.jpg",
        duration: "6 weeks",
        rating: 4.7,
        link: "https://satr.codes/course/APjgdQqVWR/view"
    },


    // New Kaggle courses
    {
        id: 25,
        title: "Python for Data Science",
        category: "programming",
        level: "beginner",
        platform: "kaggle",
        image: "https://img.freepik.com/free-vector/data-science-isometric-concept_1284-18125.jpg",
        duration: "4 weeks",
        rating: 4.8,
        link: "https://www.kaggle.com/learn/python"
    },
    {
        id: 26,
        title: "Machine Learning Explainability",
        category: "programming",
        level: "intermediate",
        platform: "kaggle",
        image: "https://img.freepik.com/free-vector/machine-learning-concept-illustration_114360-8273.jpg",
        duration: "3 weeks",
        rating: 4.7,
        link: "https://www.kaggle.com/learn/machine-learning-explainability"
    },

    // Freelancer courses
    {
        id: 27,
        title: "Freelancing: Starting Your Journey",
        category: "freelancer",
        level: "beginner",
        platform: "freelancer",
        image: "https://img.freepik.com/free-vector/freelancer-working-laptop-concept-illustration_114360-7968.jpg",
        duration: "3 weeks",
        rating: 4.7,
        link: "https://youtu.be/pJuAbjIVOWE?si=CbfsrhVED16NypQA"
    },
    {
        id: 28,
        title: "Building a Winning Portfolio",
        category: "freelancer",
        level: "intermediate",
        platform: "freelancer",
        image: "https://img.freepik.com/free-vector/portfolio-concept-illustration_114360-7994.jpg",
        duration: "2 weeks",
        rating: 4.6,
        link: "https://youtu.be/UFu7Ydow3TA?si=XaLZp6Gb4WH1_M6P"
    },
    {
        id: 29,
        title: "Client Communication Mastery",
        category: "freelancer",
        level: "intermediate",
        platform: "freelancer",
        image: "https://img.freepik.com/free-vector/business-negotiation-concept-illustration_114360-7980.jpg",
        duration: "3 weeks",
        rating: 4.8,
        link: "https://youtu.be/cZ_nqaptW88?si=_i6pRKj1i11ezRmb"
    },
    {
        id: 30,
        title: "Advanced Freelance Pricing Strategies",
        category: "freelancer",
        level: "advanced",
        platform: "freelancer",
        image: "https://img.freepik.com/free-vector/money-income-concept-illustration_114360-7969.jpg",
        duration: "4 weeks",
        rating: 4.5,
        link: "https://youtu.be/zkzEwKgKq7U?si=ayxPBTxMyo6JojL2"
    }
];

// Update the formatPlatformName function to include new platforms
function formatPlatformName(platform) {
    const platforms = {
        'coursera': 'Coursera',
        'edx': 'edX',
        'udemy': 'Udemy',
        'futurelearn': 'FutureLearn',
        'khan': 'Khan Academy',
        'edraak': 'Edraak',
        'satar': 'Satar',
        'kaggle': 'Kaggle',
        'freelancer': 'Freelancer'
    };
    return platforms[platform] || platform;
}

// Update the formatCategoryName function to include freelancer category
function formatCategoryName(category) {
    const categories = {
        'programming': 'Programming',
        'design': 'Design',
        'business': 'Business',
        'marketing': 'Marketing',
        'language': 'Language',
        'science': 'Science',
        'personal': 'Personal Dev',
        'freelancer': 'Freelancing'
    };
    return categories[category] || category;
}
// ..
            // Variables for filtering and pagination
            let displayedCourses = 8;
            let filteredCourses = [...coursesData];

            // Display courses function
            function displayCourses(courses) {
                const container = document.getElementById('coursesContainer');
                container.innerHTML = '';

                courses.slice(0, displayedCourses).forEach(course => {
                    const courseCard = `
                        <div class="course-card bg-white rounded-xl overflow-hidden shadow-sm flex flex-col">
                            <div class="course-img relative">
                                <img src="${course.image}" alt="${course.title}" class="w-full h-48 object-cover">
                                <span class="badge bg-primary absolute top-3 left-3 m-1 px-2 py-1 text-xs rounded">${formatPlatformName(course.platform)}</span>
                            </div>
                            <div class="p-4 flex-grow flex flex-col">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="badge bg-secondary px-2 py-1 text-xs rounded">${formatCategoryName(course.category)}</span>
                                    <span class="text-gray-500 text-sm"><i class="far fa-clock me-1"></i>${course.duration}</span>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">${course.title}</h3>
                                <div class="mt-auto">
                                    <div class="flex justify-between items-center mb-3">
                                        <div class="rating">
                                            ${generateRatingStars(course.rating)}
                                            <span class="ms-1 text-sm">(${course.rating})</span>
                                        </div>
                                        <span class="badge ${getLevelBadgeClass(course.level)} px-2 py-1 text-xs rounded">${formatLevelName(course.level)}</span>
                                    </div>
                                    <a href="${course.link}" target="_blank" class="btn btn-primary w-full mt-2 py-2">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', courseCard);
                });
            }

            // Helper functions
            function generateRatingStars(rating) {
                let stars = '';
                const fullStars = Math.floor(rating);
                const hasHalfStar = rating % 1 >= 0.5;

                for (let i = 0; i < fullStars; i++) {
                    stars += '<i class="fas fa-star text-yellow-400"></i>';
                }

                if (hasHalfStar) {
                    stars += '<i class="fas fa-star-half-alt text-yellow-400"></i>';
                }

                const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
                for (let i = 0; i < emptyStars; i++) {
                    stars += '<i class="far fa-star text-yellow-400"></i>';
                }

                return stars;
            }

            function getLevelBadgeClass(level) {
                switch (level) {
                    case 'beginner': return 'bg-green-100 text-green-800';
                    case 'intermediate': return 'bg-yellow-100 text-yellow-800';
                    case 'advanced': return 'bg-red-100 text-red-800';
                    default: return 'bg-gray-100 text-gray-800';
                }
            }

            function formatPlatformName(platform) {
                const platforms = {
                    'coursera': 'Coursera',
                    'edx': 'edX',
                    'udemy': 'Udemy',
                    'futurelearn': 'FutureLearn',
                    'khan': 'Khan Academy'
                };
                return platforms[platform] || platform;
            }

            function formatCategoryName(category) {
                const categories = {
                    'programming': 'Programming',
                    'design': 'Design',
                    'business': 'Business',
                    'marketing': 'Marketing',
                    'language': 'Language',
                    'science': 'Science',
                    'personal': 'Personal Dev'
                };
                return categories[category] || category;
            }

            function formatLevelName(level) {
                const levels = {
                    'beginner': 'Beginner',
                    'intermediate': 'Intermediate',
                    'advanced': 'Advanced'
                };
                return levels[level] || level;
            }

            // Filter courses function
            function filterCourses() {
                const category = document.getElementById('categoryFilter').value;
                const level = document.getElementById('levelFilter').value;
                const platform = document.getElementById('platformFilter').value;
                const search = document.getElementById('searchInput').value.toLowerCase();

                filteredCourses = coursesData.filter(course => {
                    return (category === '' || course.category === category) &&
                           (level === '' || course.level === level) &&
                           (platform === '' || course.platform === platform) &&
                           (search === '' || course.title.toLowerCase().includes(search));
                });

                displayedCourses = 8;
                displayCourses(filteredCourses);

                // Show/hide load more button
                document.getElementById('loadMoreBtn').style.display =
                    filteredCourses.length > displayedCourses ? 'inline-block' : 'none';
            }

            // Reset filters function
            function resetFilters() {
                document.getElementById('categoryFilter').value = '';
                document.getElementById('levelFilter').value = '';
                document.getElementById('platformFilter').value = '';
                document.getElementById('searchInput').value = '';

                filteredCourses = [...coursesData];
                displayedCourses = 8;
                displayCourses(filteredCourses);

                // Show load more button if needed
                document.getElementById('loadMoreBtn').style.display =
                    filteredCourses.length > displayedCourses ? 'inline-block' : 'none';
            }

            // Load more courses function
            function loadMoreCourses() {
                displayedCourses += 8;
                displayCourses(filteredCourses);

                if (displayedCourses >= filteredCourses.length) {
                    document.getElementById('loadMoreBtn').style.display = 'none';
                }
            }

            // Initialize the page
            document.addEventListener('DOMContentLoaded', function() {
                displayCourses(coursesData);

                // Add event listeners
                document.getElementById('categoryFilter').addEventListener('change', filterCourses);
                document.getElementById('levelFilter').addEventListener('change', filterCourses);
                document.getElementById('platformFilter').addEventListener('change', filterCourses);
                document.getElementById('searchInput').addEventListener('input', filterCourses);
                document.getElementById('resetFilters').addEventListener('click', resetFilters);
                document.getElementById('loadMoreBtn').addEventListener('click', loadMoreCourses);

                // Hide load more button if not needed
                if (filteredCourses.length <= displayedCourses) {
                    document.getElementById('loadMoreBtn').style.display = 'none';
                }
            });
        </script>
    </x-app-layout>
</body>
</html>
