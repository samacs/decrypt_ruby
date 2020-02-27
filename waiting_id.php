<?php
$examples = [['encrypt_client_key' => '8F_u5-A8WpV_5B6Dt6T5-Q', 'ab' => 'r8VeM-p5osfK9l3kA5F2Ig', 'encrypted' => '-xmYcMI', 'waiting_id' => '62687'],
             ['encrypt_client_key' => 'hAurPAgj7OXWumzilpeCfQ', 'ab' => 'rCuuBDHdoSgrgaMR9vAr4Q', 'encrypted' => 'q7zP7ok', 'waiting_id' => '69016'],
             ['encrypt_client_key' => 'q3bj3y0icCIPF6hs9I-fRQ', 'ab' => 'gZ7jrjS7oB7aRHoGEw52sg', 'encrypted' => 'o7Ip6gE', 'waiting_id' => '66576'],
             ['encrypt_client_key' => 'rVsyBzGup7mMqeO_NkWmdA', 'ab' => 'e4gOyn_FSRT27iOLfBbDxA', 'encrypted' => '14Pz32c', 'waiting_id' => '67104'],
             ['encrypt_client_key' => 'KQmGhtbM9mD1IVxIAozvcA', 'ab' => 'RcdR3us_HCz4nVkPAyP-BQ', 'encrypted' => 'QlN-tzE', 'waiting_id' => '65233']];

$method = 'AES-128-CTR';
foreach ($examples as $index => $example) {
    $no = $index + 1;
    $key = urlsafe_decode64($example["encrypt_client_key"]);
    $iv = urlsafe_decode64($example["ab"]);
    $data = urlsafe_decode64($example["encrypted"]);
    $result = openssl_decrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
    $passed = $result == $example["waiting_id"] ? 'Yes' : 'No';
    echo "[{$no}] Key: {$example["encrypt_client_key"]}\n";
    echo "[{$no}] ab: {$example["ab"]}\n";
    echo "[{$no}] Waiting ID: {$example["waiting_id"]}\n";
    echo "[{$no}] Result: {$result}\n";
    echo "[{$no}] Passed? {$passed}\n";
}

function urlsafe_decode64($data) {
    return base64_decode(strtr($data, '-_', '+/'));
}
