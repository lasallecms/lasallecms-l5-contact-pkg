<?php

namespace Lasallecms\Contact\Http\Controllers;

/**
 *
 * Contact package for the LaSalle Content Management System, based on the Laravel 5 Framework
 * Copyright (C) 2015  The South LaSalle Trading Corporation
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
 * @copyright  (c) 2015, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

// LaSalle Software
use Lasallecms\Lasallecmsfrontend\Http\Controllers\FrontendBaseController;

// Laravel facades
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends FrontendBaseController
{

    // Request::header('referer') for the field $table->text('senderinfo');
    // https://github.com/laravel/framework/blob/6124841043b53b6254796bc68b91170800e82ffa/src/Illuminate/Http/ResponseTrait.php
    // http://php.net/manual/en/reserved.variables.server.php
    // USER_AGENT  REMOTE_ADDR  REMOTE_HOST  REMOTE_PORT

    /**
     * Display contact form
     *
     * @return Response
     */
    public function index()
    {
        return view('lasallecmscontact::contact_form');
    }



    /**
     * Display the extra security form
     *
     * @return Response
     */
    public function steptwo()
    {
        $input = Input::only(array('name', 'email', 'comment'));

        $input['name']    = $this->quickSanitize($input['name']);
        $input['email']   = $this->quickSanitize($input['email']);
        $input['comment'] = $this->quickSanitize($input['comment']);

        return view('lasallecmscontact::step_two_form', [
            'input'   => $input,
            'message' => false,
        ]);
    }


    /**
     * Process the second intermediate contact form.
     */
    public function send()
    {
        $input = Input::only(array('name', 'email', 'comment', 'security-code'));

        $input['security-code'] = $this->quickSanitize($input['security-code']);

        if (strlen($input['security-code']) < 2) {

            $message = "Please enter the security code again. Thank you!";

            return view('lasallecmscontact::step_two_form', [
                'input'   => $input,
                'message' => $message,
            ]);
        }

        // Guess it couldn't hurt to run inputs through the quick sanitize...
        $input['name']    = $this->quickSanitize($input['name']);
        $input['email']   = $this->quickSanitize($input['email']);
        $input['comment'] = $this->quickSanitize($input['comment']);


        echo Config::get('lasallecmscontact.from_email');
        echo " and ".Config::get('lasallecmscontact.from_name');
        echo " and ".Config::get('lasallecmscontact.to_email');
        echo " and ".Config::get('lasallecmscontact.to_name');
        echo " and ".Config::get('lasallecmscontact.subject_email');




        Mail::send('lasallecmscontact::email', $input, function($message)
        {
            $message->from(Config::get('lasallecmscontact.from_email'), Config::get('lasallecmscontact.from_name'));
            $message->to(Config::get('lasallecmscontact.to_email'), Config::get('lasallecmscontact.to_name'))->subject(Config::get('lasallecmscontact.subject_email'));
        });

        // Redir to confirmation page
        return Redirect::route('contact-processing.thankyou');
    }


    /**
     * Display the thank you page
     *
     * @return Response
     */
    public function thankyou()
    {
        if (Config::get('lasallecmscontact.contact_form_thank_you_named_route') != "") {

            return Redirect::route(Config::get('lasallecmscontact.contact_form_thank_you_named_route'));
        }

        return view('lasallecmscontact::thankyou');
    }



    /**
     * A quick sanitize
     *
     * @param   string    $input
     * @return  string
     */
    public function quickSanitize($input)
    {
        $input = trim($input);
        $input = strip_tags($input);

        return $input;
    }
}

