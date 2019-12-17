# predis-multi

Finally, a closure wrapper for predis transactions.

## Install

```bash
composer require mmeyer2k/predis-multi
```

## Use

Basic example of simply incrementing key:
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

Rollback transaction by returning false from the closure.

```php
$multi = PredisMulti::exec($redis, function() {
  $redis->set('this-key-wont-ever-be-created');
  return false;
});
```
