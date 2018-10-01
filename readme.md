## Dog Pub Time Machine

[![Build Status](https://travis-ci.com/sunscreem/dogpubtimemachine.svg?branch=master)](https://travis-ci.com/sunscreem/dogpubtimemachine)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg?style=plastic)
[![GitHub issues](https://img.shields.io/github/issues/badges/shields.svg?style=plastic)](https://github.com/sunscreem/dogpubtimemachine/issues)
[![Twitter URL](https://img.shields.io/twitter/url/http/shields.io.svg?style=plastic)](https://twitter.com/sunscreem)

# Note To Developers

This project is built using Laravel 5.7. You will need to run `composer install` to see anything.

Assets are compiled during deployment, so to make it look correct for yourself you will need to `npm install` then `npm run development`.

On the front end this project is mainly using vue.js and bootstrap 4.

To get some data into the system you will need to run the migrations, *run the seeder* (this will populate the bars table) and then run the `php artisan brewdog:fetch` command. Please be respectful of Brewdog servers.

# What Is This?

The idea is to be able to show you what beers are currently available in which Brewdog bars.

Hopefully this will lead to showing some cool stats.

#### Why is called a "Time Machine?"

You are able to wind back the clock and see what bars had what beer on in the past!

#### It looks awful - is there some sort of to-do list for fixing it?

Indeed - this is an open source project. The to-do list and known bugs are [right here](https://github.com/sunscreem/dogpubtimemachine/issues).

#### The beers/pubs look wrong? Whats going on?

To say this was thrown together in an afternoon would be very accurate. Bear with me... it will get better. Hopefully.

#### Did this take you long?

A day. I woke up and thought .. screw it .. lets just get it done. If you like it too .. well.. you can always [buyrobabeer.com](https://buyrobabeer.com).

#### Who is making this crap?

That will be me - [Robert Cooper](https://twitter.com/sunscreem) \- the bloke from the [Brewdog News Podcast](https://brewdognewspodcast.com/). Anything you want to talk about - email me [sunscreem@gmail.com](mailto:sunscreem@gmail.com)