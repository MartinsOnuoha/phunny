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
```



## Configuration

Simply edit `.env` with your database connection credentials.
00

__Instead, access secrets via environment variables.__ We use
[`dotenv`](https://github.com/motdotla/dotenv) to help make setting local
environment variables easy (not to be used in production).

Simply copy `.env-sample` to `.env` and edit as needed. __Don't commit `.env`
to your repository.__


## First time setup

__WARNING__: This will clear all data in the following MongoDB collections if
they exist: `accounts`, `adminGroups`, `admins`, `authAttempts`, `sessions`,
`statuses`, and `users`.

```bash
$ npm run first-time-setup

# > aqua@0.0.0 first-time-setup /home/jedireza/projects/aqua
# > node first-time-setup.js

# MongoDB URL: (mongodb://localhost:27017/aqua)
# Root user email: jedireza@gmail.com
# Root user password:
# Setup complete.
```


## Running the app

```bash
$ npm start

# > aqua@0.0.0 start /Users/jedireza/projects/aqua
# > gulp react && gulp

# [23:41:44] Using gulpfile ~/projects/aqua/gulpfile.js
# ...
```

Now you should be able to point your browser to http://127.0.0.1:8000/ and see
the welcome page.

[`nodemon`](https://github.com/remy/nodemon) watches for changes in server code
and restarts the app automatically. [`gulp`](https://github.com/gulpjs/gulp) and
[`webpack`](https://github.com/webpack/webpack) watch the front-end files and
re-build those automatically too.

We also pass the `--inspect` flag to Node so you have a debugger available.
Watch the output of `$ npm start` and look for the debugging URL and open it in
Chrome. It looks something like this:

`chrome-devtools://devtools/remote/serve_file/@62cd277117e6f8ec53e31b1be58290a6f7ab42ef/inspector.html?experiments=true&v8only=true&ws=localhost:9229/node`


## Running in production

```bash
$ node server.js
```

Unlike `$ npm start` this doesn't watch for file changes. Also be sure to set
these environment variables in your production environment:

 - `NODE_ENV=production` - This is important for many different optimizations,
   both server-side and with the front-end build files.
 - `NPM_CONFIG_PRODUCTION=false` - This tells `$ npm install` to not skip
   installing `devDependencies`, which we need to build the front-end files.


## Have a question?

Any issues or questions (no matter how basic), open an issue. Please take the
initiative to read relevant documentation and be proactive with debugging.

 - There are some guides in [the wiki](https://github.com/jedireza/aqua/wiki)
 - Read through [previously asked
   questions](https://github.com/jedireza/aqua/issues?q=label%3Aquestion%20)


## Want to contribute?

Contributions are welcome. If you're changing something non-trivial, you may
want to submit an issue before creating a large pull request.


## Running tests

[Lab](https://github.com/hapijs/lab) is part of the hapi ecosystem and what we
use to write all of our tests.

```bash
$ npm test

# > aqua@0.0.0 test /Users/jedireza/projects/aqua
# > lab -t 100 -S -T ./test/lab/transform -L --lint-options '{"extensions":[".js",".jsx"]}' ./test/lab/client-before.js ./test/client/ ./test/lab/client-after.js ./test/server/ ./test/lab/server-after.js ./test/misc/

#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ..................................................
#  ...............

# 865 tests complete
# Test duration: 6382 ms
# No global variable leaks detected
# Coverage: 100.00%
# Linting results: No issues
```

### Targeted tests

If you'd like to run a specific test or subset of tests you can use the
`test-client` and `test-server` scripts included in the `package.json` file.

You specificy the path(s) via the `TEST_TARGET` environment variable like:

```bash
$ TEST_TARGET=test/server/web/main.js npm run test-server

# or

$ TEST_TARGET=test/client/actions/api.js npm run test-client
```


## License

MIT


## Don't forget

What you build with Aqua is more important than Aqua.
