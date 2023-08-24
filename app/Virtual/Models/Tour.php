<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Tour",
 *     description="Tour model",
 * )
 */

class Tour
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
     *     title="name",
     *     description="name",
     *     format="string",
     *     example="Magnam totam illum."
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="starting date",
     *     description="starting date",
     *     example="2023-08-18",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $starting_date;

    /**
     * @OA\Property(
     *     title="ending date",
     *     description="ending date",
     *     example="2023-08-23",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $ending_date;

    /**
     * @OA\Property(
     *     title="ending date",
     *     description="ending date",
     *     example="154.60",
     *     format="float",
     * )
     *
     * @var float
     */
    private $price;

}
