## Important
* React as front-end
* PHP version ^7.3
* Composer installed
* Laravel version 8
* add .env file to root directory
* DB - mySQL

* *Before running "composer i" better disable antivirus
* npm i

## Run project
* php artisan serve
* in other command line npm run watch

## About Project

* routes/web.php

    * /api/students
    * In this route loaded data by "StudentController" "api" function
        * app/Http/StudentController
            * $student query gets - student id, student first and last name, university name. From student and university table
            ![FIRST_STUDENT](https://github.com/Oscar-Sherelis/laravel_react_project/blob/master/images_for_readme/first_student.png)
            * $marks query gets - subject name, mark, student id. From subject, mark and student table
            ![MARK](https://github.com/Oscar-Sherelis/laravel_react_project/blob/master/images_for_readme/marks.png)
            * After connected $student and $marks into one. Result api/students in Firefox
            ![RESULT](https://github.com/Oscar-Sherelis/laravel_react_project/blob/master/images_for_readme/result.png)
    * / - home directory.
    ![REACT_RESULT](https://github.com/Oscar-Sherelis/laravel_react_project/blob/master/images_for_readme/react_result.png)
    * Data fetched and loaded in resources/js/components/Student file
    ![FETCH_DATA](https://github.com/Oscar-Sherelis/laravel_react_project/blob/master/images_for_readme/fetch_data.png)

## License

Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
