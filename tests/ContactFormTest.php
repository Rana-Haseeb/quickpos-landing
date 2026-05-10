<?php
// tests/ContactFormTest.php

// 1. The Validation Logic (Mocking the backend form processor)
function validateContactForm($name, $email, $message) {
    if (empty(trim($name))) return "Name is required.";
    if (empty(trim($email))) return "Email is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Invalid email format.";
    if (empty(trim($message))) return "Message is required.";
    return "Success";
}

// 2. The Testing Framework
$testsPassed = 0;
$testsFailed = 0;

function assertTest($testName, $expected, $actual) {
    global $testsPassed, $testsFailed;
    if ($expected === $actual) {
        echo "✅ PASS: $testName\n";
        $testsPassed++;
    } else {
        echo "❌ FAIL: $testName (Expected: '$expected', Got: '$actual')\n";
        $testsFailed++;
    }
}

echo "Running QuickPOS Contact Form Automated Tests...\n\n";

// 3. The 5 Mandatory Test Cases
// Test 1: Empty Name
assertTest("Test 1: Empty Name Validation", "Name is required.", validateContactForm("", "test@example.com", "Hello"));

// Test 2: Empty Email
assertTest("Test 2: Empty Email Validation", "Email is required.", validateContactForm("Rana Haseeb", "", "Hello"));

// Test 3: Invalid Email Format
assertTest("Test 3: Invalid Email Format", "Invalid email format.", validateContactForm("Rana Haseeb", "not-an-email", "Hello"));

// Test 4: Empty Message
assertTest("Test 4: Empty Message Validation", "Message is required.", validateContactForm("Rana Haseeb", "haseeb@example.com", ""));

// Test 5: Valid Submission (Success Case)
assertTest("Test 5: Valid Form Submission", "Success", validateContactForm("Rana Haseeb", "haseeb@example.com", "I would like to buy QuickPOS!"));

// 4. Output Results and Trigger CI/CD Pipeline Status
echo "\nResults: $testsPassed Passed, $testsFailed Failed.\n";

if ($testsFailed > 0) {
    exit(1); // Fails the GitHub Actions pipeline
} else {
    // Generate simple test report output for Stage 6 (Artifacts)
    @mkdir('build');
    file_put_contents('build/test-report.txt', "QuickPOS Test Suite Results:\nTests run: 5. Passed: 5. Failed: 0.");
    exit(0); // Passes the GitHub Actions pipeline
}