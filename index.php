<?php

use Freight\Currency;
use Freight\Distance;
use Freight\DistanceUnit;
use Freight\Money;
use Freight\PositiveDecimal;
use Freight\Weight;
use Freight\WeightUnit;
use Slim\Factory\AppFactory;
use Freight\Simulator;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->post('/', function ($request, $response, $args) {
    $input = json_decode(file_get_contents('php://input'), true);;

    $simulator = new Simulator();

    $price = new Money(new Currency($input['cost']['currency']), new PositiveDecimal($input['cost']['value']));
    $weight = new Weight(new WeightUnit($input['weight']['unit']), new PositiveDecimal($input['weight']['value']));
    $distance = new Distance(new DistanceUnit($input['distance']['unit']), new PositiveDecimal($input['distance']['value']));

    $total = $simulator->simulate($price, $weight, $distance);

    $output = json_encode([
        'total' => [
            'currency' => $total->getCurrency()->getValue(),
            'value' => $total->getValue()->getValue()
        ]
    ]);

    $response->getBody()->write($output);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
