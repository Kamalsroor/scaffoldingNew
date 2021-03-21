<?php

if (! function_exists('app_copyright')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function app_copyright()
    {
        return Settings::locale()->get('copyright');
    }
}
if (! function_exists('app_name')) {
    /**
     * Get the application name.
     *
     * @return string
     */
    function app_name()
    {
        return Settings::locale()
            ->get('name', config('app.name', 'Laravel'))
            ?: config('app.name', 'Laravel');
    }
}

if (! function_exists('app_logo')) {
    /**
     * Get the application logo url.
     *
     * @return string
     */
    function app_logo()
    {
        if (($model = Settings::instance('logo')) && $file = $model->getFirstMediaUrl('logo')) {
            return $file;
        }

        return 'https://ui-avatars.com/api/?name='.rawurldecode(config('app.name')).'&bold=true';
    }
}

if (! function_exists('array_unset_by_value')) {
    /**
     * unset value from array .
     *
     * @return string
     */
    function array_unset_by_value($array , $value )
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }
    }
}



if (! function_exists('generateRandomString')) {
    /**
     * Get the application logo url.
     *
     * @return string
     */

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('str_limit')) {
    /**
     * str limit of string
     *
     * @return string
     */

    function str_limit($string ,$limit = 150 , $end = '...')
    {
        return Str::limit($string, $limit ,$end) ;

    }
}



if (! function_exists('app_favicon')) {
    /**
     * Get the application favicon url.
     *
     * @return string
     */
    function app_favicon()
    {
        if (($model = Settings::instance('favicon')) && $file = $model->getFirstMediaUrl('favicon')) {
            return $file;
        }

        return '/favicon.ico';
    }
}

if (! function_exists('count_formatted')) {
    /**
     * Format numbers to nearest thousands such as
     * Kilos, Millions, Billions, and Trillions with comma.
     *
     * @param int|float $num
     * @return float|string
     */
    function count_formatted($num)
    {
        if ($num >= 1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = ['K', 'M', 'B', 'T'];
            $x_count_parts = count($x_array) - 1;
            $x_display = $x_array[0].((int) $x_array[1][0] !== 0 ? '.'.$x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;
        }

        return $num;
    }
}
