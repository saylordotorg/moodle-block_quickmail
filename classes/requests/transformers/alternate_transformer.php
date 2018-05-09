<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    block_quickmail
 * @copyright  2008 onwards Louisiana State University
 * @copyright  2008 onwards Chad Mazilly, Robert Russo, Dave Elliott, Adam Zapletal, Philip Cali
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_quickmail\requests\transformers;

class alternate_transformer extends transformer {

    public function transform_form_data()
    {
        $this->transformed_data->delete_alternate_id = (int) $this->form_data->delete_alternate_id;
        $this->transformed_data->create_flag = (int) $this->form_data->create_flag;
        $this->transformed_data->firstname = (string) $this->form_data->firstname;
        $this->transformed_data->lastname = (string) $this->form_data->lastname;
        $this->transformed_data->email = (string) $this->form_data->email;
        $this->transformed_data->availability = (string) $this->form_data->availability;
    }

}