<?php
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/modules/head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnonPost - Share Anonymously</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="bg-gray-50">

        <!-- Main Feed -->
        <div class="md:col-span-6 space-y-4">
            <!-- Create Post -->
            <div class="bg-white rounded-lg shadow p-4" data-aos="fade-up">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                        <i data-feather="user"></i>
                    </div>
                    <input 
                        type="text" 
                        placeholder="What's on your mind?" 
                        class="flex-1 bg-gray-100 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        id="postInput"
                    >
                </div>
                <div class="flex justify-between mt-4 pt-4 border-t">
                    <button class="flex items-center space-x-2 text-gray-500 hover:bg-gray-100 px-3 py-1 rounded">
                        <i data-feather="image" class="text-green-500"></i>
                        <span>Photo</span>
                    </button>
                    <button class="flex items-center space-x-2 text-gray-500 hover:bg-gray-100 px-3 py-1 rounded">
                        <i data-feather="smile" class="text-yellow-500"></i>
                        <span>Feeling</span>
                    </button>
                    <button 
                        class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600 transition"
                        id="postButton"
                    >
                        Post
                    </button>
                </div>
            </div>

            <!-- Posts -->
            <div class="bg-white rounded-lg shadow overflow-hidden post-card transition" data-aos="fade-up">
                <div class="p-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                            <i data-feather="user"></i>
                        </div>
                        <div>
                            <div class="font-medium">Anonymous User</div>
                            <div class="text-xs text-gray-500">2 hours ago</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Sometimes I wonder if anyone else feels as lonely as I do in a crowded room.</p>
                    </div>
                </div>
                <div class="border-t border-b">
                    <img src="http://static.photos/abstract/640x360/1" alt="Post image" class="w-full">
                </div>
                <div class="p-4">
                    <div class="flex justify-between text-gray-500 text-sm">
                        <div>24 likes</div>
                        <div>8 comments</div>
                    </div>
                    <div class="flex border-t mt-3 pt-3">
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="thumbs-up"></i>
                            <span>Like</span>
                        </button>
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="message-square"></i>
                            <span>Comment</span>
                        </button>
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="share-2"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden post-card transition" data-aos="fade-up">
                <div class="p-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                            <i data-feather="user"></i>
                        </div>
                        <div>
                            <div class="font-medium">Anonymous User</div>
                            <div class="text-xs text-gray-500">5 hours ago</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>Just had the most amazing day! Nature always helps me clear my mind.</p>
                    </div>
                </div>
                <div class="border-t border-b">
                    <img src="http://static.photos/nature/640x360/2" alt="Post image" class="w-full">
                </div>
                <div class="p-4">
                    <div class="flex justify-between text-gray-500 text-sm">
                        <div>42 likes</div>
                        <div>15 comments</div>
                    </div>
                    <div class="flex border-t mt-3 pt-3">
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="thumbs-up"></i>
                            <span>Like</span>
                        </button>
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="message-square"></i>
                            <span>Comment</span>
                        </button>
                        <button class="flex-1 flex items-center justify-center space-x-2 py-2 hover:bg-gray-100 rounded">
                            <i data-feather="share-2"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="md:col-span-3 space-y-4 hidden md:block">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-medium mb-3">Trending Today</h3>
                <div class="space-y-3">
                    <div class="flex items-start space-x-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <i data-feather="trending-up" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <div class="font-medium text-sm">#MentalHealthAwareness</div>
                            <div class="text-xs text-gray-500">1.2K posts</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-500">
                            <i data-feather="trending-up" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <div class="font-medium text-sm">#SelfCareSunday</div>
                            <div class="text-xs text-gray-500">856 posts</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-500">
                            <i data-feather="trending-up" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <div class="font-medium text-sm">#AnonymousThoughts</div>
                            <div class="text-xs text-gray-500">723 posts</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-medium mb-3">Suggested for You</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <i data-feather="user"></i>
                            </div>
                            <div>
                                <div class="font-medium text-sm">Anonymous Poet</div>
                                <div class="text-xs text-gray-500">New to AnonPost</div>
                            </div>
                        </div>
                        <button class="text-blue-500 text-sm font-medium">Follow</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <i data-feather="user"></i>
                            </div>
                            <div>
                                <div class="font-medium text-sm">Thought Explorer</div>
                                <div class="text-xs text-gray-500">Followed by 12</div>
                            </div>
                        </div>
                        <button class="text-blue-500 text-sm font-medium">Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Bottom Navigation -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg md:hidden flex justify-around py-3 px-4 z-50">
        <button class="p-2 rounded-full text-blue-500">
            <i data-feather="home"></i>
        </button>
        <button class="p-2 rounded-full">
            <i data-feather="compass"></i>
        </button>
        <button class="p-2 rounded-full">
            <i data-feather="plus-square"></i>
        </button>
        <button class="p-2 rounded-full">
            <i data-feather="bell"></i>
        </button>
        <button class="p-2 rounded-full">
            <i data-feather="menu"></i>
        </button>
    </div>

    <script>
        AOS.init();
        feather.replace();
        
        // Simple post functionality
        document.getElementById('postButton').addEventListener('click', function() {
            const postInput = document.getElementById('postInput');
            if (postInput.value.trim() !== '') {
                alert('Your anonymous post has been shared!');
                postInput.value = '';
            }
        });
    </script>
</body>
</html>
