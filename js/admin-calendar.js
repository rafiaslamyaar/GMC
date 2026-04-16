// Admin Calendar JavaScript
const CORRECT_PIN = '1234';
let currentMonth = new Date();
let selectedDate = null;

const DB_BLOCKED_DATES = window.DB_BLOCKED_DATES || new Set();
const DB_BOOKINGS = window.DB_BOOKINGS || [];

function getBlockedDates() {
  return Array.from(DB_BLOCKED_DATES).sort();
}

function isDateBlocked(date) {
  return DB_BLOCKED_DATES.has(formatDate(date));
}

async function updateBlockedDate(dateStr, action) {
  try {
    const formData = new FormData();
    formData.append('date', dateStr);
    formData.append('action', action);

    const response = await fetch('../pages/admin-block.php', {
      method: 'POST',
      body: formData
    });
    const result = await response.json();

    if (!response.ok || !result.success) {
      alert(result.error || 'Kon de datum niet bijwerken.');
      return false;
    }

    if (action === 'block') {
      DB_BLOCKED_DATES.add(dateStr);
    } else {
      DB_BLOCKED_DATES.delete(dateStr);
    }

    return true;
  } catch (error) {
    console.error('Fout bij blokkeren/deblokkeren:', error);
    alert('Er is iets misgegaan bij het bijwerken van de datum.');
    return false;
  }
}

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
    renderCalendar();
    renderBlockedList();
    renderBookingsList();
  } else {
    alert('Foute PIN. Probeer het opnieuw.\n\nDemo PIN: 1234');
    document.getElementById('pinInput').value = '';
  }
}

function logout() {
  document.getElementById('adminPanel').classList.add('hidden');
  document.getElementById('pinContainer').classList.remove('hidden');
  document.getElementById('pinInput').value = '';
}

function renderCalendar() {
  const year = currentMonth.getFullYear();
  const month = currentMonth.getMonth();

  document.getElementById('monthTitle').textContent = getMonthName(currentMonth);

  const daysInMonth = getDaysInMonth(year, month);
  const firstDay = getFirstDayOfMonth(year, month);

  const daysContainer = document.getElementById('calendarDays');
  daysContainer.innerHTML = '';

  for (let i = 0; i < firstDay; i++) {
    const emptyDay = document.createElement('button');
    emptyDay.className = 'calendar-day outside';
    emptyDay.disabled = true;
    daysContainer.appendChild(emptyDay);
  }

  for (let day = 1; day <= daysInMonth; day++) {
    const date = new Date(year, month, day);
    const dayBtn = document.createElement('button');
    dayBtn.className = 'calendar-day';
    dayBtn.textContent = day;

    const blocked = isDateBlocked(date);
    const past = isPastDate(date);
    const today = isToday(date);

    if (blocked) {
      dayBtn.classList.add('blocked');
    }

    if (past && !blocked) {
      dayBtn.disabled = true;
    }

    if (today && !blocked) {
      dayBtn.classList.add('today');
    }

    if (selectedDate && isSameDate(date, selectedDate)) {
      dayBtn.classList.add('selected');
    }

    if (!past) {
      dayBtn.onclick = () => selectDate(date);
    }

    daysContainer.appendChild(dayBtn);
  }
}

function selectDate(date) {
  if (isPastDate(date)) return;
  selectedDate = date;
  renderCalendar();
  renderBlockedList();
}

async function toggleBlockDate(date) {
  if (isPastDate(date)) return;

  const dateStr = formatDate(date);
  const blocked = isDateBlocked(date);
  const action = blocked ? 'unblock' : 'block';

  const result = await updateBlockedDate(dateStr, action);
  if (!result) return;

  selectedDate = date;
  renderCalendar();
  renderBlockedList();
}

