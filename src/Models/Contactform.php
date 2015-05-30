<?php namespace Lasallecms\Contact\Models;

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

use Lasallecms\Lasallecmsapi\Models\BaseModel;

class Contactform extends BaseModel {


    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = ['name', 'email', 'message'];


    /**
     * Sanitation rules
     *
     * @var array
     */
    public $sanitationRules = [
        'name'     => 'trim|strip_tags',
        'email'    => 'trim|strip_tags',
        'message'  => 'trim',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public $validationRules = [
        'name'     => 'required|min:4',
        'email'    => 'required|email',
        'message'  => 'required|min:11',
    ];


}