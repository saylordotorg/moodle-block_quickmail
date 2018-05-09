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

namespace block_quickmail\messenger;

use block_quickmail\persistents\signature;

class signature_appender {

    public $body;
    public $user_id;
    public $signature_id;

    /**
     * Construct the message signature appender
     * 
     * @param string  $body           the message body
     * @param int     $user_id        the user id of the user sending the message
     * @param int     $signature_id   the signature id to be appended
     */
    public function __construct($body, $user_id, $signature_id = 0) {
        $this->body = $body;
        $this->user_id = $user_id;
        $this->signature_id = $signature_id;
    }

    public static function append_user_signature_to_body($body, $user_id, $signature_id = 0)
    {
        $appender = new self($body, $user_id, $signature_id);

        return $appender->get_signature_appended_body();
    }

    public function get_signature_appended_body()
    {
        if ( ! $this->signature_id) {
            return $this->body;
        }

        if ( ! $signature = signature::find_user_signature_or_null($this->signature_id, $this->user_id)) {
            return $this->body;
        }

        $this->body = $this->body . '<br><br>' . $signature->get('signature');

        return $this->body;
    }

}