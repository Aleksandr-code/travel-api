<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="TravelResource",
 *     description="Travel resource",
 *     @OA\Xml(
 *         name="TravelResource"
 *     )
 * )
 */

class TravelResource
{
    /**
     *
     * @OA\Property(
     *     title="data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Travel[]
     *
     */
    private $data;
}
