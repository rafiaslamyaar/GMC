# Mark Cox Training - HTML/CSS/JS Website

This is a plain HTML, CSS, and JavaScript version of the Mark Cox Training website.

## Files Included

- **index.html** - Home page with hero section, stats, services preview, and testimonials
- **about.html** - About page with Mark's bio, values, and certifications
- **services.html** - Training programs and pricing packages
- **booking.html** - Interactive booking system with calendar and time selection
- **admin-calendar.html** - Admin panel for managing blocked dates (PIN: 1234)
- **styles.css** - All styling for the website
- **main.js** - Shared JavaScript functions

## Setup Instructions

1. **Add Your Logo**
   - Replace `logo.png` with your actual logo image file
   - The logo should be a square image (recommended size: 100x100px or larger)
   - Supported formats: PNG, JPG, SVG

2. **Open the Website**
   - Simply open `index.html` in your web browser
   - All pages work locally without needing a server

3. **Customize Content**
   - Edit the HTML files to change text, images, and content
   - Edit `styles.css` to modify colors, fonts, and layout
   - The primary brand color is `#e8580a` (orange)

## Features

### Booking System
- Interactive calendar showing available dates
- Time slot selection
- Contact form for booking details
- Blocked dates are shown in red and can't be selected
- Uses browser localStorage to save blocked dates

### Admin Calendar
- PIN-protected admin panel (default PIN: 1234)
- Click on dates to block/unblock them
- View list of all blocked dates
- Changes sync with the booking page automatically

### Navigation
- Fixed header with scroll effect
- Active page highlighting
- Responsive design (works on mobile, tablet, desktop)

## Customization Tips

### Change Colors
Edit `styles.css` and replace `#e8580a` (orange) with your preferred color.

### Change Fonts
The site uses Google Fonts (Inter). To change:
1. Go to [fonts.google.com](https://fonts.google.com)
2. Select your font
3. Replace the font link in each HTML file's `<head>`
4. Update `font-family` in `styles.css`

### Update Images
- Hero images are loaded from Unsplash
- Replace the image URLs with your own hosted images
- Recommended sizes:
  - Hero: 1920x1080px
  - Service cards: 600x800px
  - About photo: 800x1000px

### Change Admin PIN
In `admin-calendar.html`, find this line:
```javascript
const CORRECT_PIN = '1234';
```
Change '1234' to your desired PIN.

## Browser Compatibility

Works on all modern browsers:
- Chrome
- Firefox
- Safari
- Edge

## Deployment

To put this website online:

1. **Upload to Web Host**
   - Upload all files to your web hosting via FTP
   - Make sure all files are in the same directory
   - Your host should have an `index.html` file in the root

2. **Free Hosting Options**
   - [Netlify](https://www.netlify.com) - Drag & drop deployment
   - [Vercel](https://vercel.com) - Free static hosting
   - [GitHub Pages](https://pages.github.com) - Free with GitHub

3. **Domain Setup**
   - Point your domain (markcoxtraining.nl) to your hosting service
   - Most hosts provide instructions for this

## Support

For questions or issues:
- Check the HTML comments in each file for guidance
- All functionality is in plain JavaScript (no frameworks required)
- LocalStorage is used for blocked dates (data stays in the browser)

## Important Notes

- **LocalStorage Limitation**: Blocked dates are stored in the browser's localStorage. This means:
  - Data is saved per browser/device
  - Clearing browser data will reset blocked dates
  - For production use, consider connecting to a real database

- **Form Submissions**: Currently, form submissions show a success message but don't send data anywhere. To make it functional:
  - Add a backend service (PHP, Node.js, etc.)
  - Or use a form service like Formspree, EmailJS, or Netlify Forms

- **No Database**: This is a static website. For real bookings and persistent data, you'll need:
  - A backend server
  - A database (MySQL, PostgreSQL, or cloud service like Supabase/Firebase)
  - Server-side code to handle bookings and emails

## License

This template is provided as-is for your personal or commercial use.

---

**Version**: 1.0  
**Last Updated**: March 2026
