// Admin Bookings JavaScript
const CORRECT_PIN = '1234';
const DB_BOOKINGS = window.DB_BOOKINGS || [];

function handlePinEnter(event) {
  if (event.key === 'Enter') {
    checkPin();
  }
}

function checkPin() {
  const pin = document.getElementById('pinInput').value;
  if (pin === CORRECT_PIN) {
    document.getElementById('pinContainer').classList.add('hidden');
    document.getElementById('adminPanel').classList.remove('hidden');
    renderBookingsList();
  } else {
    alert('Foute PIN. Probeer het opnieuw.');
    document.getElementById('pinInput').value = '';
  }
}

function logout() {
  document.getElementById('adminPanel').classList.add('hidden');
  document.getElementById('pinContainer').classList.remove('hidden');
  document.getElementById('pinInput').value = '';
}

function formatDateDisplay(date) {
  const options = { day: '2-digit', month: 'long', year: 'numeric' };
  return date.toLocaleDateString('nl-NL', options);
}

async function updateBookingStatus(bookingId, newStatus) {
  const formData = new FormData();
  formData.append('id', bookingId);
  formData.append('status', newStatus);

  const response = await fetch('../pages/admin-booking-update.php', {
    method: 'POST',
    body: formData
  });

  const data = await response.json();
  if (!data.success) {
    alert(data.error || 'Status update mislukt.');
    return false;
  }

  const bookingIndex = DB_BOOKINGS.findIndex(b => b.id === bookingId);
  if (bookingIndex > -1) {
    if (newStatus === 'cancelled') {
      DB_BOOKINGS.splice(bookingIndex, 1);
    } else {
      DB_BOOKINGS[bookingIndex].status = newStatus;
    }
  }

  renderBookingsList();
  return true;
}

function renderBookingsList() {
  const container = document.getElementById('bookingsList');
  if (DB_BOOKINGS.length === 0) {
    container.innerHTML = '<div class="bookings-empty">Er zijn geen actieve boekingen beschikbaar.</div>';
    return;
  }

  container.innerHTML = DB_BOOKINGS.map(booking => {
    const bookingDate = new Date(booking.date + 'T00:00:00');
    const statusLabel = booking.status === 'pending' ? 'In afwachting' : booking.status === 'confirmed' ? 'Bevestigd' : booking.status;
    const actions = booking.status === 'pending'
      ? `
          <div class="booking-actions">
            <button class="btn btn-primary" onclick="updateBookingStatus(${booking.id}, 'confirmed')">Accepteer</button>
            <button class="btn btn-secondary" onclick="updateBookingStatus(${booking.id}, 'cancelled')">Annuleer</button>
          </div>
        `
      : booking.status === 'confirmed'
      ? `
          <div class="booking-actions">
            <button class="btn btn-secondary" onclick="updateBookingStatus(${booking.id}, 'cancelled')">Annuleer</button>
          </div>
        `
      : '';

    return `
      <div class="booking-card">
        <div style="display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap; align-items: flex-start;">
          <div>
            <div style="font-weight: 700; font-size: 1rem; color: white;">${booking.name}</div>
            <div class="booking-meta">${booking.program} · ${formatDateDisplay(bookingDate)} · ${booking.time}</div>
            <div class="booking-meta">${booking.email}${booking.phone ? ' · ' + booking.phone : ''}</div>
            ${booking.notes ? `<div class="booking-meta" style="margin-top: 0.5rem; font-style: italic; color: rgba(255, 255, 255, 0.7);">Notitie: ${booking.notes}</div>` : ''}
          </div>
          <div class="booking-status">${statusLabel}</div>
        </div>
        ${actions}
      </div>
    `;
  }).join('');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
  // Any initialization needed
});
