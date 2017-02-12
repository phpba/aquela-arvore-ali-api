<?php

namespace Phpba\Tree\Model;

use ActiveRecord\Model;

class Specie extends Model {
    
    static $has_many = ['trees'];

}
