<?php

namespace App\Enums;

enum Role: string
{
    case Employee = 'employee';
    case Manager = 'manager';
    case Admin = 'admin';
}
