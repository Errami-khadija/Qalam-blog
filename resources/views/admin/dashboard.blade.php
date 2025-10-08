<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qalam Blog Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brown': {
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            200: '#eaddd7',
                            300: '#e0cfc5',
                            400: '#d2bab0',
                            500: '#bfa094',
                            600: '#a18072',
                            700: '#977669',
                            800: '#846358',
                            900: '#43302b'
                        },
                        'beige': {
                            50: '#fefdfb',
                            100: '#fef7f0',
                            200: '#f9f1e9',
                            300: '#f3e8d3',
                            400: '#e9d5ae',
                            500: '#ddbf94',
                            600: '#ca9a7c',
                            700: '#b17c5c',
                            800: '#8d6142',
                            900: '#5c3317'
                        }
                    }
                }
            }
        }
//#############//
let currentPostId = null;

function openDeleteModal(postId) {
    currentPostId = postId;
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/dashboard/posts/${postId}`;

    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('flex');
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
    }, 10);
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}




    </script>
    <style>
        body {
            box-sizing: border-box;
        }
    </style>
</head>


 <!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-opacity duration-300 ease-out opacity-0">
  <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm text-center transform scale-95 transition-transform duration-300 ease-out">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Delete Post</h2>
    <p class="text-gray-600 mb-6">Are you sure you want to delete this post? This action cannot be undone.</p>
    <div class="flex justify-center space-x-4">
      <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition-colors">
        Cancel
      </button>
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
          Delete
        </button>
      </form>
    </div>
  </div>
</div>

<body class="bg-beige-50 font-sans">
    <!-- Header -->
    <header class="bg-brown-800 text-beige-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">Qalam Blog Admin Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-beige-200">Welcome, Admin</span>
                    <button href="route('logout')" class="bg-brown-600 hover:bg-brown-700 px-4 py-2 rounded-lg transition-colors">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Navigation Tabs -->
        <div class="mb-8">
            <nav class="flex space-x-8">
                <button onclick="showTab('posts')" id="posts-tab" class="tab-button active px-4 py-2 font-medium rounded-lg transition-colors bg-brown-600 text-beige-50">
                    Posts
                </button>
                <button onclick="showTab('categories')" id="categories-tab" class="tab-button px-4 py-2 font-medium rounded-lg transition-colors bg-beige-200 text-brown-800 hover:bg-beige-300">
                    Categories
                </button>
                <button onclick="showTab('new-post')" id="new-post-tab" class="tab-button px-4 py-2 font-medium rounded-lg transition-colors bg-beige-200 text-brown-800 hover:bg-beige-300">
                    New Post
                </button>
            </nav>
        </div>

        <!-- Posts Tab -->
        <div id="posts-content" class="tab-content">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-brown-900">Manage Posts</h2>
                    <button onclick="showTab('new-post')" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
                        Create New Post
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-beige-200">
                                <th class="text-left py-3 px-4 font-semibold text-brown-900">Title</th>
                                <th class="text-left py-3 px-4 font-semibold text-brown-900">Category</th>
                                <th class="text-left py-3 px-4 font-semibold text-brown-900">Date</th>
                                <th class="text-left py-3 px-4 font-semibold text-brown-900">Status</th>
                                <th class="text-left py-3 px-4 font-semibold text-brown-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="posts-table">
                          
        @foreach($posts as $post)
<tr class="border-b border-beige-100 hover:bg-beige-50">
    <td class="py-3 px-4 text-brown-800">{{ $post->title }}</td>
    <td class="py-3 px-4 text-brown-600">{{ $post->category ? $post->category->name : '-' }}</td>
    <td class="py-3 px-4 text-brown-600">{{ $post->created_at->format('Y-m-d') }}</td>
    <td class="py-3 px-4">
        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
            {{ ucfirst($post->status) }}
        </span>
    </td>
    <td class="py-3 px-4">
        <!-- Open modal button -->
    <button onclick="openEditModal({{ $post->id }})" 
        class="bg-beige-300 hover:bg-beige-400 text-brown-800 px-3 py-1 rounded mr-2 transition-colors">
    Edit
</button>



       <button type="button" onclick="openDeleteModal({{ $post->id }})"
    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors">
    Delete
</button>

    </td>
</tr>

<!-- Edit Modal for this post -->
<div id="edit-modal-{{ $post->id }}" 
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 
            opacity-0 transition-opacity duration-300 ease-out">

    <div class="bg-white rounded-xl p-6 w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-brown-900">Edit Post</h3>
         <button type="button" onclick="closeEditModal({{ $post->id }})" class="text-gray-500 hover:text-gray-700">


    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
</button>

        </div>

        <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid gap-4">
                <div>
                    <label class="block text-brown-700 font-medium mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required>
                </div>

                <div>
                    <label class="block text-brown-700 font-medium mb-2">Category</label>
                    <select name="category_id" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500">
                        <option value="">Uncategorized</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" @selected($post->category_id == $c->id)>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-brown-700 font-medium mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500">
                        <option value="draft" @selected($post->status === 'draft')>Draft</option>
                        <option value="published" @selected($post->status === 'published')>Published</option>
                    </select>
                </div>

                <div>
                    <label class="block text-brown-700 font-medium mb-2">Content</label>
                    <textarea name="content" rows="8" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500">{{ old('content', $post->content) }}</textarea>
                </div>
            </div>

            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Update Post
                </button>
           <button type="button" onclick="closeEditModal({{ $post->id }})" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
    Cancel
</button>


            </div>
        </form>
    </div>
</div>

        @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Categories Tab -->
        <div id="categories-content" class="tab-content hidden">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-brown-900">Manage Categories</h2>
                    <button onclick="showAddCategoryForm()" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
                        Add Category
                    </button>
                </div>

                <!-- Add Category Form -->
                <div id="add-category-form" class="hidden mb-6 p-4 bg-beige-50 rounded-lg">
                    <h3 class="text-lg font-semibold text-brown-900 mb-4">Add New Category</h3>
                    <form onsubmit="addCategory(event)">
                        <div class="flex gap-4 items-end">
                            <div class="flex-1">
                                <label class="block text-brown-700 font-medium mb-2">Category Name</label>
                                <input type="text" id="category-name" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500 focus:border-transparent" required>
                            </div>
                            <div class="flex gap-2">
                                <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
                                    Add
                                </button>
                                <button type="button" onclick="hideAddCategoryForm()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="grid gap-4" id="categories-list">
    @foreach($categories as $category)
        <div class="flex justify-between items-center p-4 bg-beige-50 rounded-lg">
            <span class="text-brown-800 font-medium">{{ $category->name }}</span>
            <div>
                <a href="{{ route('categories.edit', $category->id) }}" 
                   class="bg-beige-300 hover:bg-beige-400 text-brown-800 px-3 py-1 rounded mr-2 transition-colors">
                    Edit
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors"
                            onclick="return confirm('Are you sure you want to delete this category?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

                  
                   
                </div>
            </div>
        </div>

        <!-- New Post Tab -->
        <div id="new-post-content" class="tab-content hidden">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-brown-900 mb-6">Create New Post</h2>
                
               <form action="{{ route('posts.store') }}" method="POST">
               @csrf
                    <div class="grid gap-6">
    <div>
        <label class="block text-brown-700 font-medium mb-2">Post Title</label>
        <input type="text" name="title" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500 focus:border-transparent" placeholder="Enter post title..." required>
    </div>
    
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="block text-brown-700 font-medium mb-2">Category</label>
            <select name="category_id" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500 focus:border-transparent" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-brown-700 font-medium mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500 focus:border-transparent" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>
    </div>
    
    <div>
        <label class="block text-brown-700 font-medium mb-2">Content</label>
        <textarea name="content" rows="12" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500 focus:border-transparent" placeholder="Write your post content here..." required></textarea>
    </div>
    
    <div class="flex gap-4">
        <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-8 py-3 rounded-lg transition-colors font-medium">
            Save Post
        </button>
        <button type="reset" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg transition-colors font-medium">
            Clear
        </button>
    </div>
</div>
</form>

            </div>
        </div>
    </div>

  


    <script>
       
        

        // Tab functionality
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'bg-brown-600', 'text-beige-50');
                button.classList.add('bg-beige-200', 'text-brown-800', 'hover:bg-beige-300');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');
            
            // Add active class to selected tab
            const activeTab = document.getElementById(tabName + '-tab');
            activeTab.classList.add('active', 'bg-brown-600', 'text-beige-50');
            activeTab.classList.remove('bg-beige-200', 'text-brown-800', 'hover:bg-beige-300');
        }

function openEditModal(id) {
    const modal = document.getElementById(`edit-modal-${id}`);
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('flex');
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
    }, 10); 
}

function closeEditModal(id) {
    const modal = document.getElementById(`edit-modal-${id}`);
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300); 
}

         


       

        // Category management
        function showAddCategoryForm() {
            document.getElementById('add-category-form').classList.remove('hidden');
        }

        function hideAddCategoryForm() {
            document.getElementById('add-category-form').classList.add('hidden');
            document.getElementById('category-name').value = '';
        }

        function addCategory(event) {
            event.preventDefault();
            const categoryName = document.getElementById('category-name').value.trim();
            
            if (categoryName && !categories.includes(categoryName)) {
                categories.push(categoryName);
                renderCategories();
                updateCategorySelects();
                hideAddCategoryForm();
                alert('Category added successfully!');
            } else if (categories.includes(categoryName)) {
                alert('Category already exists!');
            }
        }

        function editCategory(oldName) {
            const newName = prompt('Enter new category name:', oldName);
            if (newName && newName.trim() && newName !== oldName) {
                const index = categories.indexOf(oldName);
                if (index !== -1) {
                    categories[index] = newName.trim();
                    // Update posts with old category name
                    posts.forEach(post => {
                        if (post.category === oldName) {
                            post.category = newName.trim();
                        }
                    });
                    renderCategories();
                    renderPosts();
                    updateCategorySelects();
                    alert('Category updated successfully!');
                }
            }
        }

        function deleteCategory(categoryName) {
            if (confirm(`Are you sure you want to delete the "${categoryName}" category?`)) {
                categories = categories.filter(cat => cat !== categoryName);
                renderCategories();
                updateCategorySelects();
                alert('Category deleted successfully!');
            }
        }

        function renderCategories() {
            const container = document.getElementById('categories-list');
            container.innerHTML = categories.map(category => `
                <div class="flex justify-between items-center p-4 bg-beige-50 rounded-lg">
                    <span class="text-brown-800 font-medium">${category}</span>
                    <div>
                        <button onclick="editCategory('${category}')" class="bg-beige-300 hover:bg-beige-400 text-brown-800 px-3 py-1 rounded mr-2 transition-colors">Edit</button>
                        <button onclick="deleteCategory('${category}')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors">Delete</button>
                    </div>
                </div>
            `).join('');
        }

        function updateCategorySelects() {
            const selects = ['post-category', 'edit-post-category'];
            selects.forEach(selectId => {
                const select = document.getElementById(selectId);
                const currentValue = select.value;
                select.innerHTML = categories.map(cat => 
                    `<option value="${cat}" ${cat === currentValue ? 'selected' : ''}>${cat}</option>`
                ).join('');
            });
        }

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            renderPosts();
            renderCategories();
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'988d7bb1511ce22d',t:'MTc1OTUwNTQ1MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>

