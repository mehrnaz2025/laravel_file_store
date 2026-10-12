/* ===== STATIC DATA ===== */
const commentsData = {
  1: {
    user: 'علی رضایی', avatar: 'ع', date: '1403/08/10 - 14:30', regDate: '1403/08/10',
    product: 'پکیج آموزش جاوااسکریپت',
    content: 'عالی بود، خیلی راضی هستم. محتوای آموزشی بسیار کاربردی و به روز بود.',
    rate: '⭐⭐⭐⭐⭐', status: 'تایید شده', statusClass: 'bg-success-g',
    replies: [
      { user: 'پشتیبانی', role: 'admin', avatar: 'A', date: '1403/08/10 - 16:45', content: 'سلام علی عزیز، از نظر مثبت شما بسیار سپاسگزاریم. 🌹' },
      { user: 'علی رضایی', role: 'user', avatar: 'ع', date: '1403/08/11 - 09:20', content: 'خواهش می‌کنم، سوالی داشتم درباره فصل ۵.' },
      { user: 'پشتیبانی', role: 'admin', avatar: 'A', date: '1403/08/11 - 11:30', content: 'بله، ویدیوهای تکمیلی تا پایان هفته اضافه می‌شه. 👍' }
    ]
  },
  2: {
    user: 'مریم احمدی', avatar: 'م', date: '1403/08/12 - 11:15', regDate: '1403/08/12',
    product: 'ایبوک طراحی UI/UX',
    content: 'محتوا خوب بود ولی قیمت بالا.',
    rate: '⭐⭐⭐⭐', status: 'در انتظار', statusClass: 'bg-warning-g',
    replies: [
      { user: 'پشتیبانی', role: 'admin', avatar: 'A', date: '1403/08/12 - 14:30', content: 'در جشنواره بعدی تخفیف ویژه خواهیم داشت. 🎁' }
    ]
  },
  3: {
    user: 'رضا کریمی', avatar: 'ر', date: '1403/08/15 - 18:45', regDate: '1403/08/15',
    product: 'قالب فروشگاهی وردپرس',
    content: 'مشکل در نصب داشتم.',
    rate: '⭐⭐', status: 'رد شده', statusClass: 'bg-danger-g',
    replies: []
  }
};

const ticketsData = {
  1: {
    user: 'علی رضایی', avatar: 'ع', date: '1403/08/10 - 10:15', regDate: '1403/08/10',
    subject: 'مشکل در دانلود فایل', email: 'ali@test.com', phone: '09121234567',
    content: 'سلام، فایل پکیج جاوااسکریپت را خریداری کردم ولی لینک دانلود خطا می‌دهد.',
    priority: 'بالا', priorityClass: 'bg-danger-g', status: 'باز', statusClass: 'bg-warning-g',
    replies: [
      { user: 'پشتیبانی', role: 'admin', avatar: 'A', date: '1403/08/10 - 11:30', content: 'سلام، لطفاً مرورگر خود را تغییر دهید.' },
      { user: 'علی رضایی', role: 'user', avatar: 'ع', date: '1403/08/10 - 12:45', content: 'با مرورگر دیگر هم تست کردم ولی باز هم خطا می‌ده.' }
    ]
  },
  2: {
    user: 'مریم احمدی', avatar: 'م', date: '1403/08/12 - 09:30', regDate: '1403/08/12',
    subject: 'سوال درباره قالب', email: 'maryam@test.com', phone: '09351234567',
    content: 'آیا این قالب با آخرین نسخه وردپرس سازگاره؟',
    priority: 'کم', priorityClass: 'bg-info-g', status: 'پاسخ داده شده', statusClass: 'bg-info-g',
    replies: [
      { user: 'پشتیبانی', role: 'admin', avatar: 'A', date: '1403/08/12 - 10:15', content: 'بله، کاملاً سازگاره. 👍' }
    ]
  },
  3: {
    user: 'رضا کریمی', avatar: 'ر', date: '1403/08/15 - 15:20', regDate: '1403/08/15',
    subject: 'درخواست فاکتور', email: 'reza@test.com', phone: '09191234567',
    content: 'برای خرید #1003 فاکتور رسمی نیاز دارم.',
    priority: 'متوسط', priorityClass: 'bg-warning-g', status: 'باز', statusClass: 'bg-warning-g',
    replies: []
  }
};

