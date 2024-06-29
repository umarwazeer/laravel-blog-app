# Blog App

This is the ful-stack blog Application build with laravel(Backend) and Vu js frontend.
## Features

- Create, edit, and delete blog posts
- Upload images and videos with blog posts
- Responsive design

## Technologies Used

- Laravel (Backend)
- Vue.js (Frontend)
- Axios (HTTP Client)
- MySQL (Database)

## Setup Instructions

### Backend

1. Clone the repository and navigate to the backend directory:

    ```bash
    git clone https://github.com/your-username/blog-app.git
    cd blog-app/backend
    ```

2. Install the dependencies:

    ```bash
    composer install
    ```

3. Create a `.env` file and configure your database:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run the migrations:

    ```bash
    php artisan migrate
    ```

5. Serve the application:

    ```bash
    php artisan serve
    ```

### Frontend

1. Navigate to the frontend directory:

    ```bash
    cd ../frontend
    ```

2. Install the dependencies:

    ```bash
    npm install
    ```

3. Run the application:

    ```bash
    npm run serve
    ```

### Frontend

1. Navigate to the frontend directory:

    ```bash
    cd ../frontend
    ```

2. Install the dependencies:

    ```bash
    npm install
    ```

3. Run the application:

    ```bash
    npm run serve
    ```
