# BeeCTF
[![Build Status](https://travis-ci.com/Newman101/BeeCTF.svg?branch=master)](https://travis-ci.com/Newman101/BeeCTF)
[![Coverage Status](https://coveralls.io/repos/github/Newman101/BeeCTF/badge.svg?branch=master)](https://coveralls.io/github/Newman101/BeeCTF?branch=master)

Laravel-Based Community CTF Platform.

## Introduction
BeeCTF is a [CTF](https://en.wikipedia.org/wiki/Wargame_(hacking)) platform intended for small and local community groups who want to host their own CTF competitions. A small size and light weight makes BeeCTF a good platform to be hosted even in a small computer such as [Raspberry Pi](https://www.raspberrypi.org/) effectively. Built on [Laravel 6.0](https://laravel.com/), BeeCTF is easy to install and run even if your hardware is more limited. 

## Installation

### Local
Installation of BeeCTF in traditional way is easy:

```bash
git clone https://github.com/Newman101/BeeCTF
composer install
composer update
php artisan key:generate
php artisan user:create-admin
```

In order to build NPM dependencies for development purposes, please run:

```bash
npm install
npm run dev
```

Please note: `pngquant` dependency requires `libpng-dev` library, so it must be installed first in order to get the npm to build successfully.

As BeeCTF is built on Laravel, please make sure to set the correct parameters in the .env file. To run the system after installation, you can use your own web server (such as Nginx or Apache) or use built-in server by:

```bash
php artisan serve
```

### Docker
With [Docker](https://www.docker.com/) (currently for development purposes only, the production image is work in progress):

```bash
git clone https://github.com/Newman101/BeeCTF
composer install
composer update
docker-compose build
docker-compose up -d
docker-compose exec app php artisan migrate
docker-compose exec app php artisan user:create-admin
```

After creating an administrative user and database connection, the system is ready to use.

## Pull Requests
Feel free to send any bug fixes, new features, etc. via pull requests. Please note that BeeCTF is still heavily work in progress so there are a lot of issues to fix and all contributions are welcome. Before submitting unit tests, please make sure all unit tests pass and the code is following the standards established in contribution guide.

## License
Copyright (c) <2019> Juha Remes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