let currentCommentId = null;
let currentTicketId = null;

/* ===== NAVIGATION ===== */
document.querySelectorAll('.menu-item').forEach(function(item) {
  item.onclick = function() {
    document.querySelectorAll('.menu-item').forEach(function(i){ i.classList.remove('active'); });
    document.querySelectorAll('.page').forEach(function(p){ p.classList.remove('active'); });
    item.classList.add('active');
    var page = item.getAttribute('data-page');
    document.getElementById('page-' + page).classList.add('active');
    document.getElementById('pageTitle').textContent = item.querySelector('span:last-child').textContent;
  };
});

function goToPage(pageId, title) {
  document.querySelectorAll('.page').forEach(function(p){ p.classList.remove('active'); });
  document.getElementById(pageId).classList.add('active');
  document.getElementById('pageTitle').textContent = title;
  window.scrollTo(0, 0);
}

/* ===== فیلتر با دکمه‌های button ===== */
function filterByStatus(btn, tableId) {
  const parent = btn.parentElement;
  const allBtns = parent.querySelectorAll('.status-btn');

  allBtns.forEach(function(b) {
    b.classList.remove('active');
  });

  btn.classList.add('active');

  const filterValue = btn.getAttribute('data-filter');
  const table = document.getElementById(tableId);
  if(!table) return;

  const rows = table.querySelectorAll('tbody tr');
  rows.forEach(function(row) {
    const rowStatus = row.getAttribute('data-status');
    if(filterValue === 'all' || rowStatus === filterValue) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}

/* ===== COMMENT DETAIL ===== */
function showCommentDetail(id) {
  currentCommentId = id;
  const data = commentsData[id];
  if(!data) return;

  document.getElementById('commentAvatar').textContent = data.avatar;
  document.getElementById('commentUserName').textContent = data.user;
  document.getElementById('commentDate').textContent = data.date;
  document.getElementById('commentRegDate').textContent = data.regDate;
  document.getElementById('commentProduct').textContent = data.product;
  document.getElementById('commentContent').textContent = data.content;
  document.getElementById('commentRate').textContent = data.rate;

  const statusEl = document.getElementById('commentStatus');
  statusEl.textContent = data.status;
  statusEl.className = 'badge-gold ' + data.statusClass;

  document.getElementById('commentDetailTitle').textContent = '💬 نظر ' + data.user;

  const container = document.getElementById('repliesContainer');
  document.getElementById('repliesCount').textContent = data.replies.length;

  if(data.replies.length === 0) {
    container.innerHTML = '<div class="empty-replies"><div class="icon">💭</div><div>هنوز پاسخی ثبت نشده است</div></div>';
  } else {
    container.innerHTML = data.replies.map(r => `
      <div class="reply-item ${r.role}">
        <div class="reply-item-header">
          <div class="reply-user">
            <div class="reply-avatar ${r.role}">${r.avatar}</div>
            <div>
              <div class="reply-name">
                ${r.user}
                <span class="reply-role ${r.role}-role">${r.role === 'admin' ? '🛡️ مدیر' : '👤 کاربر'}</span>
              </div>
            </div>
          </div>
          <div class="reply-date">📅 ${r.date}</div>
        </div>
        <div class="reply-content">${r.content}</div>
      </div>
    `).join('');
  }

  goToPage('page-comment-detail', '💬 جزئیات نظر ' + data.user);
}

function backToComments() {
  document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
  document.querySelector('[data-page="comments"]').classList.add('active');
  goToPage('page-comments', 'نظرات');
}

function approveComment() {
  if(!currentCommentId) return;
  if(confirm('آیا از تایید این نظر اطمینان دارید؟')) {
    const statusEl = document.getElementById('commentStatus');
    statusEl.textContent = 'تایید شده';
    statusEl.className = 'badge-gold bg-success-g';
    alert('✅ نظر با موفقیت تایید شد');
  }
}

function rejectComment() {
  if(!currentCommentId) return;
  if(confirm('آیا از رد این نظر اطمینان دارید؟')) {
    const statusEl = document.getElementById('commentStatus');
    statusEl.textContent = 'رد شده';
    statusEl.className = 'badge-gold bg-danger-g';
    alert('✅ نظر با موفقیت رد شد');
  }
}

/* ===== TICKET DETAIL ===== */
function showTicketDetail(id) {
  currentTicketId = id;
  const data = ticketsData[id];
  if(!data) return;

  document.getElementById('ticketAvatar').textContent = data.avatar;
  document.getElementById('ticketUserName').textContent = data.user;
  document.getElementById('ticketDate').textContent = data.date;
  document.getElementById('ticketRegDate').textContent = data.regDate;
  document.getElementById('ticketSubject').textContent = data.subject;
  document.getElementById('ticketEmail').textContent = data.email;
  document.getElementById('ticketPhone').textContent = data.phone;
  document.getElementById('ticketContent').textContent = data.content;

  const priorityEl = document.getElementById('ticketPriority');
  priorityEl.textContent = 'اولویت: ' + data.priority;
  priorityEl.className = 'badge-gold ' + data.priorityClass;

  const statusEl = document.getElementById('ticketStatus');
  statusEl.textContent = data.status;
  statusEl.className = 'badge-gold ' + data.statusClass;

  document.getElementById('ticketDetailTitle').textContent = '🎫 تیکت: ' + data.subject;

  const container = document.getElementById('ticketRepliesContainer');
  document.getElementById('ticketRepliesCount').textContent = data.replies.length;

  if(data.replies.length === 0) {
    container.innerHTML = '<div class="empty-replies"><div class="icon">💭</div><div>هنوز پاسخی ثبت نشده است</div></div>';
  } else {
    container.innerHTML = data.replies.map(r => `
      <div class="reply-item ${r.role}">
        <div class="reply-item-header">
          <div class="reply-user">
            <div class="reply-avatar ${r.role}">${r.avatar}</div>
            <div>
              <div class="reply-name">
                ${r.user}
                <span class="reply-role ${r.role}-role">${r.role === 'admin' ? '🛡️ مدیر' : '👤 کاربر'}</span>
              </div>
            </div>
          </div>
          <div class="reply-date">📅 ${r.date}</div>
        </div>
        <div class="reply-content">${r.content}</div>
      </div>
    `).join('');
  }

  goToPage('page-ticket-detail', '🎫 تیکت: ' + data.subject);
}

function backToTickets() {
  document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
  document.querySelector('[data-page="tickets"]').classList.add('active');
  goToPage('page-tickets', 'تیکت‌ها');
}

function approveTicket() {
  if(!currentTicketId) return;
  if(confirm('آیا از بستن این تیکت اطمینان دارید؟')) {
    const statusEl = document.getElementById('ticketStatus');
    statusEl.textContent = 'بسته';
    statusEl.className = 'badge-gold bg-success-g';
    alert('✅ تیکت با موفقیت بسته شد');
  }
}

function rejectTicket() {
  if(!currentTicketId) return;
  if(confirm('آیا از رد این تیکت اطمینان دارید؟')) {
    const statusEl = document.getElementById('ticketStatus');
    statusEl.textContent = 'رد شده';
    statusEl.className = 'badge-gold bg-danger-g';
    alert('✅ تیکت با موفقیت رد شد');
  }
}

function submitReply(type) {
  let textarea, data, id;
  if(type === 'comment') {
    textarea = document.getElementById('newReplyText');
    data = commentsData[currentCommentId];
    id = currentCommentId;
  } else {
    textarea = document.getElementById('newTicketReplyText');
    data = ticketsData[currentTicketId];
    id = currentTicketId;
  }

  const text = textarea.value.trim();
  if(!text) { alert('⚠️ لطفاً متن پاسخ را وارد کنید'); return; }

  const now = new Date();
  const dateStr = '1403/08/27 - ' + now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0');

  data.replies.push({
    user: 'پشتیبانی', role: 'admin', avatar: 'A',
    date: dateStr, content: text
  });
  textarea.value = '';

  if(type === 'comment') showCommentDetail(id);
  else showTicketDetail(id);

  alert('✅ پاسخ با موفقیت ارسال شد');
}

function confirmDelete() {
  if(confirm('آیا از حذف این مورد اطمینان دارید؟')) {
    alert('✅ مورد با موفقیت حذف شد');
  }
}

function searchTable(tableId, searchValue) {
  var table = document.getElementById(tableId);
  if(!table) return;
  var rows = table.querySelectorAll('tbody tr');
  searchValue = searchValue.toLowerCase();
  rows.forEach(function(row) {
    var text = row.textContent.toLowerCase();
    row.style.display = (text.includes(searchValue) || searchValue === '') ? '' : 'none';
  });
}

function searchFiles(searchValue) {
  var container = document.getElementById('files-container');
  if(!container) return;
  var fileItems = container.querySelectorAll('.file-item');
  searchValue = searchValue.toLowerCase();
  fileItems.forEach(function(item) {
    var text = item.textContent.toLowerCase();
    item.style.display = (text.includes(searchValue) || searchValue === '') ? '' : 'none';
  });
}

function filterTable(tableId, filterType, filterValue) {
  var table = document.getElementById(tableId);
  if(!table) return;
  var rows = table.querySelectorAll('tr[data-' + filterType + ']');
  rows.forEach(function(row) {
    var rowValue = row.getAttribute('data-' + filterType);
    row.style.display = (filterValue === '' || rowValue === filterValue) ? '' : 'none';
  });
}

function filterFiles(filterType, filterValue) {
  var container = document.getElementById('files-container');
  if(!container) return;
  var items = container.querySelectorAll('.file-item');
  items.forEach(function(item) {
    const selects = document.querySelectorAll('#page-files .filter-select');
    let show = true;
    selects.forEach(sel => {
      const type = sel.getAttribute('onchange').match(/'(\w+)'/)[1];
      const val = sel.value;
      if(val && item.getAttribute('data-' + type) !== val) show = false;
    });
    item.style.display = show ? '' : 'none';
  });
}

/* ===== CHARTS ===== */
window.onload = function() {
  var days = ['شنبه','یکشنبه','دوشنبه','سه‌شنبه','چهارشنبه','پنج‌شنبه','جمعه'];
  var salesData = [1200000, 1800000, 950000, 2400000, 1600000, 3100000, 2200000];
  var ctx1 = document.getElementById('salesChart').getContext('2d');
  var grad = ctx1.createLinearGradient(0,0,0,300);
  grad.addColorStop(0,'rgba(212,175,55,0.6)');
  grad.addColorStop(1,'rgba(212,175,55,0)');

  new Chart(ctx1, {
    type:'line',
    data:{ labels:days, datasets:[{
      label:'فروش (تومان)', data:salesData,
      borderColor:'#d4af37', backgroundColor:grad,
      tension:0.4, fill:true, borderWidth:3,
      pointBackgroundColor:'#f4d03f', pointBorderColor:'#fff', pointRadius:5
    }]},
    options:{
      responsive:true,
      plugins:{ legend:{ labels:{ color:'#c0c0c0' } } },
      scales:{
        x:{ ticks:{ color:'#c0c0c0' }, grid:{ color:'rgba(255,255,255,0.05)' } },
        y:{ ticks:{ color:'#c0c0c0' }, grid:{ color:'rgba(255,255,255,0.05)' } }
      }
    }
  });

  new Chart(document.getElementById('categoryChart'), {
    type:'doughnut',
    data:{
      labels:['آموزش','قالب','کتاب','گرافیک'],
      datasets:[{ data:[128,54,210,89], backgroundColor:['#d4af37','#c0c0c0','#f4d03f','#e8e8e8'], borderColor:'#000', borderWidth:2 }]
    },
    options:{
      responsive:true,
      plugins:{ legend:{ position:'bottom', labels:{ color:'#c0c0c0', padding:15 } } }
    }
  });
};

/* ===== فیلتر ترکیبی تیکت‌ها (اولویت + وضعیت) ===== */
function filterTickets(btn) {
  // 1. پیدا کردن همه دکمه‌های هم‌گروه (همون data-group)
  const parent = btn.parentElement;
  const group = btn.getAttribute('data-group');
  const allBtns = parent.querySelectorAll('.status-btn');

  // 2. حذف کلاس active از همه دکمه‌های هم‌گروه
  allBtns.forEach(function(b) {
    b.classList.remove('active');
  });

  // 3. اضافه کردن کلاس active به دکمه کلیک شده
  btn.classList.add('active');

  // 4. پیدا کردن مقدار فعلی هر دو فیلتر
  const priorityBtn = document.querySelector('.status-btn[data-group="priority"].active');
  const statusBtn = document.querySelector('.status-btn[data-group="status"].active');

  const priorityFilter = priorityBtn ? priorityBtn.getAttribute('data-filter') : 'all';
  const statusFilter = statusBtn ? statusBtn.getAttribute('data-filter') : 'all';

  // 5. فیلتر کردن ردیف‌های جدول
  const table = document.getElementById('tickets-table');
  if(!table) return;

  const rows = table.querySelectorAll('tbody tr');
  rows.forEach(function(row) {
    const rowPriority = row.getAttribute('data-priority');
    const rowStatus = row.getAttribute('data-status');

    const matchPriority = (priorityFilter === 'all' || rowPriority === priorityFilter);
    const matchStatus = (statusFilter === 'all' || rowStatus === statusFilter);

    if(matchPriority && matchStatus) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}



/* ===== LOGOUT CONFIRM ===== */
function confirmLogout() {
  if(confirm('آیا مطمئن هستید که می‌خواهید از حساب خود خارج شوید؟')) {
    alert('✅ شما با موفقیت از حساب خارج شدید');
    // در اینجا می‌تونی کد خروج واقعی رو اضافه کنی
    // مثلاً: window.location.href = 'login.html';
  }
}

/* ===== HANDLE PRODUCT FILE UPLOAD ===== */
function handleProductFile(input) {
  const fileNameDiv = document.getElementById('productFileName');
  const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/webp'];
  const maxSize = 5 * 1024 * 1024; // 5MB

  if(input.files && input.files[0]) {
    const file = input.files[0];

    // بررسی فرمت فایل
    if(!allowedTypes.includes(file.type)) {
      alert('❌ فرمت فایل مجاز نیست!\n\nفقط فرمت‌های PNG, JPG, JPEG, GIF, WEBP مجاز هستند.');
      input.value = ''; // پاک کردن input
      fileNameDiv.classList.remove('show');
      return;
    }

    // بررسی حجم فایل
    if(file.size > maxSize) {
      alert('❌ حجم فایل بیشتر از 5 مگابایت است!\n\nلطفاً فایل کوچکتری انتخاب کنید.');
      input.value = ''; // پاک کردن input
      fileNameDiv.classList.remove('show');
      return;
    }

    const fileSize = (file.size / 1024 / 1024).toFixed(2);
    fileNameDiv.innerHTML = `✅ تصویر انتخاب شده: <strong>${file.name}</strong> (${fileSize} MB)`;
    fileNameDiv.classList.add('show');
  } else {
    fileNameDiv.classList.remove('show');
  }
}
