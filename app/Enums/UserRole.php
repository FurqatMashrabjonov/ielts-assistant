<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum
{
    const SUPER_ADMIN = 'super_admin';
    const MODERATOR = 'moderator';
    const ADMIN = 'admin';
    const USER = 'user';
}
