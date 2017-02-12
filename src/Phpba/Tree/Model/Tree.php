<?php

namespace Phpba\Tree\Model;

use ActiveRecord\Model;

class Tree extends Model {

    static $belongs_to = ['specie'];

}
