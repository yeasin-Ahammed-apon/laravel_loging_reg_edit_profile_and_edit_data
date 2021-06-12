# laravel 8
## implemented things given below
   - Blade templet
   - Schema
   - Mirgate
   - Controller
   - middleware
   - custom authentication
   - Hash   
   - Validation
   - Session (120 minit)
   - Storage
_______________________________________________________________________

## About this project
- database name : table_mid_auth_2nd
- table name : two tabel 
    - 1. users 
    - 2. datas
- Need to be login first 
- register sytem for new user
- once loged in can't go back to back page (login and register)
    - After login 
        - user can view a data 
        - user can add a data 
        - user can edit & update a data 
        - user can delete a data 
    - following action will not work if user is loged out
- once logout can't go to previous page (home  , add_page, edit_page)

## Both in registration and adding data , i use validation
## so Every data , user_registration have to be unique
## png and jpg image only be supported and max size of the image have to be 500kilobyte