<?php

namespace YG\TrioMobil;

use YG\TrioMobil\TrioMobilInterface;

class TrioMobil implements TrioMobilInterface
{
    private string
        $host,
        $username,
        $password;

    public function __construct(string $host, string $username, string $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getLocation(string $licensePlate): ?object
    {
        $url = $this->host . '/GetLocation?username=' . $this->username . '&password=' . $this->password
            . '&license_plate=' . urlencode($licensePlate);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        if ($result === false)
            return null;

        $result = json_decode($result);
        if (isset($result->status))
            return null;

        $result->license_plate = $licensePlate;
        return $result;
    }
}