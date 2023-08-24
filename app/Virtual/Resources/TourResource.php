<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="TourResource",
 *     description="Tour resource",
 *     @OA\Xml(
 *         name="TourResource"
 *     )
 * )
 */

class TourResource
{
    /**
     *
     * @OA\Property(
     *     title="data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Tour[]
     *
     */
    private $data;
}
