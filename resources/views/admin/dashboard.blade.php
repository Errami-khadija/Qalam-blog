<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Qalam Blog Admin Dashboard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brown: {
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
            beige: {
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
    };
  </script>

  <script src="//unpkg.com/alpinejs" defer></script>
  <style>
    body {
      box-sizing: border-box;
    }
  </style>
</head>

<body class="bg-beige-50 font-sans">
  <!-- Header -->
  <header class="bg-brown-800 text-beige-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-6">
        <h1 class="text-2xl font-bold">Qalam Blog Admin Dashboard</h1>

        <div class="flex items-center space-x-4">
          <span class="text-beige-200">Welcome, Admin</span>

          @auth
          <div class="relative">
            <!-- Dropdown Trigger -->
            <button
              onclick="toggleDropdown()"
              class="flex items-center bg-brown-700 hover:bg-brown-600 text-beige-100 px-4 py-2 rounded-md focus:outline-none transition"
            >
              <span class="mr-2">{{ Auth::user()->name }}</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              id="userDropdown"
              class="hidden absolute right-0 mt-2 w-40 bg-white text-gray-700 rounded-lg shadow-lg z-50"
            >
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                Profile
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                  Log Out
                </button>
              </form>
            </div>
          </div>

          <script>
            function toggleDropdown() {
              document.getElementById('userDropdown').classList.toggle('hidden');
            }
          </script>
          @endauth
        </div>
      </div>
    </div>
  </header>

  <!-- Main Dashboard -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Tabs -->
    <nav class="flex space-x-8 mb-8">
      <button id="posts-tab" onclick="showTab('posts')" class="tab-button active px-4 py-2 font-medium rounded-lg transition-colors bg-brown-600 text-beige-50">
        Posts
      </button>
      <button id="categories-tab" onclick="showTab('categories')" class="tab-button px-4 py-2 font-medium rounded-lg transition-colors bg-beige-200 text-brown-800 hover:bg-beige-300">
        Categories
      </button>
      <button id="new-post-tab" onclick="showTab('new-post')" class="tab-button px-4 py-2 font-medium rounded-lg transition-colors bg-beige-200 text-brown-800 hover:bg-beige-300">
        New Post
      </button>
    </nav>

    <!-- POSTS TAB -->
    <section id="posts-content" class="tab-content">
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
                  <button onclick="openEditModal({{ $post->id }})" class="bg-beige-300 hover:bg-beige-400 text-brown-800 px-3 py-1 rounded mr-2 transition-colors">Edit</button>
                  <button onclick="openDeleteModal({{ $post->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- CATEGORIES TAB -->
    <section id="categories-content" class="tab-content hidden">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-brown-900">Manage Categories</h2>
          <button onclick="document.getElementById('add-category-form').classList.remove('hidden')" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
            Add Category
          </button>
        </div>

        <!-- Add Category Form -->
        <div id="add-category-form" class="hidden mb-6 p-4 bg-beige-50 rounded-lg">
          <h3 class="text-lg font-semibold text-brown-900 mb-4">Add New Category</h3>
          <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="flex gap-4 items-end">
              <div class="flex-1">
                <label class="block text-brown-700 font-medium mb-2">Category Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required />
              </div>
              <div class="flex gap-2">
                <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-6 py-2 rounded-lg transition-colors">
                  Add
                </button>
                <button type="button" onclick="document.getElementById('add-category-form').classList.add('hidden')" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                  Cancel
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- Category List -->
        <div class="grid gap-4" id="categories-list">
          @foreach($categories as $category)
          <div class="flex justify-between items-center p-4 bg-beige-50 rounded-lg">
            <span class="text-brown-800 font-medium">{{ $category->name }}</span>
            <div>
              <button onclick="openEditCategoryModal({{ $category->id }}, '{{ $category->name }}')" class="bg-beige-300 hover:bg-beige-400 text-brown-800 px-3 py-1 rounded mr-2 transition-colors">Edit</button>
              <button onclick="openDeleteModalCategory({{ $category->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors">Delete</button>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- NEW POST TAB -->
    <section id="new-post-content" class="tab-content hidden">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-brown-900 mb-6">Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST">
          @csrf
          <div class="grid gap-6">
            <div>
              <label class="block text-brown-700 font-medium mb-2">Post Title</label>
              <input type="text" name="title" placeholder="Enter post title..." class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required />
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-brown-700 font-medium mb-2">Category</label>
                <select name="category_id" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required>
                  <option value="">Select a Category</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label class="block text-brown-700 font-medium mb-2">Status</label>
                <select name="status" class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required>
                  <option value="draft">Draft</option>
                  <option value="published">Published</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-brown-700 font-medium mb-2">Content</label>
              <textarea name="content" rows="12" placeholder="Write your post content here..." class="w-full px-4 py-3 border border-beige-300 rounded-lg focus:ring-2 focus:ring-brown-500" required></textarea>
            </div>

            <div class="flex gap-4">
              <button type="submit" class="bg-brown-600 hover:bg-brown-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                Save Post
              </button>
              <button type="reset" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                Clear
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>

  <!-- Delete / Edit Modals are here -->
  <!-- (Keep your modal JS + markup as before for brevity) -->

  <script>
    function showTab(tabName) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
      document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active', 'bg-brown-600', 'text-beige-50');
        btn.classList.add('bg-beige-200', 'text-brown-800', 'hover:bg-beige-300');
      });

      document.getElementById(`${tabName}-content`).classList.remove('hidden');
      const activeTab = document.getElementById(`${tabName}-tab`);
      activeTab.classList.add('active', 'bg-brown-600', 'text-beige-50');
      activeTab.classList.remove('bg-beige-200', 'text-brown-800');
    }
  </script>
</body>
</html>
