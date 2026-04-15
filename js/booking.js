// Booking JavaScript
// Booking state
let currentMonth = new Date();
let selectedDate = null;
let selectedTime = null;

const DB_BLOCKED_DATES = window.DB_BLOCKED_DATES || new Set();
const DB_BOOKED_SLOTS = window.DB_BOOKED_SLOTS || [];

function isDateBlocked(date) {
  return DB_BLOCKED_DATES.has(formatDate(date));
}

function isDayBooked(date) {
  const dateStr = formatDate(date);
  return DB_BOOKED_SLOTS.some(b => b.date === dateStr);
}

function isSlotBooked(date, slotTime) {
  const dateStr = formatDate(date);
  return DB_BOOKED_SLOTS.some(b => b.date === dateStr && b.time.startsWith(slotTime + ':'));
}

const TIME_SLOTS = [
  '07:00', '08:00', '09:00', '10:00', '11:00',
  '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'
];

// Initialize calendar
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
    const dateStr = formatDate(date);
    const dayBtn = document.createElement('button');
    dayBtn.className = 'calendar-day';
    dayBtn.textContent = day;

    const blocked = isDateBlocked(date);
    const past = isPastDate(date);
    const today = isToday(date);

    if (blocked) {
      dayBtn.classList.add('blocked');
      dayBtn.disabled = true;
    } else if (past) {
      dayBtn.disabled = true;
    }

    if (today && !blocked) {
      dayBtn.classList.add('today');
    }

    const booked = isDayBooked(date);
    if (booked) {
      dayBtn.classList.add('partially-booked');
      dayBtn.title = 'Er zijn al boekingen op deze dag (kies een tijdslot)';
    }

    if (selectedDate && isSameDate(date, selectedDate)) {
      dayBtn.classList.add('selected');
    }

    if (!blocked && !past) {
      dayBtn.onclick = () => selectDate(date);
    }
    daysContainer.appendChild(dayBtn);
  }
}

function selectDate(date) {
  if (isPastDate(date) || isDateBlocked(date)) return;

  selectedDate = date;
  selectedTime = null;
  renderCalendar();
  renderTimeSlots();
}

function renderTimeSlots() {
  const container = document.getElementById('timeSlotContainer');
  const dateTitle = document.getElementById('dateTitle');
  const continueBtn = document.getElementById('continueBtn');

  if (!selectedDate) {
    container.innerHTML = `
      <div style="text-align: center; padding: 3rem 1rem;">
        <div style="font-size: 3rem; opacity: 0.2; margin-bottom: 1rem;">📅</div>
        <p style="color: rgba(255, 255, 255, 0.3); font-size: 0.85rem;">
          Kies een dag in de kalender om beschikbare tijden te zien
        </p>
      </div>
    `;
    dateTitle.textContent = 'Kies eerst een datum';
    continueBtn.style.display = 'none';
    return;
  }

  dateTitle.textContent = formatDateDisplay(selectedDate);

  const blockedDate = isDateBlocked(selectedDate);
  if (blockedDate) {
    container.innerHTML = `
      <div style="text-align: center; padding: 3rem 1rem;">
        <div style="font-size: 3rem; opacity: 0.2; margin-bottom: 1rem;">🚫</div>
        <p style="color: rgba(255, 255, 255, 0.3); font-size: 0.85rem;">
          Deze datum is geblokkeerd door de trainer
        </p>
      </div>
    `;
    continueBtn.style.display = 'none';
    return;
  }

  const availableSlots = TIME_SLOTS.filter(slot => !isSlotBooked(selectedDate, slot));

  if (availableSlots.length === 0) {
    container.innerHTML = `
      <div style="text-align: center; padding: 3rem 1rem;">
        <div style="font-size: 3rem; opacity: 0.2; margin-bottom: 1rem;">⏰</div>
        <p style="color: rgba(255, 255, 255, 0.3); font-size: 0.85rem;">
          Alle tijden zijn al geboekt voor deze datum
        </p>
      </div>
    `;
    continueBtn.style.display = 'none';
    return;
  }

  container.innerHTML = '<div class="time-slots"></div>';
  const slotsGrid = container.querySelector('.time-slots');

  availableSlots.forEach(slot => {
    const btn = document.createElement('button');
    btn.className = 'time-slot';
    btn.textContent = slot;
    btn.onclick = () => selectTime(slot);

    if (selectedTime === slot) {
      btn.classList.add('selected');
    }
    slotsGrid.appendChild(btn);
  });

  continueBtn.style.display = selectedTime ? 'block' : 'none';
}

function selectTime(time) {
  selectedTime = time;
  renderTimeSlots();
}

function showBookingForm() {
  if (!selectedDate || !selectedTime) return;

  document.getElementById('calendarContainer').parentElement.style.display = 'none';
  document.getElementById('bookingForm').classList.remove('hidden');
  document.getElementById('formDateDisplay').textContent = formatDateDisplay(selectedDate);
  document.getElementById('formTimeDisplay').textContent = `om ${selectedTime}`;
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function backToCalendar() {
  document.getElementById('calendarContainer').parentElement.style.display = 'grid';
  document.getElementById('bookingForm').classList.add('hidden');
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function submitBooking(event) {
  event.preventDefault();

  const name = document.getElementById('nameInput').value;
  const email = document.getElementById('emailInput').value;
  const phone = document.getElementById('phoneInput').value;
  const program = document.getElementById('programInput').value;
  const notes = document.getElementById('notesInput').value;

  if (!selectedDate || !selectedTime) {
    alert('Selecteer eerst een datum en tijd.');
    return;
  }

  const formData = new FormData();
  formData.append('name', name);
  formData.append('email', email);
  formData.append('phone', phone);
  formData.append('program', program);
  formData.append('notes', notes);
  formData.append('date', formatDate(selectedDate));
  formData.append('time', selectedTime);

  fetch('../pages/booking-submit.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
    if (data.success) {
      document.getElementById('bookingContent').innerHTML = `
        <div class="success-message">
          <div class="success-icon">✓</div>
          <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">BOEKING BEVESTIGD!</h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1rem; line-height: 1.7;">
            Bedankt <span style="color: white;">${name}</span>! Je sessie is aangevraagd voor
            <span style="color: #e8580a;">${formatDateDisplay(selectedDate)} om ${selectedTime}</span>.
          </p>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.9rem; margin-bottom: 2rem;">
            Mark bevestigt je afspraak per e-mail naar <strong style="color: rgba(255, 255, 255, 0.7);">${email}</strong> binnen 24 uur.
          </p>
          <button onclick="location.reload()" class="btn btn-primary">
            BOEK NOG EEN SESSIE
          </button>
        </div>
      `;
    } else {
      alert(data.error || 'Er is iets misgegaan bij het boeken.');
    }
  })
  .catch(err => {
    console.error('Booking submission error:', err);
    alert('Fout bij serververzoek: ' + err.message + '. Controleer de console voor details.');
  });
}

function previousMonth() {
  currentMonth.setMonth(currentMonth.getMonth() - 1);
  renderCalendar();
}

function nextMonth() {
  currentMonth.setMonth(currentMonth.getMonth() + 1);
  renderCalendar();
}

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
  renderCalendar();
  renderTimeSlots();
});
