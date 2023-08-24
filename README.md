<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Project

Travel API

## Stack

Laravel, SQLite, Swagger

## How to use

- Clone the repository with <b>git clone</b>
- Copy <b>.env.example</b> file to <b>.env</b> and edit database credentials there
- Run <b>composer install</b>
- Run <b>php artisan key:generate</b>
- Run <b>php artisan migrate --seed</b> (it has some seeded data for your testing)  
- Run <b>php artisan serve</b> for start local server
- That's it: launch the URL <code>/api/documentation</code>

## Glossary

- Travel is the main unit of the project: it contains all the necessary information, like the number of days, the images, title, etc. An example is Japan: road to Wonder or Norway: the land of the ICE;
- Tour is a specific dates-range of a travel with its own price and details. Japan: road to Wonder may have a tour from 10 to 27 May at €1899, another one from 10 to 15 September at €669 etc. At the end, you will book a tour, not a travel.

## Goals

At the end, the project should have:
- A private (admin) endpoint to create new users. If you want, this could also be an artisan command, as you like. It will mainly be used to generate users for this exercise;
- A private (admin) endpoint to create new travels;
- A private (admin) endpoint to create new tours for a travel;
- A private (editor) endpoint to update a travel;
- A public (no auth) endpoint to get a list of paginated travels. It must return only public travels;
- A public (no auth) endpoint to get a list of paginated tours by the travel slug (e.g. all the tours of the travel foo-bar). Users can filter (search) the results by priceFrom, priceTo, dateFrom (from that startingDate) and dateTo (until that startingDate). User can sort the list by price asc and desc. They will always be sorted, after every additional user-provided filter, by startingDate asc.
