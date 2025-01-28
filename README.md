1. The project was created using Swagger.
2. Set up your settings in .env file:
- DOCKER_NGINX_PORT
- DOCKER_USERNAME
- DOCKER_USER_ID
- DB_CONTAINER_PORT
3. Launch Docker application, then docker in the project, type in Terminal: docker compose build, then:  docker compose up -d
4. Connection to database:
  - Choose Data Source-> PostgreSQL
  - Enter name: postgres
  - Enter port: same as DB_CONTAINER_PORT in env file
  - Enter user: postgres
  - Enter password: postgres
  - Enter database: postgres
  - Press Test connection
5. Go to the app container with the command: docker exec -it task-list-app bash
6. Run composer install
7. Run php artisan key:generate
8. Execute a command: php artisan migrate:fresh --seed. It'll run migrations and run seeders to fill the database
9. Go go to the browser and paste http://localhost:DOCKER_NGINX_PORT/, where DOCKER_NGINX_PORT was set up in your env file.
10. You ll get the main page of app. You ll see routes:
11. App list URLs
- http://localhost:3070/api/tasks/filters : displays all tasks with filtering by status (completed or not completed) and author of the task
- http://localhost:3070/api/register : user registration
- http://localhost:3070/api/login : user authentication
- http://localhost:3070/api/user/tasks with HTTP request method GET: authenticated user can see his list of tasks
- http://localhost:3070/api/user/tasks with HTTP request method POST: authenticated user can create the new task
- http://localhost:3070/api/user/tasks/{id} with HTTP request method PUT: authenticated user can edit the task
- http://localhost:3070/api/user/tasks/{id} with HTTP request method DELETE: authenticated user can delete the task
- http://localhost:3070/api/user/tasks/complete/{id} with HTTP request method PUT: authenticated user can mark tasks as completed or not completed;
12. Pass the registration procedure in the route: /register, if you want to create a new user.
13. To authorize the app:
- press "Login route", then enter the following credentials:
- for user: "email": "user@admin.com", "password": "12341234"
- for admin: "email": "admin@admin.com", "password": "12341234".
- anyway you can see full user information in the database and file UserSeeder.php(folder Database\Seeders).
- press the button 'Authorize' or you can press the 'lock symbol' next to every route in section: USER TASKS
- enter in the opened window: Bearer , then press "space" on the keyboard and insert your token (you can find it in the response body after you pass LOGIN PROCEDURE.
- Example of response:"token": "11|f1O4eFeNWoWpIaj3czCJGJ4lqqQQVhGtj4rUaMIr07213bbe". For example: Bearer 11|f1O4eFeNWoWpIaj3czCJGJ4lqqQQVhGtj4rUaMIr07213bbe
14. You can check routes with pressing "Try it out":)