function renderBookingsList() {
  const container = document.getElementById('bookingsList');
  if (!container) return;

  if (DB_BOOKINGS.length === 0) {
    container.innerHTML = '<div style="text-align: center; color: rgba(255, 255, 255, 0.4); padding: 2rem 0;">Er zijn geen actieve boekingen beschikbaar.</div>';
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
      <div class="booking-card" style="background-color: #161616; border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 1rem; margin-bottom: 1rem;">
        <div style="display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap; align-items: flex-start;">
          <div>
            <div style="font-weight: 700; font-size: 1rem; color: white;">${booking.name}</div>
            <div style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-top: 0.5rem;">${booking.program} · ${formatDateDisplay(bookingDate)} · ${booking.time}</div>
            <div style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-top: 0.25rem;">${booking.email}${booking.phone ? ' · ' + booking.phone : ''}</div>
            ${booking.notes ? `<div style="color: rgba(255,255,255,0.72); font-size: 0.88rem; margin-top: 0.75rem; font-style: italic;">Notitie: ${booking.notes}</div>` : ''}
          </div>
          <div style="color: rgba(255,255,255,0.9); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em;">${statusLabel}</div>
        </div>
        ${actions}
      </div>
    `;
  }).join('');
}

async function updateBookingStatus(bookingId, newStatus) {
  let reason = '';
  if (newStatus === 'cancelled') {
    const promptValue = prompt('Wat is de reden van annulering? (optioneel)');
    if (promptValue === null) {
      return false;
    }
    reason = promptValue.trim();
  }

  const formData = new FormData();
  formData.append('id', bookingId);
  formData.append('status', newStatus);
  formData.append('reason', reason);

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

function renderBlockedList() {
  const blocked = getBlockedDates();
  const container = document.getElementById('blockedDatesList');
  const count = document.getElementById('blockedCount');

  count.textContent = blocked.length;

  let html = '';

  // Show selected date block/unblock option if a date is selected
  if (selectedDate) {
    const blocked = isDateBlocked(selectedDate);
    const statusBtn = blocked
      ? `<button class="btn btn-secondary" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;" onclick="toggleBlockDate(selectedDate)">Deblokkeren</button>`
      : `<button class="btn btn-primary" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;" onclick="toggleBlockDate(selectedDate)">Blokkeren</button>`;

    html += `
      <div class="blocked-date-item" style="border-bottom: 2px solid #e8580a; background-color: rgba(232, 88, 10, 0.1);">
        <div style="display: flex; flex-direction: column; gap: 0.25rem;">
          <span style="color: white; font-weight: 600;">${formatDateDisplay(selectedDate)}</span>
          <span style="color: rgba(255, 255, 255, 0.6); font-size: 0.8rem;">${blocked ? 'Geblokkeerd' : 'Beschikbaar'}</span>
        </div>
        ${statusBtn}
      </div>
    `;
  }

  if (blocked.length === 0 && !selectedDate) {
    html += `
      <p style="text-align: center; color: rgba(255, 255, 255, 0.3); padding: 2rem 0;">
        Nog geen geblokkeerde datums. Klik in de kalender om een datum te blokkeren.
      </p>
    `;
  } else {
    html += blocked.map(dateStr => {
      const date = new Date(dateStr + 'T00:00:00');
      return `
        <div class="blocked-date-item">
          <span style="color: rgba(255, 255, 255, 0.8);">${formatDateDisplay(date)}</span>
          <button class="remove-btn" onclick="unblockDate('${dateStr}')">DEBLOKKEER</button>
        </div>
      `;
    }).join('');
  }

  container.innerHTML = html;
}

async function unblockDate(dateStr) {
  const result = await updateBlockedDate(dateStr, 'unblock');
  if (!result) return;

  selectedDate = null;
  renderCalendar();
  renderBlockedList();
}

function previousMonth() {
  currentMonth.setMonth(currentMonth.getMonth() - 1);
  renderCalendar();
}

function nextMonth() {
  currentMonth.setMonth(currentMonth.getMonth() + 1);
  renderCalendar();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
  // Any initialization needed
});
