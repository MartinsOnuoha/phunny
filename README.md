# Phunny - Laravel + Vuetify + Axios BoilerPlate

A CRUD application built with Laravel, Vue, Vuetify and Bulma CSS to manage a Phone book System.



## Features

 - FrontEnd
   - Basic Components Ready to be edited
   - Default Customizable Laravel Landing Page
   - List of Available Contacts (Vuetify)
   - About Page
 - Admin back office
   - Single Admin Page
   - Manage Contact Creation
   - Update Contact Details
   - Delete Contact



## Routes

| Method | URI             | Name       | Action              |
|:------------------------ |:---------- |:------------------- |
| GET    | /               | Welcome    | `view('welcome')`   |
| GET    | /phones         | Phonebook  | `view('phonebook')` |
| GET    | /home           | Home       | `view('phonebook')` |
| GET    | /about          | About      | `view('phonebook')` |
| GET    | /phonebook/list | Phonebooks | PhonebookController@list |
| POST   | /phonebook      | Add        | PhonebookController@store |
| DELETE | /phonebook      | Delete All | PhonebookController@deleteAll |
| PATCH  | /phonebook/:id  | Update     | PhonebookController@update  |
| DELETE | /phonebook/:id  | Delete One | PhonebookController@destroy |


## Technology

Server side, Phunny is built with Laravel.
It uses MySQL/PostgreSQL as a data store.

The front-end is built with VueJS. With Vuetify for building components and Vue-Router for routing.


## Installation

```bash
$ git clone https://github.com/MartinsOnuoha/phunny.git
$ cd phunny
$ npm install
$ composer install
$ php artisan serve
```



## Configuration

Simply edit `.env` with your database connection credentials.

__Instead, access secrets via environment variables.__ We use
[`dotenv`](https://github.com/motdotla/dotenv) to help make setting local
environment variables easy (not to be used in production).

Simply copy `.env-sample` to `.env` and edit as needed. __Don't commit `.env`
to your repository.__


