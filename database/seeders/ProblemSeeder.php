<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;

class ProblemSeeder extends Seeder
{
    public function run(): void
    {
        $problems = [
            // Web (lebih banyak)
            ['title' => 'Web Easy 1', 'description' => 'Simple web page. Check source for flag.', 'category' => 'Web', 'points' => 50, 'flag' => 'musly{web_easy_1}'],
            ['title' => 'Web Easy 2', 'description' => 'Hidden comment in HTML.', 'category' => 'Web', 'points' => 50, 'flag' => 'musly{view_source_2}'],
            ['title' => 'Web Easy 3', 'description' => 'Basic directory listing reveals file.', 'category' => 'Web', 'points' => 60, 'flag' => 'musly{dir_list_found}'],
            ['title' => 'Web SQLi 1', 'description' => 'Login form vulnerable to SQL injection.', 'category' => 'Web', 'points' => 150, 'flag' => 'musly{sql_sqli_1}'],
            ['title' => 'Web SQLi 2', 'description' => 'Error-based SQLi on search parameter.', 'category' => 'Web', 'points' => 175, 'flag' => 'musly{error_sqli_2}'],
            ['title' => 'Web Auth Bypass', 'description' => 'Bypass authentication via logic flaw.', 'category' => 'Web', 'points' => 200, 'flag' => 'musly{auth_bypass_success}'],
            ['title' => 'Web LFI', 'description' => 'Local file inclusion on page parameter.', 'category' => 'Web', 'points' => 200, 'flag' => 'musly{lfi_included}'],
            ['title' => 'Web RCE (Simple)', 'description' => 'Find command injection point.', 'category' => 'Web', 'points' => 300, 'flag' => 'musly{rce_simple}'],
            ['title' => 'Web XXE', 'description' => 'Upload XML that triggers XXE.', 'category' => 'Web', 'points' => 220, 'flag' => 'musly{xxe_detected}'],
            ['title' => 'Web File Upload', 'description' => 'Upload bypass to upload webshell.', 'category' => 'Web', 'points' => 300, 'flag' => 'musly{upload_bypass}'],
            ['title' => 'Web JWT Flaw', 'description' => 'Forge JWT to escalate privileges.', 'category' => 'Web', 'points' => 250, 'flag' => 'musly{jwt_forged}'],
            ['title' => 'Web CSRF', 'description' => 'Perform CSRF to change user email.', 'category' => 'Web', 'points' => 120, 'flag' => 'musly{csrf_change_email}'],
            ['title' => 'Web Cookie Poison', 'description' => 'Tamper cookie to view admin page.', 'category' => 'Web', 'points' => 180, 'flag' => 'musly{cookie_poisoned}'],
            ['title' => 'Web Broken Access', 'description' => 'Access restricted file via IDOR.', 'category' => 'Web', 'points' => 160, 'flag' => 'musly{idor_access}'],
            ['title' => 'Web SSRF', 'description' => 'Trigger SSRF to access internal endpoint.', 'category' => 'Web', 'points' => 260, 'flag' => 'musly{ssrf_internal}'],

            // Crypto (banyak)
            ['title' => 'Crypto Easy 1', 'description' => 'Base64 encoded string to decode: bXVzbHlfY3J5cHRv', 'category' => 'Crypto', 'points' => 50, 'flag' => 'musly{crypto_base64_1}'],
            ['title' => 'Crypto Easy 2', 'description' => 'ROT13 message to decode.', 'category' => 'Crypto', 'points' => 50, 'flag' => 'musly{crypto_rot13}'],
            ['title' => 'Crypto XOR', 'description' => 'XOR with single byte key.', 'category' => 'Crypto', 'points' => 120, 'flag' => 'musly{xor_key_found}'],
            ['title' => 'Crypto RSA Small e', 'description' => 'Recover message from RSA with small exponent.', 'category' => 'Crypto', 'points' => 300, 'flag' => 'musly{rsa_recovered}'],
            ['title' => 'Crypto ECB', 'description' => 'Detect ECB mode and recover block.', 'category' => 'Crypto', 'points' => 180, 'flag' => 'musly{ecb_detected}'],
            ['title' => 'Crypto Padding', 'description' => 'Padding oracle allows decryption.', 'category' => 'Crypto', 'points' => 250, 'flag' => 'musly{padding_oracle}'],
            ['title' => 'Crypto Hash Crack', 'description' => 'Crack simple MD5 hash with known dictionary.', 'category' => 'Crypto', 'points' => 90, 'flag' => 'musly{md5_cracked}'],
            ['title' => 'Crypto OTP Reuse', 'description' => 'One-time pad reused — recover message.', 'category' => 'Crypto', 'points' => 320, 'flag' => 'musly{otp_reuse}'],
            ['title' => 'Crypto Diffie', 'description' => 'Weak DH params leak secret.', 'category' => 'Crypto', 'points' => 280, 'flag' => 'musly{dh_weak}'],
            ['title' => 'Crypto Stego', 'description' => 'Hidden message in PNG LSB.', 'category' => 'Crypto', 'points' => 140, 'flag' => 'musly{png_lsb_flag}'],
            ['title' => 'Crypto Challenge', 'description' => 'Custom cipher; find key from hints.', 'category' => 'Crypto', 'points' => 200, 'flag' => 'musly{custom_cipher_key}'],
            ['title' => 'Crypto Hard 1', 'description' => 'RSA common modulus attack.', 'category' => 'Crypto', 'points' => 500, 'flag' => 'musly{rsa_common_mod}'],
            ['title' => 'Crypto Hard 2', 'description' => 'Bleichenbacher style oracle.', 'category' => 'Crypto', 'points' => 550, 'flag' => 'musly{bleichenbacher_win}'],

            // Forensics
            ['title' => 'Forensic Text', 'description' => 'Find flag in provided text file.', 'category' => 'Forensic', 'points' => 70, 'flag' => 'musly{found_in_text}'],
            ['title' => 'Forensic Zip', 'description' => 'Extract password-protected zip (hint in README).', 'category' => 'Forensic', 'points' => 130, 'flag' => 'musly{zip_extracted}'],
            ['title' => 'Forensic Memory', 'description' => 'Analyze memory dump for secret.', 'category' => 'Forensic', 'points' => 300, 'flag' => 'musly{memdump_secret}'],
            ['title' => 'Forensic Pcap', 'description' => 'Inspect pcap to find HTTP flag.', 'category' => 'Forensic', 'points' => 160, 'flag' => 'musly{pcap_http_flag}'],

            // Reverse
            ['title' => 'Reverse Easy 1', 'description' => 'Simple binary with printed hint.', 'category' => 'Reverse', 'points' => 100, 'flag' => 'musly{rev_easy_1}'],
            ['title' => 'Reverse Obf', 'description' => 'Obfuscated program; trace logic.', 'category' => 'Reverse', 'points' => 220, 'flag' => 'musly{rev_obf}'],
            ['title' => 'Reverse Crackme', 'description' => 'Crackme that verifies a serial.', 'category' => 'Reverse', 'points' => 260, 'flag' => 'musly{crackme_solved}'],

            // Pwn
            ['title' => 'Pwn Buffer', 'description' => 'Classic buffer overflow to get shell', 'category' => 'Pwn', 'points' => 350, 'flag' => 'musly{buff_overflowed}'],
            ['title' => 'Pwn Format', 'description' => 'Format string to leak address.', 'category' => 'Pwn', 'points' => 300, 'flag' => 'musly{fmt_leak}'],

            // Stego
            ['title' => 'Stego Image 1', 'description' => 'Extract LSB from image.', 'category' => 'Stego', 'points' => 120, 'flag' => 'musly{stego_lsb_1}'],
            ['title' => 'Stego Image 2', 'description' => 'Hidden zip inside image bytes.', 'category' => 'Stego', 'points' => 150, 'flag' => 'musly{stego_zip}'],

            // Misc
            ['title' => 'Misc Trivia', 'description' => 'Answer question about hints in README.', 'category' => 'Misc', 'points' => 30, 'flag' => 'musly{misc_trivia}'],
            ['title' => 'Misc Puzzle', 'description' => 'Logic puzzle; combine pieces for flag.', 'category' => 'Misc', 'points' => 80, 'flag' => 'musly{puzzle_solved}'],

            // OSINT
            ['title' => 'OSINT 1', 'description' => 'Find the developer\'s public hint online.', 'category' => 'OSINT', 'points' => 90, 'flag' => 'musly{osint_found}'],

            // More Web
            ['title' => 'Web Auth Token', 'description' => 'Decode token to get flag.', 'category' => 'Web', 'points' => 140, 'flag' => 'musly{auth_token_decoded}'],
            ['title' => 'Web Cache Poison', 'description' => 'Exploit cache misconfig to see secret.', 'category' => 'Web', 'points' => 320, 'flag' => 'musly{cache_poisoned}'],
            ['title' => 'Web Template Injection', 'description' => 'Server-side template injection to read file.', 'category' => 'Web', 'points' => 300, 'flag' => 'musly{ssti_file}'],
            ['title' => 'Web Open Redirect', 'description' => 'Chain redirect to exfiltrate param.', 'category' => 'Web', 'points' => 90, 'flag' => 'musly{open_redirect_exfil}'],
            ['title' => 'Web OAuth Flow', 'description' => 'Abuse OAuth redirect to attack.', 'category' => 'Web', 'points' => 260, 'flag' => 'musly{oauth_bypass}'],

            // More Crypto
            ['title' => 'Crypto Stream', 'description' => 'Stream cipher keystream recovery.', 'category' => 'Crypto', 'points' => 220, 'flag' => 'musly{stream_recovered}'],
            ['title' => 'Crypto MAC', 'description' => 'Forge MAC by length extension.', 'category' => 'Crypto', 'points' => 230, 'flag' => 'musly{mac_forged}'],
            ['title' => 'Crypto Weak RNG', 'description' => 'Predictable RNG reveals flag.', 'category' => 'Crypto', 'points' => 190, 'flag' => 'musly{rng_predicted}'],
            ['title' => 'Crypto Signature', 'description' => 'Exploit signature verification bug.', 'category' => 'Crypto', 'points' => 350, 'flag' => 'musly{sig_exploit}'],

            // Remaining variety to make total = 50
            ['title' => 'Forensic Image', 'description' => 'Recover deleted file from image.', 'category' => 'Forensic', 'points' => 170, 'flag' => 'musly{img_recovered}'],
            ['title' => 'Reverse ASM', 'description' => 'Static analysis of asm gives flag.', 'category' => 'Reverse', 'points' => 210, 'flag' => 'musly{asm_read}'],
            ['title' => 'Pwn Heap', 'description' => 'Heap exploit to overwrite return.', 'category' => 'Pwn', 'points' => 400, 'flag' => 'musly{heap_pwned}'],
            ['title' => 'Stego Audio', 'description' => 'Hidden message in WAV file.', 'category' => 'Stego', 'points' => 160, 'flag' => 'musly{audio_stego}'],
            ['title' => 'Misc CLI', 'description' => 'Use provided CLI tool to get flag.', 'category' => 'Misc', 'points' => 70, 'flag' => 'musly{cli_used_flag}'],
            ['title' => 'Web Bruteforce Hint', 'description' => 'Find weak credential from hint page.', 'category' => 'Web', 'points' => 110, 'flag' => 'musly{weak_creds_found}'],
            ['title' => 'Crypto Hybrid', 'description' => 'Mix of classical ciphers to solve.', 'category' => 'Crypto', 'points' => 160, 'flag' => 'musly{hybrid_solved}'],
            ['title' => 'Web Subdomain', 'description' => 'Discover hidden subdomain with flag.', 'category' => 'Web', 'points' => 130, 'flag' => 'musly{subdomain_flag}']
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }
    }
}
