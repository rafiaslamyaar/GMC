# Email Configuration Guide

## Overview
Your booking system now sends automatic emails to customers:
1. **Pending Email** - Sent when they submit a booking request
2. **Confirmation Email** - Sent when you accept/confirm their booking

## Configuration

### Step 1: Update Email Settings
Edit the file: `includes/mailer.php`

Go to the top of the file and update these settings:

```php
define('MAILER_FROM_EMAIL', 'noreply@markcoxtraining.com');   // Your 'from' email address
define('MAILER_FROM_NAME', 'Mark Cox Training');              // Your company name
define('MAILER_ADMIN_EMAIL', 'admin@markcoxtraining.com');   // Your admin email
```

**Change these values to:**
- **MAILER_FROM_EMAIL**: The email address that customers will see emails coming from (usually noreply@yourdomain.com or your business email)
- **MAILER_FROM_NAME**: Your business/training name that appears in the "From" field
- **MAILER_ADMIN_EMAIL**: Your admin email (optional, for internal notifications)

### Step 2: Server Email Configuration
Make sure your server/hosting provider has mail sending enabled. This system uses the standard PHP `mail()` function, which requires:

- A mail server configured on your hosting
- The ability to send emails from your server/domain

If you're using shared hosting, email sending is usually already enabled. Verify with your hosting provider if emails aren't being sent.

## Email Templates

The system sends two types of emails:

### 1. Pending Email
- Sent immediately when customer submits booking
- Tells them their request is received and pending review
- Shows their booking details
- Email color: Orange accent

### 2. Confirmation Email  
- Sent when admin accepts/confirms the booking
- Tells them their booking is confirmed
- Shows confirmed booking details
- Email color: Green accent
- Includes reminder to arrive on time

## Email Logs

All sent emails are logged to: `logs/email_log.txt`

This file tracks:
- When emails were sent
- Who they were sent to
- Whether sending was successful

Check this file if you need to troubleshoot email issues.

## Troubleshooting

### Emails Not Sending?
1. Check that your email settings are configured correctly in `includes/mailer.php`
2. Check the logs in `logs/email_log.txt` to see if emails were attempted
3. Contact your hosting provider to confirm mail functionality is enabled
4. Make sure the "from" email matches your domain or is an authorized sender

### Emails Going to Spam?
1. Make sure the "from" email is from your domain (not @gmail.com, etc.)
2. Add your domain's SPF and DKIM records through your hosting provider
3. Use a professional email domain rather than free email services

### PHP mail() Not Working?
If `mail()` function isn't available, you can upgrade to PHPMailer:
1. Install Composer if you don't have it
2. Run: `composer require phpmailer/phpmailer`
3. Replace the functions in `includes/mailer.php` to use PHPMailer

## Testing

To test if emails are working:
1. Go to the booking page
2. Submit a test booking with your email address
3. Check your inbox for the pending email
4. Go to admin bookings page and accept the booking
5. Check your inbox for the confirmation email

If you don't see emails, check the logs and server configuration.
