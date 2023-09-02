<?php

namespace YG\TrioMobil;

interface TrioMobilInterface
{
    /**
     * @param string $licensePlate
     *
     * @return null|object
     *
     * Example:
     * {
     * "time": "2023-05-05 11:41:24",
     * "lat": 40.68414166666666,
     * "lon": 36.56892333333334,
     * "spd": "0.0",
     * "dir": "88.0",
     * "ml": "22245.0",
     * "add": "Samsun Erzincan Yolu, Tokat, Türkiye,Erbaa",
     * "is": false,
     * "battery": "0",
     * "is_gps": true,
     * "is_lbs": false,
     * "d_input1": false,
     * "d_input2": false,
     * "signal_time": "2023-05-05 12:41:24",
     * "csq": "21",
     * "num_sats": "10",
     * "alt": "0.0",
     * "stop_time": "2023-05-05 12:41:24",
     * "move_time": "0",
     * "temp_in": "0.0",
     * "temp_out": "0.0",
     * "humidity": "0.0",
     * "timestamp": 1683276084
     * }
     */
    public function getLocation(string $licensePlate): ?object;
}