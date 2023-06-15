### Instructions to run the application

1. Clone the project
2. Run **composer update** - Install / Update composer packages
3. Run **npm install** - Install / Update npm packages
4. Create a database called **blog_db**
5. Run **php artisan migrate:fresh --seed** - Migrate database and seed
6. Run **php artisan serve** - Run artisan servers
7. Run **npm run dev** - Required to work with vite
8. Run **php artisan test** - To run unit tests

### Required system dependencies

1. PHP Version **8.1.6** Recommended
2. Node Version **16.16.0** Recommended


### Prerequisite to the application

Postman Collection can be found in **prerequisites** folder 

### Explanation on design decisions and trade-offs

While developing this application, I made many decisions to develop the application as expected. First main consideration was the file and folder structure. In order to make the app source code clean I had followed design pattern techniques to build the folder structure. Some of them are, I have seperated the logics and database calls to seperate service classes by creating a folder called Services. Seperated usual routes and controllers and API routes and controllers to identify easily. Created seperate database table migrations. And also created test cases to ensure the developed functions are working. So these are some main decisions which I took for the backend side development.

The frontend of the application was developed using React.js as the technology. So in order to integrate React into Laravel application I had to use breeze and inertiajs dependencies. So in order to design the application I had to take a decision on the style method. So I went with the tailwind css to style the application. And also I created a friendly folder structure to the frontend part as well by seperating Components, Layouts and Pages into different folders and creating reusable components to avoid duplications etc. So those are some main decisions and trade-offs for the which taken in order to develop this application.
