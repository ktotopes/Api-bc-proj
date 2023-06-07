<?php

namespace App\Enum;
enum OrderStatus: string
{
    case CANCEL = 'cancel';
    case SUCCESS = 'success';
    case PENDING = 'pending';


}
