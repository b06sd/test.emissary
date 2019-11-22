<?php

namespace App;

use Laratrust\LaratrustPermission;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends LaratrustPermission implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}
