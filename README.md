# Blog App


This is a full-stack blog application built with Laravel (backend) and Vue.js (frontend). The application allows users to create, edit, and delete blog posts with the option to upload images and videos.
=======


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

### API Endpoints

- `GET /blogs`: Retrieve all blogs
- `POST /blogs`: Create a new blog
- `GET /blogs/{id}`: Retrieve a specific blog
- `PUT /blogs/{id}`: Update a specific blog
- `DELETE /blogs/{id}`: Delete a specific blog

### Screenshots

Include some screenshots of your application here.

## Contributing

If you would like to contribute, please fork the repository and make changes as you'd like. Pull requests are warmly welcome.
=======

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
