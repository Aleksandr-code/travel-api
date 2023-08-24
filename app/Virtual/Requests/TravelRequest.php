<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="TravelRequest",
 *      description="Travel request body data",
 *      type="object",
 *      required={"name", "desctiption", "number_of_days"}
 * )
 */

class TravelRequest
{
    /**
     * @OA\Property(
     *      title="is_public",
     *      description="publish current travel",
     *      example="true"
     * )
     *
     * @var boolean
     */
    public $is_public;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new travel",
     *      example="Travel to Japan"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new travel",
     *      example="Super good travel to Japan"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="number_of_days",
     *      description="duration of the travel",
     *      example="20",
     *      format="date"
     * )
     *
     * @var string
     */
    public $number_of_days;

}
