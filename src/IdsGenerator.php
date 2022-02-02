<?php

namespace MuktarSayedSaleh\LaravelCustomIds;

class IdsGenerator {
    
    public function next(
        $model,
        string $prefix='',
        string $suffix='',
        int $sequence_length=6,
        string $format='{prefix}{sequence}{suffix}',
        $sequence_accumulated_by=null,
        $unique_field_name=''
    ) {
        // validation
        if (!is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
            throw InvalidArgumentException('$model has to be a Laravel model');
        }

        if (strpos($format, '{sequence}') === false) {
            throw InvalidArgumentException('Invalid $format provided, Your format lacks {sequence}');
        }

        if($sequence_length < 10)
        {
            $sequence_length = '0'.$sequence_length;
        }

        $count = $model->count();
        while (true) {
            $next_id = sprintf('%05u', ++$count);

            // applying format using regular expressions.
            // Thanks to the lessons learned when writting Al-Faraheedy project!
            // https://github.com/MukhtarSayedSaleh/Al-Faraheedy-Project/blob/master/code/application/models/core.php
            $next_id = preg_replace(
                [
                    "/{prefix}/",
                    "/{suffix}/",
                    "/{sequence}/",
                    "/{Y}/",
                    "/{y}/",
                    "/{F}/",
                    "/{M}/",
                    "/{m}/",
                    "/{n}/",
                    "/{l}/",
                    "/{D}/",
                    "/{d}/",
                    "/{j}/"
                ],
                [
                    $prefix,
                    $suffix,
                    $next_id,
                    date('Y'),
                    date('y'),
                    date('F'),
                    date('M'),
                    date('m'),
                    date('n'),
                    date('l'),
                    date('D'),
                    date('d'),
                    date('j')
                ],
                $format
            );

            // check uniqueness if applicable or retrun the generated ID
            if($unique_field_name != '')
            {
                if (! $model::where($unique_field_name, $next_id)->exists()) {
                    return $next_id;
                }
            }
            else
            {
                return $next_id;
            }
        }
    }
}