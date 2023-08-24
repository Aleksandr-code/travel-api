<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="TourRequest",
 *      description="Tour request body data",
 *      type="object",
 *      required={"name", "price", "startiing_date", "ending_date"}
 * )
 */

class TourRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new tour",
     *      example="Amazing tour"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="price",
     *      description="price of the new tour",
     *      example="99.99"
     * )
     *
     * @var float
     */

    public $price;

    /**
     * @OA\Property(
     *      title="starting_date",
     *      description="start day of the new tour",
     *      format="date",
     *      example="2023-08-16"
     * )
     *
     * @var string
     */
    public $starting_date;

    /**
     * @OA\Property(
     *      title="ending_date",
     *      description="end day of the new tour",
     *      format="date",
     *      example="2023-08-21"
     * )
     *
     * @var string
     */
    public $ending_date;
}
