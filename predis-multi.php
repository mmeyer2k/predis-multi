<?php

namespace \mmeyer2k\PredisMulti;

class PredisMulti
{
    public static function exec(\Predis\Client $redis, \Closure $closure): array
    {
        $redis->multi();

        try {
            $ret = $closure();
        } catch (\Exception $e) {
            $redis->discard();

            throw ($e);
        }

        if ($ret === false) {
            $redis->discard();

            return [];
        }

        return $redis->exec();
    }
}
