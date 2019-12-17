# predis-multi

Finally, a closure wrapper for predis transactions.

```php
use \mmeyer2k\PredisMulti\PredisMulti;

$redis = new \Predis\Client();
        
$multi = PredisMulti::exec($redis, function() {
  $redis->incr('key');
  $redis->incr('key');
  $redis->incr('key');
});

# $multi = [1, 2, 3]
```
