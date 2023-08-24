<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Travel",
 *     description="Travel model",
 * )
 */

class Travel
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="UUid",
     *     format="integer",
     *     example="99eb9c87-79ab-491d-9bb7-a29e77e14e79"
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="slug",
     *     description="slug",
     *     format="string",
     *     example="travel-to-japan"
     * )
     *
     * @var string
     */
    private $slug;

    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example="Travel to Japan"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="description",
     *     description="description",
     *     format="text",
     *     example="Super good travel to Japan"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="number of days",
     *     description="number of days",
     *     example=20,
     *     format="integer",
     * )
     *
     * @var integer
     */
    private $number_of_days;

    /**
     * @OA\Property(
     *     title="number of night",
     *     description="number of night",
     *     example=19,
     *     format="integer",
     * )
     *
     * @var integer
     */
    private $number_of_night;

}
