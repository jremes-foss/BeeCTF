# BeeCTF
Laravel-Based Community CTF Platform

## Introduction
BeeCTF is a CTF platform intended for small and local community groups who want to host their own CTF competitions. A small size and light weight makes BeeCTF a good platform to be hosted even in a small computer such as Raspberry Pi effectively. Built on Laravel 5.8, BeeCTF is easy to install and run even if your hardware is more limited. 

## Installation
Installation of BeeCTF in traditional way is easy:
* git clone https://github.com/Newman101/BeeCTF
* composer install
* composer update
* php artisan key:generate
* php artisan user:create-admin

After creating an administrative user, the system is ready to use.

## License
Copyright (c) <2019> <Juha Remes>

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
