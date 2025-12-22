<?php

namespace App\Enums;

enum UserRolesEnum: int
{
    // Admin platform (Sporthub)
    case Admin = 1;
    // Admin GOR (pengelola lapangan)
    case GorAdmin = 2;
    // Pengguna (pelanggan)
    case Customer = 3;
}
