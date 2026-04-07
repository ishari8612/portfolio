<?php
$siteTitle = 'Portfolio- Ishari';
$ownerName = 'Ishari Priyadarshani';
$navItems = [
    ['label' => 'Home', 'href' => 'index.html'],
    ['label' => 'About', 'href' => 'about.html'],
    ['label' => 'Portfolio', 'href' => 'portfolio.php'],
    ['label' => 'Contact', 'href' => 'contact.html'],
];
$intro = [
    'headline' => 'My Portfolio',
    'description' => "Hey I'm <span>Ishari Priyadarshani</span>, a passionate web developer and designer.",
];
$about = [
    'image' => 'images/grad1.jpg',
    'subtitle' => 'About Me',
    'bio' => "I’m an enthusiastic IT undergraduate with a strong interest in coding
                        and software development. I enjoy solving problems, learning new
                        technologies, and working with others to build creative solutions. I’m
                        eager to apply what I’ve learned in the classroom to real-world
                        projects and gain hands-on experience",
    'tabs' => [
        ['id' => 'skills', 'label' => 'Skills'],
        ['id' => 'experience', 'label' => 'Experience'],
        ['id' => 'education', 'label' => 'Education'],
    ],
    'contents' => [
        'skills' => [
            ['text' => 'HTML'],
            ['text' => 'CSS'],
            ['text' => 'JavaScript'],
            ['text' => 'React'],
            ['text' => 'Node.js'],
            ['text' => 'C#'],
            ['text' => '.Net'],
            ['text' => 'SQL'],
            ['text' => 'Git'],
        ],
        'experience' => [
            ['title' => 'Library Management System', 'items' => ['.Net', 'C#', 'HTML', 'CSS', 'SQL Server']],
            ['title' => 'Inventory Management System', 'items' => ['Java Application', 'JDK', 'MS SQL Server']],
            ['title' => 'Tickets Booking Website', 'items' => ['PHP', 'HTML', 'CSS', 'SQL Server']],
        ],
        'education' => [
            ['title' => 'Diploma in Information Technology', 'subtitle' => 'University of Colombo'],
            ['title' => 'Bachelor of Science in Information Technology', 'subtitle' => 'University of Colombo (reading)'],
        ],
    ],
];
$services = [
    [
        'icon' => 'fa-solid fa-code',
        'title' => 'Web Development',
        'description' => 'I create responsive and user-friendly websites using HTML, CSS, JavaScript, and React.',
        'href' => '#',
    ],
];
$portfolioItems = [
    [
        'image' => 'images/library.jpg',
        'title' => 'Library Management System',
        'description' => 'A library management system is a software application designed to manage and organize the operations of a library.',
    ],
    [
        'image' => 'images/invent.jpg',
        'title' => 'Inventory Management System',
        'description' => 'An inventory management system is a software application that helps businesses track and manage',
    ],
    [
        'image' => 'images/tbooking.jpg',
        'title' => 'Tickets Booking Website',
        'description' => 'A ticket booking website is an online platform that allows users to purchase tickets for various event',
    ],
];
$vueData = [
    'navItems' => $navItems,
    'ownerName' => $ownerName,
    'intro' => $intro,
    'about' => $about,
    'services' => $services,
    'portfolioItems' => $portfolioItems,
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($siteTitle) ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4d04e9a80d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <div id="header">
            <div class="container">
                <nav>
                    <h1><a href="index.html"><?= htmlspecialchars($ownerName) ?></a></h1>
                    <ul>
                        <li v-for="item in navItems" :key="item.label">
                            <a :href="item.href">{{ item.label }}</a>
                        </li>
                    </ul>
                </nav>
                <div class="header-content">
                    <h2>{{ intro.headline }}</h2>
                    <p v-html="intro.description"></p>
                </div>
            </div>
        </div>

        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="about-col-1">
                        <img :src="about.image" alt="About image">
                    </div>
                    <div class="about-col-2">
                        <h1 class="subtitle">{{ about.subtitle }}</h1>
                        <p>{{ about.bio }}</p>
                        <div class="tab-titles">
                            <p
                                v-for="tab in about.tabs"
                                :key="tab.id"
                                :class="['tab-links', { 'active-link': activeTab === tab.id }]"
                                @click="activeTab = tab.id"
                            >
                                {{ tab.label }}
                            </p>
                        </div>
                        <div class="tab-contents" v-show="activeTab === 'skills'" id="skills">
                            <ul>
                                <li v-for="skill in about.contents.skills" :key="skill.text"><span>{{ skill.text }}</span></li>
                            </ul>
                        </div>
                        <div class="tab-contents" v-show="activeTab === 'experience'" id="experience">
                            <ul>
                                <li v-for="experience in about.contents.experience" :key="experience.title">
                                    <span>{{ experience.title }}</span>
                                    <li v-for="item in experience.items" :key="item">{{ item }}</li>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-contents" v-show="activeTab === 'education'" id="education">
                            <ul>
                                <li v-for="education in about.contents.education" :key="education.title">
                                    <span>{{ education.title }}</span><br>
                                    {{ education.subtitle }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="services">
            <div class="container">
                <h1 class="subtitles">My Services</h1>
                <div class="services-list">
                    <div v-for="service in services" :key="service.title">
                        <i :class="service.icon"></i>
                        <h2>{{ service.title }}</h2>
                        <p>{{ service.description }}</p>
                        <a :href="service.href">learn more</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="portfolio">
            <div class="container">
                <h1 class="subtitles">My Projects</h1>
                <div class="portfolio-list">
                    <div class="work" v-for="project in portfolioItems" :key="project.title">
                        <img :src="project.image" :alt="project.title">
                        <div class="layer">
                            <h2>{{ project.title }}</h2>
                            <p>{{ project.description }}</p>
                            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.__PORTFOLIO_DATA__ = <?= json_encode($vueData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    </script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <script src="app.js"></script>
</body>
</html>
