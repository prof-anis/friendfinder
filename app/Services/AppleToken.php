<?php

namespace App\Services;

use Carbon\CarbonImmutable;
use Lcobucci\JWT\Configuration;

class AppleToken
{
    private Configuration $jwtConfig;

    public function __construct(Configuration $jwtConfig)
    {
        $this->jwtConfig = $jwtConfig;
    }

    public function generate()
    {
        $now = CarbonImmutable::now();

        $token = $this->jwtConfig->builder()
            ->issuedBy(config('services.apple.team_id'))
            ->issuedAt($now)
            ->expiresAt($now->addHour())
            ->permittedFor('https://appleid.apple.com')
            ->relatedTo(config('services.apple.client_id'))
            ->withHeader('kid', config('services.apple.key_id'))
            ->getToken($this->jwtConfig->signer(), $this->jwtConfig->signingKey());

        return $token->toString();
    }

    public function f()
    {
        $privateKeyFile = 'key.txt';
        //read the private key
        $privateKey = openssl_pkey_get_private(
        file_get_contents(storage_path($privateKeyFile))
        );
        //Prepare payload
        $payload = array(
        'iss' => 'xxx',
        'iat' => Carbon::now()->timestamp,
        'exp' => 1800,
        'aud' => 'https://appleid.apple.com',
        'sub' => 'xxx'
        );
        //Prepare header
        $header = [
        'kid' => 'xxx'
        ];
        //Generate jwt code
        $jwt = JWT::encode($payload, $privateKey, 'ES256', null, $header);

        var_dump($jwt); die;
    }
}
