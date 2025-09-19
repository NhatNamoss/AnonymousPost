<?php
    $page = "ebook";
    $page_title = "E-book Lập trình - CLB Tin Học";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
    include "modules/head.php";
?>

<?php include "modules/nav.php"; ?>

    <section class="hero-section text-white pt-36 pb-16">
        <div class="container mx-auto px-6 py-20">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="mb-6">
                    <i data-feather="book-open" class="w-16 h-16 mx-auto text-white mb-4"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">E-book Lập trình</h1>
                <p class="text-xl mb-8">Bộ sưu tập sách điện tử chuyên sâu về lập trình, từ cơ bản đến nâng cao</p>
                <div class="flex justify-center space-x-4">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm" id="total-ebooks">Loading...</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm" id="total-categories">Loading...</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">Miễn phí</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Về Thư viện E-book</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Thư viện E-book Lập trình của CLB Tin Học là tập hợp những cuốn sách điện tử chất lượng cao, 
                        được biên soạn và tuyển chọn kỹ lưỡng bởi đội ngũ thành viên có kinh nghiệm. Chúng tôi cam kết 
                        mang đến cho bạn những tài liệu học tập tốt nhất, giúp bạn nâng cao kỹ năng lập trình một cách hiệu quả.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center p-6">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="download" class="w-8 h-8 text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Tải về miễn phí</h3>
                        <p class="text-gray-600">Tất cả E-book đều được cung cấp miễn phí cho thành viên CLB</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="check-circle" class="w-8 h-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Chất lượng cao</h3>
                        <p class="text-gray-600">Được kiểm duyệt và biên tập bởi các chuyên gia trong ngành</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-feather="refresh-cw" class="w-8 h-8 text-purple-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Cập nhật thường xuyên</h3>
                        <p class="text-gray-600">Thư viện được bổ sung và cập nhật nội dung định kỳ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Bộ sưu tập E-book</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Khám phá thư viện phong phú với các chủ đề lập trình đa dạng</p>
            </div>

            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button onclick="loadEbooks('')" class="category-btn active bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer hover:opacity-80 transition" data-category="">Tất cả</button>
                <div id="categories-container"></div>
            </div>

            <div id="ebooks-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Ebooks will be loaded here -->
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <button id="load-more-btn" onclick="loadMoreEbooks()" 
                   class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300" style="display: none;">
                    Xem thêm E-book
                </button>
            </div>
        </div>
    </section>

    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" id="stats-container">
                <!-- Stats will be loaded here -->
            </div>
        </div>
    </section>

<?php include "modules/footer.php"; ?>

<script src="assets/js/api.js"></script>
<script>
let currentCategory = '';
let currentPage = 1;
const limit = 9;

document.addEventListener('DOMContentLoaded', function() {
    loadCategories();
    loadEbooks();
    loadStats();
});

async function loadCategories() {
    try {
        const response = await ebookAPI.getCategories();
        if (response.success) {
            const container = document.getElementById('categories-container');
            
            response.data.forEach(cat => {
                const color = getCategoryColor(cat.category);
                const button = document.createElement('button');
                button.className = `category-btn bg-gradient-to-r ${color} text-white px-6 py-2 rounded-full text-sm font-medium cursor-pointer hover:opacity-80 transition`;
                button.setAttribute('data-category', cat.category);
                button.textContent = cat.category;
                button.onclick = () => loadEbooks(cat.category);
                
                container.appendChild(button);
            });
        }
    } catch (error) {
        console.error('Error loading categories:', error);
    }
}

async function loadEbooks(category = '') {
    try {
        showLoading(document.getElementById('ebooks-container'));
        
        currentCategory = category;
        currentPage = 1;
        
        const filters = {};
        if (category) filters.category = category;
        
        const response = await ebookAPI.getEbooks(filters);
        
        if (response.success) {
            displayEbooks(response.data);
            updateActiveCategory(category);
            updateStats();
        } else {
            showError(document.getElementById('ebooks-container'), response.message);
        }
    } catch (error) {
        showError(document.getElementById('ebooks-container'), 'Lỗi tải dữ liệu');
        console.error('Error loading ebooks:', error);
    }
}

