<?php
$examples = [['encrypt_client_key' => 'XOdMSzdcqnfIllYcdTwT-w==', 'ab' => 'tVpnRVbh1ZzZ-DBaeVdkdw==', 'encrypted' => 'uTgOZF0=', 'waiting_id' => '63304'],
             ['encrypt_client_key' => 'SeB6hFbP2nO-L4lWcr1iIw==', 'ab' => 'idZ4IVQpMBFWZxiWPXjVFQ==', 'encrypted' => '41KH7Fs=', 'waiting_id' => '68111'],
             ['encrypt_client_key' => 'JAVIRdd6S88APOuWkjnHiQ==', 'ab' => 'O3NfcJtpH71A828F0eXSXw==', 'encrypted' => 'U9XL0uc=', 'waiting_id' => '69677'],
             ['encrypt_client_key' => 'wpvfnz_8MPuygoODRN1Mjg==', 'ab' => '-e6wo-kZgl6wFyZaLOTjEQ==', 'encrypted' => '8tWq9ec=', 'waiting_id' => '61640'],
             ['encrypt_client_key' => 'ttoqsD0GSY2EseL7I16OEg==', 'ab' => '6biBxXK96dbRiZjrPBOZKw==', 'encrypted' => 'DQFdUmA=', 'waiting_id' => '66121']];

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
