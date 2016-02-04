<?php

/**
 *
 * Contact package for the LaSalle Content Management System, based on the Laravel 5 Framework
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Contact package for the LaSalle Content Management System
 * @link       http://LaSalleCMS.com
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */



return [

    /*
   |--------------------------------------------------------------------------
   | FROM email
   |--------------------------------------------------------------------------
   |
   | Who is sending the contact email?
   |
   |
   */
    'from_email' => 'info@southlasalle.com',
    'from_name'  => 'SouthLaSalle',


    /*
    |--------------------------------------------------------------------------
    | TO email
    |--------------------------------------------------------------------------
    |
    | Who is receiving the contact email?
    | Right now, just one recipient can get the contact email.
    |
    |
    */
    'to_email' => 'info@southlasalle.com',
    'to_name'  => 'Bob Bloom',


    /*
    |--------------------------------------------------------------------------
    | SUBJECT email
    |--------------------------------------------------------------------------
    |
    | Specify the subject of the contact email.
    |
    |
    */
    'subject_email' => 'Contact Form Message',


    /*
    |--------------------------------------------------------------------------
    | Thank you page
    |--------------------------------------------------------------------------
    |
    | Do you want to specify a custom thank you page? Then specify the NAMED ROUTE here.
    |
    | Use the default thank you page = blank
    |
    |
    */
    'contact_form_thank_you_named_route' => "",
    //'contact_form_thank_you_named_route' => 'contact_form_thank_you',


];

