<?php

namespace App\Http\Controllers\Api\Swagger;

/**
 *
 * @OA\Info(
 *      version = "1.0.0",
 *      title = "Travel-Api Documentation",
 * )
 *
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Authenfication for project",
 * )
 * @OA\Tag(
 *     name="Travel",
 *     description="Operations with travel",
 * )
 * @OA\Tag(
 *     name="Tour",
 *     description="Operations with tour",
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 *
 */

class MainController
{

}
