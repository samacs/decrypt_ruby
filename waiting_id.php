<?php
$examples = [['encrypt_client_key' => 'RffxeGOfiHjZ8oodYsHo6A==', 'ab' => 'brX3LevfNDOYMBtRl71HGw==', 'encrypted' => 'kjNuH2A=', 'waiting_id' => '64769'],
             ['encrypt_client_key' => 'bnqk_t7et-PdXRPpaNfCAQ==', 'ab' => 'tPxEmIbZu0UL-eknZ8Zu6g==', 'encrypted' => '3CGQBy8=', 'waiting_id' => '60216'],
             ['encrypt_client_key' => '4AYFWk2u0gYaioncZHCp_g==', 'ab' => 'wTbFvZROvPcjI71AhYbMdw==', 'encrypted' => 'kYiARKI=', 'waiting_id' => '62009'],
             ['encrypt_client_key' => 'z4K7EbQrEtxZ5ocfYmI43Q==', 'ab' => 'vBdw8rlayLhf3YTlafKw8Q==', 'encrypted' => 'BFr8DBk=', 'waiting_id' => '69967'],
             ['encrypt_client_key' => 'dkpr8EnwRdDe6L2NZceIWg==', 'ab' => 'vo_Vm85biXY6tBjfR-xIQA==', 'encrypted' => 'deiOfQg=', 'waiting_id' => '65474']];

$method = 'AES-128-CTR';
foreach ($examples as $index => $example) {
    $no = $index + 1;
    $key = base64_decode($example["encrypt_client_key"], true);
    $iv = base64_decode($example["ab"], true);
    $data = base64_decode($example["encrypted"], true);
    $result = openssl_decrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
    $passed = $result == $example["waiting_id"] ? 'Yes' : 'No';
    echo "[{$no}] Key: {$example["encrypt_client_key"]}\n";
    echo "[{$no}] ab: {$example["ab"]}\n";
    echo "[{$no}] Waiting ID: {$example["waiting_id"]}\n";
    echo "[{$no}] Result: {$result}\n";
    echo "[{$no}] Passed? {$passed}\n";
}
