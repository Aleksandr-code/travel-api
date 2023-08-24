<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Login request",
 *      description="Login request body data",
 *      type="object",
 *      required={"email", "password"}
 * )
 */

class LoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="email",
     *      example="user@box.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="password",
     *      example="123123123"
     * )
     *
     * @var string
     */
    public $password;
}
