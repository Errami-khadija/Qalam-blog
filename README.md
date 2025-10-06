🖋️ Qalam — A Laravel Blog Platform

Qalam (قلم — meaning “pen”) is a minimalist blog built with Laravel, designed for writers who want to express ideas beautifully and manage their posts effortlessly.
It includes an admin dashboard for managing posts, categories, and publication status (Draft/Published).
🚀 Features

📝 Create, edit, and delete blog posts

🗂️ Manage categories

📄 Set post status: Draft or Published

🔐 Admin dashboard for managing content

💅 Clean, modern UI built with Blade & Tailwind CSS

💾 MySQL database integration

🧰 Tech Stack
| Layer           | Technology          |
| --------------- | ------------------- |
| Backend         | Laravel 10          |
| Frontend        | Blade, Tailwind CSS |
| Database        | MySQL               |
| Authentication  | Laravel Breeze      |
| Version Control | Git & GitHub        |

⚙️ Installation & Setup
1️⃣ Clone the repository
git clone https://github.com/YOUR-USERNAME/qalam-blog.git
cd qalam-blog
2️⃣ Install dependencies
composer install
npm install
3️⃣ Copy .env file and generate app key
cp .env.example .env
php artisan key:generate
4️⃣ Set up your database
Update your .env file with your MySQL credentials:
DB_DATABASE=qalam_blog
DB_USERNAME=root
DB_PASSWORD=
Then run:
php artisan migrate
5️⃣ Run the app
php artisan serve

🌙 About the Developer

Developed by: Khadiija Errami 💻
A passionate full-stack developer exploring the Laravel ecosystem and creating beautiful, functional web apps.

📫 Connect with me:

GitHub: Errami-khadija

Email: khadijaerrami708@gmail.com
# License

This project is open-source and available under the MIT License.



⚙️ Simple authentication (Login / Register)
