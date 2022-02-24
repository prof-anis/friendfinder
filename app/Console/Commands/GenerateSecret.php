<?php

namespace App\Console\Commands;

use App\Services\AppleToken;
use Illuminate\Console\Command;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class GenerateSecret extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = new \DateTimeImmutable();

        $jwtConfig = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::file(base_path('customer.pem'))
        );

        $token = $jwtConfig->builder()
            ->issuedBy('DTG67AR9Q4')
            ->issuedAt($now)
            ->expiresAt($now->modify('+1 hour'))
            ->permittedFor('https://appleid.apple.com')
            ->relatedTo('com.app.amatnow')
            ->withHeader('kid', '3TVFN65TZ8')
            ->getToken($jwtConfig->signer(), $jwtConfig->signingKey());

        echo $token->toString();
    }
}

