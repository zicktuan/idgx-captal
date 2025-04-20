document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".link-tag-push");

    items.forEach(item => {
        item.addEventListener("click", function () {
        items.forEach(i => i.classList.remove("active"));
        this.classList.add("active");
        });
    });
});
// document.addEventListener('DOMContentLoaded', function() {
//     // Lấy tất cả các button trong menu
//     const menuButtons = document.querySelectorAll('.link-tag-push');
//     // Lấy tất cả các phần tử team
//     const teamItems = document.querySelectorAll('.team-grid .relative');

//     // Hàm để ẩn tất cả các phần tử
//     function hideAllItems() {
//         teamItems.forEach(item => {
//             item.style.display = 'none';
//         });
//     }

//     // Hàm để hiển thị các phần tử dựa trên category
//     function showItems(category, isParent = false) {
//         hideAllItems();
        
//         teamItems.forEach(item => {
//             const title = item.querySelector('p:nth-child(2)').textContent.toLowerCase();
            
//             if (category === 'all') {
//                 item.style.display = 'flex';
//                 return;
//             }

//             // Xử lý các danh mục chính
//             const categories = {
//                 'leadership': ['co-founder', 'managing partner', 'general partner', 'cto', 'coo'],
//                 'investing & research': ['partner, investing & research', 'research partner', 'research associate'],
//                 'portfolio & firm operations': [
//                     'chief marketing officer', 'clo, partner', 'chief financial officer', 
//                     'business operations analyst', 'software engineer', 'finance manager',
//                     'assistant controller', 'vp of government affairs', 'chief compliance officer',
//                     'head trader, partner', 'executive assistant', 'senior executive assistant',
//                     'associate general counsel', 'it systems engineering manager', 
//                     'policy manager & head of policy lab', 'senior technical recruiter',
//                     'people operations lead', 'head of talent', 'senior associate of policy operations',
//                     'office manager', 'head of events', 'vp of regulatory affairs', 
//                     'product designer', 'vp of finance', 'investor relations lead',
//                     'vp of engineering', 'head of market development', 'legal operations associate',
//                     'senior finance associate', 'recruiting operations associate',
//                     'head of business operations', 'event manager', 'head of design',
//                     'office coordinator', 'counsel'
//                 ],
//                 'collaborators': ['design collaborator', 'venture partner', 'eir'],
//                 'policy council': ['research advisor']
//             };

//             // Xử lý các danh mục con của Portfolio & Firm Operations
//             const subCategories = {
//                 'talent': ['head of talent', 'senior technical recruiter', 'internal talent lead', 'recruiting operations associate'],
//                 'legal & policy': ['clo, partner', 'chief compliance officer', 'associate general counsel', 'policy manager & head of policy lab', 'vp of regulatory affairs', 'general counsel', 'counsel', 'legal operations associate', 'senior associate of policy operations'],
//                 'design': ['product designer', 'head of design'],
//                 'go to market': ['head of market development'],
//                 'marketing & comms': ['chief marketing officer'],
//                 'trading': ['head trader, partner'],
//                 'firm operations': [
//                     'chief financial officer', 'business operations analyst', 'finance manager',
//                     'assistant controller', 'vp of finance', 'senior finance associate',
//                     'office manager', 'office coordinator', 'people operations lead',
//                     'head of business operations', 'event manager', 'head of events',
//                     'investor relations lead', 'it systems engineering manager',
//                     'it engineer', 'vp of engineering', 'software engineer'
//                 ]
//             };

//             // Kiểm tra xem category có phải là danh mục cha hay không
//             if (isParent && categories[category]) {
//                 const titlesToShow = categories[category];
//                 if (titlesToShow.some(t => title.includes(t))) {
//                     item.style.display = 'flex';
//                 }
//             }
//             // Kiểm tra danh mục con hoặc danh mục chính không có sub-menu
//             else {
//                 const allCategories = { ...categories, ...subCategories };
//                 if (allCategories[category] && allCategories[category].some(t => title.includes(t))) {
//                     item.style.display = 'flex';
//                 }
//             }
//         });
//     }

//     // Thêm event listener cho mỗi button
//     menuButtons.forEach(button => {
//         button.addEventListener('click', function(e) {
//             e.preventDefault();
//             const category = this.querySelector('span')?.textContent.toLowerCase() || this.textContent.toLowerCase();
            
//             // Xác định xem đây có phải là menu cha không
//             const isParentMenu = this.parentElement.querySelector('ul') !== null;
            
//             showItems(category, isParentMenu);
//         });
//     });

//     // Hiển thị tất cả khi tải trang
//     showItems('all');

//     // Xử lý dropdown cho mobile
//     const mobileMenuButton = document.querySelector('.md\\:hidden .border button');
//     const mobileMenuContent = document.querySelector('.md\\:hidden .overflow-hidden');
    
//     if (mobileMenuButton && mobileMenuContent) {
//         mobileMenuButton.addEventListener('click', function() {
//             const isOpen = mobileMenuContent.style.height !== '0px';
//             if (isOpen) {
//                 mobileMenuContent.style.height = '0px';
//                 mobileMenuContent.style.opacity = '0';
//             } else {
//                 mobileMenuContent.style.height = 'auto';
//                 mobileMenuContent.style.opacity = '1';
//                 const height = mobileMenuContent.scrollHeight + 'px';
//                 mobileMenuContent.style.height = '0px';
//                 setTimeout(() => {
//                     mobileMenuContent.style.height = height;
//                 }, 10);
//             }
//         });
//     }
// });

