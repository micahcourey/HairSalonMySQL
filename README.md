# _Hair Salon_

##### _A Hair Salon app with MySql database_

#### By _**Micah Courey**_

## Description

_An app to allow users to create, read, update, delete stylists names and clients names._

## Setup

* _Clone repository from GitHub._
* _Run $ composer install._
* _Start MySql server in web directory._
* _Install MAMP_
* _Access phpMyAdmin_
* _import hair_salon.sql and hair_salon_test.sql into phpMyAdmin_
* _Start php server in web directory._
* _Direct browser to localhost:8000/_

**_MySQL Commands used:_**
* _mysql.server.start_
* _mysql -uroot -proot;_
* _CREATE DATABASE hair_salon;_
* _USE hair_salon;_
* _CREATE TABLE stylist (id serial PRIMARY KEY, name VARCHAR (255));_
* _CREATE TABLE client (id serial PRIMARY KEY, name VARCHAR (255), phone VARCHAR (255), last_visit DATE, stylist_id INT);_
* _CREATE DATABASE hair_salon_test;_
* _USE hair_salon_test;_
* _CREATE TABLE stylist (id serial PRIMARY KEY, name VARCHAR (255));_
* _CREATE TABLE client (id serial PRIMARY KEY, name VARCHAR (255), phone VARCHAR (255), last_visit DATE, stylist_id INT);_

## Technologies Used

_PHP, HTML, CSS, Silex, Twig, phpUnit, MySql, phpMyAdmin_

### Legal

Copyright (c) 2015 **_Micah Courey_**

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
