<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Routing\RouteCollection;

/**
 * Replaces the framework attribute route loader: routes of controllers living in
 * an "...\Api\V{N}\..." namespace get the "/api/v{N}" path prefix and the
 * "api_v{N}_" route name prefix.
 */
#[AsDecorator('routing.loader.attribute')]
final class ApiVersionRouteLoader extends AttributeRouteControllerLoader
{
    private const string VERSION_PATTERN = '/\\\\Api\\\\V(\d+)\\\\/';

    public function __construct(
        #[Autowire('%kernel.environment%')]
        ?string $env = null,
    ) {
        parent::__construct($env);
    }

    public function load(mixed $class, ?string $type = null): RouteCollection
    {
        $collection = parent::load($class, $type);

        if (\is_string($class) && preg_match(self::VERSION_PATTERN, $class, $matches)) {
            $collection->addPrefix('/api/v'.$matches[1]);
            $collection->addNamePrefix('api_v'.$matches[1].'_');
        }

        return $collection;
    }
}
