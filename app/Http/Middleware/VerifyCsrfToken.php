<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       'user/get_quote_fex',
        'user/get_quote_compare_fex',
        'user/get_combo_fex',
        'user/get_quote_term',
        'user/get_quote_compare_term',
        'user/get_quote_lterm',
        'user/get_quote_lfex'
    ];
}
