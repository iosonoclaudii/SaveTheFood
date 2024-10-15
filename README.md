# SaveTheFood 🍎🥦

**SaveTheFood** is a web application designed to reduce food waste by giving a second chance to food products that don't meet the aesthetic standards of the market but are perfectly edible. The goal is to allow consumers to purchase these products at discounted prices, contributing to the fight against food waste while promoting a more sustainable consumption model.

With **SaveTheFood**, users can explore a wide range of eco-friendly products and do their part to save food, all through a simple, modern, and accessible platform.

### Live App
You can access the live app here: [SaveTheFood](https://savethefood-6221a38a6768.herokuapp.com/)

## Technologies Used 💻

- **Laravel**: Backend PHP framework for database management and API handling.
- **Vue.js 3**: JavaScript framework for a dynamic and reactive user interface.
- **Inertia.js**: Simplifies building Single Page Applications (SPAs) without sacrificing Laravel's simplicity.
- **Tailwind CSS**: A modern and customizable CSS framework.
- **PostgreSQL**: Reliable and robust relational database management system.
- **Heroku**: Cloud platform for application deployment.

## Key Features 🌟

- **User Authentication**: Register and login functionalities powered by Laravel Jetstream.
- **Rating System**: Users can rate products from 1 to 5 stars to encourage food rescue.
- **Vote Visualization**: Displays the total number of votes received by products, updated in real-time.
- **Product Management**: Explore and purchase eco-friendly products with discounts based on their appearance.
- **Responsive Design**: The interface is optimized for both desktop and mobile devices, thanks to Tailwind CSS.

## Installation 🛠️

Follow the steps below to install the application locally.

### System Requirements

- **PHP >= 8.2**
- **Composer**
- **Node.js & npm**
- **PostgreSQL**

### Installation Steps

1. **Clone the repository:**

    ```bash
    git clone [https://github.com/iosonoclaudi1/SaveTheFood.git](https://github.com/iosonoclaudii/SaveTheFood)
    cd SaveTheFood
    ```

2. **Configure the `.env` file:**

    Copy the `.env` example file and set your environment variables, such as API keys and database configurations.

    ```bash
    cp .env.example .env
    ```

3. **Install PHP and JavaScript dependencies:**

    ```bash
    composer install
    npm install
    ```

4. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

6. **Compile the assets for development:**

    ```bash
    npm run dev
    ```

    For production build:

    ```bash
    npm run build
    ```

7. **Start the local development server:**

    ```bash
    php artisan serve
    ```

The app will be accessible at `http://127.0.0.1:8000`.

## API 📡

SaveTheFood provides a few APIs for managing product ratings. Below are the two key endpoints.

### Get Total Votes

- **Endpoint**: `/api/ratings/total`
- **Method**: `GET`
- **Description**: Returns the total number of votes given to products.
- **Example**:
  - Locally: `http://127.0.0.1:8000/api/ratings/total`
  - Production: [`https://savethefood-6221a38a6768.herokuapp.com/api/ratings/total`](https://savethefood-6221a38a6768.herokuapp.com/api/ratings/total)

### Add a Vote

- **Endpoint**: `/api/ratings`
- **Method**: `POST`
- **Payload**:

    ```json
    {
      "rating": 5
    }
    ```

- **Description**: Allows users to add a rating between 1 and 5.

## License 📄

This project is licensed under the MIT License. Please refer to the LICENSE file for more information.

---

Made with ❤️ by **Maldera Claudio**
