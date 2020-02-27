require 'openssl'
require 'base64'

examples = []
(0...5).each do |n|
  cipher = OpenSSL::Cipher::AES.new(128, :CTR)
  cipher.encrypt
  key = cipher.random_key
  iv = cipher.random_iv
  cipher.key = key
  cipher.iv = iv
  encrypt_client_key = Base64.urlsafe_encode64(key)
  ab = Base64.urlsafe_encode64(iv)
  waiting_id = (rand 60000..70000).to_s
  encrypted = cipher.update(waiting_id) + cipher.final
  encoded = Base64.urlsafe_encode64(encrypted)
  examples << { encrypt_client_key: encrypt_client_key,
                ab: ab,
                waiting_id: waiting_id,
                encoded: encoded }
end
# Uncomment to test examples
#
puts "Ruby tests:"
puts ""
examples.each do |example|
  decipher = OpenSSL::Cipher::AES.new(128, :CTR)
  decipher.decrypt
  decipher.key = Base64.urlsafe_decode64(example[:encrypt_client_key])
  decipher.iv = Base64.urlsafe_decode64(example[:ab])
  encrypted = Base64.urlsafe_decode64(example[:encoded])
  waiting_id = decipher.update(encrypted) + decipher.final
  puts "Key: #{example[:encrypt_client_key]}"
  puts "AB: #{example[:ab]}"
  puts "Encrypted: #{example[:waiting_id]}"
  puts "Result: #{waiting_id}"
  puts "Passed: #{waiting_id == example[:waiting_id]}"
end

puts ""
puts "PHP Examples:"
puts ""
puts "Replace this in `waiting_id.php`"
puts ""
parts = []
examples.each do |example|
  parts << "['encrypt_client_key' => '#{example[:encrypt_client_key]}', 'ab' => '#{example[:ab]}', 'encrypted' => '#{example[:encoded]}', 'waiting_id' => '#{example[:waiting_id]}']"
end
puts "```php\n\n"
print "$examples = [#{parts.join(",\n")}];"
puts "\n\n```"