function displayEbooks(ebooks) {
    const container = document.getElementById('ebooks-container');
    
    if (ebooks.length === 0) {
        container.innerHTML = `
            <div class="col-span-full text-center py-16">
                <i data-feather="book" class="w-16 h-16 mx-auto text-gray-400 mb-4"></i>
                <p class="text-xl text-gray-500">Không tìm thấy e-book nào.</p>
            </div>
        `;
        feather.replace();
        return;
    }
    
    let html = '';
    ebooks.forEach((ebook, index) => {
        const color = getCategoryColor(ebook.category);
        const delay = (index % 3) * 100;
        
        html += `
            <div class="ebook-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300" data-aos="zoom-in" data-aos-delay="${delay}">
                <div class="h-48 bg-gradient-to-br ${color} flex items-center justify-center">
                    ${ebook.cover_image 
                        ? `<img src="${ebook.cover_image}" alt="${ebook.title}" class="w-full h-full object-cover">` 
                        : `<i data-feather="book" class="w-16 h-16 text-white"></i>`
                    }
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-600">${ebook.category}</span>
                        <span class="text-sm text-gray-500">${ebook.pages ? ebook.pages + ' trang' : 'N/A'}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">${ebook.title}</h3>
                    <p class="text-gray-600 mb-4">${ebook.description.length > 100 ? ebook.description.substring(0, 100) + '...' : ebook.description}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i data-feather="user" class="w-4 h-4 mr-1"></i>
                            <span>${ebook.author || 'ITC Team'}</span>
                        </div>
                        <a href="ebook_detail.php?id=${ebook.id}" class="text-blue-500 font-medium inline-flex items-center hover:text-blue-600 transition">
                            Xem chi tiết
                            <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
    feather.replace();
    
    // Reinitialize AOS animations
    if (typeof AOS !== 'undefined') {
        AOS.refresh();
    }
}

function updateActiveCategory(category) {
    // Remove active class from all buttons
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
        if (category === '' && btn.getAttribute('data-category') === '') {
            btn.classList.add('active');
        } else if (btn.getAttribute('data-category') === category) {
            btn.classList.add('active');
        }
    });
}

async function updateStats() {
    try {
        const response = await ebookAPI.getEbooks();
        if (response.success) {
            const totalEbooks = response.data.length;
            
            // Update stats in hero section
            document.getElementById('total-ebooks').textContent = `${totalEbooks}+ E-books`;
            
            // Get unique categories count
            const categories = [...new Set(response.data.map(ebook => ebook.category))];
            document.getElementById('total-categories').textContent = `${categories.length}+ Ngôn ngữ`;
            
            // Update stats section
            const totalDownloads = response.data.reduce((sum, ebook) => sum + (parseInt(ebook.download_count) || 0), 0);
            
            document.getElementById('stats-container').innerHTML = `
                <div data-aos="fade-up">
                    <div class="text-3xl md:text-4xl font-bold mb-2">${totalEbooks}+</div>
                    <div class="text-blue-200">E-books</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl md:text-4xl font-bold mb-2">${categories.length}+</div>
                    <div class="text-blue-200">Ngôn ngữ lập trình</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl md:text-4xl font-bold mb-2">${formatNumber(totalDownloads)}+</div>
                    <div class="text-blue-200">Lượt tải</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl md:text-4xl font-bold mb-2">15</div>
                    <div class="text-blue-200">Tác giả</div>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error updating stats:', error);
    }
}

async function loadMoreEbooks() {
    // Implementation for pagination if needed
    currentPage++;
    // This would load more ebooks and append to existing ones
}
</script>
