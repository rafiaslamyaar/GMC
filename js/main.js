// Mark Cox Training - Main JavaScript

// Navbar scroll effect
window.addEventListener('scroll', () => {
  const header = document.querySelector('header');
  if (window.scrollY > 40) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});

// Set active nav link based on current page
function setActiveNav() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  const navLinks = document.querySelectorAll('nav a');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
  setActiveNav();

  // AJAX navigation - DISABLED due to incomplete implementation
  /*
  document.addEventListener('click', (e) => {
    if (e.target.tagName === 'A' && (e.target.classList.contains('nav-link') || e.target.href.includes('pages/') || e.target.href.includes('booking.php')) && !e.target.href.includes('admin-')) {
      e.preventDefault();
      let url = e.target.href;
      if (!url.includes('?')) url += '?ajax=1';
      else url += '&ajax=1';
      fetch(url)
        .then(response => response.text())
        .then(html => {
          document.getElementById('main-content').innerHTML = html;
          history.pushState(null, '', e.target.href);
          setActiveNav(); // update active nav
        })
        .catch(err => console.error('Error loading page:', err));
    }
  });

  // Handle back/forward buttons
  window.addEventListener('popstate', () => {
    const url = window.location.href;
    let ajaxUrl = url;
    if (!ajaxUrl.includes('?')) ajaxUrl += '?ajax=1';
    else ajaxUrl += '&ajax=1';
    fetch(ajaxUrl)
      .then(response => response.text())
      .then(html => {
        document.getElementById('main-content').innerHTML = html;
        setActiveNav();
      })
      .catch(err => console.error('Error loading page:', err));
  });
  */
});

// LocalStorage helper functions
function getBlockedDates() {
  try {
    return JSON.parse(localStorage.getItem('blockedDates') || '[]');
  } catch {
    return [];
  }
}

function setBlockedDates(dates) {
  localStorage.setItem('blockedDates', JSON.stringify(dates));
}

function addBlockedDate(date) {
  const blocked = getBlockedDates();
  if (!blocked.includes(date)) {
    blocked.push(date);
    setBlockedDates(blocked);
  }
}

function removeBlockedDate(date) {
  const blocked = getBlockedDates();
  const filtered = blocked.filter(d => d !== date);
  setBlockedDates(filtered);
}

function isDateBlocked(date) {
  const blocked = getBlockedDates();
  return blocked.includes(formatDate(date));
}

// Date helper functions
function formatDate(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
}

function formatDateDisplay(date) {
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  return date.toLocaleDateString('nl-NL', options);
}

function getMonthName(date) {
  return date.toLocaleDateString('nl-NL', { month: 'long', year: 'numeric' });
}

function getDaysInMonth(year, month) {
  return new Date(year, month + 1, 0).getDate();
}

function getFirstDayOfMonth(year, month) {
  // Get day of week (0 = Sunday, 1 = Monday, etc.)
  const day = new Date(year, month, 1).getDay();
  // Convert to Monday-based (0 = Monday, 6 = Sunday)
  return day === 0 ? 6 : day - 1;
}

function isPastDate(date) {
  const today = new Date();
  today.setHours(0, 0, 0, 0);
  return date < today;
}

function isToday(date) {
  const today = new Date();
  return date.toDateString() === today.toDateString();
}

function isSameDate(date1, date2) {
  return date1 && date2 && date1.toDateString() === date2.toDateString();
}

// Mobile menu toggle (basic implementation)
function toggleMobileMenu() {
  const nav = document.querySelector('nav');
  nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
}
