<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>So Sánh Điện Thoại Bằng AI - AE PHOENIC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-neutral-100 text-neutral-800 min-h-screen flex flex-col">

  <!-- Header đồng bộ AE PHOENIC -->
  <header class="bg-neutral-900 text-white py-4 px-6 border-b border-neutral-800 sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <div class="flex items-center gap-3">
        <a href="/" class="text-red-600 font-black text-2xl tracking-wider hover:opacity-90">AE PHOENIC</a>
        <span class="text-xs bg-red-600/20 text-red-500 font-bold px-2 py-0.5 rounded border border-red-600/30 flex items-center gap-1">
          <i class="fa-solid fa-wand-magic-sparkles"></i> AI COMPARATOR
        </span>
      </div>
      <a href="/" class="text-sm text-neutral-400 hover:text-white flex items-center gap-1.5 transition">
        <i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ
      </a>
    </div>
  </header>

  <main class="max-w-6xl mx-auto p-4 md:py-8 w-full flex-1">
    <!-- Tiêu đề -->
    <div class="text-center mb-8">
      <h1 class="text-3xl md:text-4xl font-black text-neutral-900 tracking-tight">
        So Sánh Mọi Loại Điện Thoại
      </h1>
      <p class="text-neutral-500 mt-2 text-sm md:text-base">
        Nhập 2 dòng máy bất kỳ (cùng hãng hoặc khác hãng), AI của AE PHOENIC sẽ bóc tách chi tiết ưu - nhược điểm.
      </p>
    </div>

    <!-- KHUNG TÌM KIẾM & CHỌN 2 MÁY -->
    <div class="bg-white p-6 md:p-8 rounded-2xl border border-neutral-200 shadow-sm mb-8">
      <div class="grid grid-cols-1 md:grid-cols-11 gap-4 items-center">
        <!-- Ô nhập máy 1 -->
        <div class="md:col-span-5">
          <label class="block text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2">
            <i class="fa-solid fa-mobile-screen text-red-600 mr-1"></i> Sản phẩm thứ nhất
          </label>
          <div class="relative">
            <input id="phone1" type="text" placeholder="Gõ tên máy: iPhone 15 Pro, S24 Ultra..." 
              class="w-full pl-10 pr-4 py-3 bg-neutral-50 border border-neutral-300 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition" />
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-neutral-400 text-sm"></i>
          </div>
        </div>

        <!-- Biểu tượng VS ở giữa -->
        <div class="md:col-span-1 text-center flex justify-center">
          <span class="w-10 h-10 rounded-full bg-red-100 text-red-600 font-black flex items-center justify-center border border-red-200 text-xs shadow-inner">
            VS
          </span>
        </div>

        <!-- Ô nhập máy 2 -->
        <div class="md:col-span-5">
          <label class="block text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2">
            <i class="fa-solid fa-mobile-screen text-red-600 mr-1"></i> Sản phẩm thứ hai
          </label>
          <div class="relative">
            <input id="phone2" type="text" placeholder="Gõ tên máy: Xiaomi 14, Galaxy S23 FE..." 
              class="w-full pl-10 pr-4 py-3 bg-neutral-50 border border-neutral-300 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition" />
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-neutral-400 text-sm"></i>
          </div>
        </div>
      </div>

      <!-- Gợi ý nhanh các cặp so sánh hot -->
      <div class="mt-4 pt-4 border-t border-neutral-100 flex flex-wrap items-center gap-2 text-xs">
        <span class="text-neutral-400 font-medium">Gợi ý so sánh hot:</span>
        <button onclick="setCompare('iPhone 15 Pro Max', 'Samsung Galaxy S24 Ultra')" class="bg-neutral-100 hover:bg-neutral-200 px-2.5 py-1 rounded-full text-neutral-700 transition">
          iPhone 15 Pro Max vs S24 Ultra
        </button>
        <button onclick="setCompare('Samsung Galaxy S23 FE', 'iPhone 13')" class="bg-neutral-100 hover:bg-neutral-200 px-2.5 py-1 rounded-full text-neutral-700 transition">
          S23 FE vs iPhone 13
        </button>
        <button onclick="setCompare('Xiaomi 14 Ultra', 'Samsung Galaxy S24 Ultra')" class="bg-neutral-100 hover:bg-neutral-200 px-2.5 py-1 rounded-full text-neutral-700 transition">
          Xiaomi 14 Ultra vs S24 Ultra
        </button>
      </div>

      <!-- Nút bấm hành động -->
      <div class="mt-6 flex justify-center">
        <button id="btnCompare" onclick="executeCompare()" class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-red-600/30 flex items-center gap-2 uppercase text-sm tracking-wider transition">
          <i class="fa-solid fa-wand-magic-sparkles"></i> Bắt đầu phân tích ngay
        </button>
      </div>
    </div>

    <!-- Hiệu ứng Loading -->
    <div id="loading" class="hidden flex-col items-center justify-center py-16">
      <div class="w-12 h-12 border-4 border-red-600 border-t-transparent rounded-full animate-spin"></div>
      <p class="mt-4 font-bold text-neutral-700">AI đang tra cứu cấu hình, giá cả và phân tích điểm mạnh - yếu...</p>
      <p class="text-xs text-neutral-400 mt-1">Quá trình này mất khoảng 2-3 giây</p>
    </div>

    <!-- KẾT QUẢ SO SÁNH -->
    <div id="resultBox" class="hidden space-y-6">
      <!-- Lời khuyên tổng kết từ AI (Verdict) -->
      <div class="bg-red-50 border-l-4 border-red-600 p-5 rounded-r-2xl shadow-sm">
        <h3 class="font-bold text-red-900 text-base flex items-center gap-2 mb-2">
          <i class="fa-solid fa-award text-red-600 text-lg"></i> Kết luận & Gợi ý chọn mua từ AI:
        </h3>
        <p id="verdictText" class="text-neutral-700 text-sm leading-relaxed"></p>
      </div>

      <!-- 2 Cột thẻ điện thoại so sánh -->
      <div id="cardsGrid" class="grid grid-cols-1 md:grid-cols-2 gap-6"></div>
    </div>
  </main>

  <footer class="bg-white border-t border-neutral-200 py-4 text-center text-xs text-neutral-400">
    © AE PHOENIC - Đồ án tốt nghiệp hệ thống bán điện thoại tích hợp AI
  </footer>

  <script>
    // Hàm bấm vào gợi ý nhanh
    function setCompare(p1, p2) {
      document.getElementById('phone1').value = p1;
      document.getElementById('phone2').value = p2;
      executeCompare();
    }

    async function executeCompare() {
      const p1 = document.getElementById('phone1').value.trim();
      const p2 = document.getElementById('phone2').value.trim();

      if (!p1 || !p2) {
        alert("Vui lòng nhập tên cả 2 dòng điện thoại để so sánh!");
        return;
      }

      const btn = document.getElementById('btnCompare');
      const loading = document.getElementById('loading');
      const resultBox = document.getElementById('resultBox');

      btn.disabled = true;
      btn.classList.add('opacity-50');
      loading.classList.remove('hidden');
      loading.classList.add('flex');
      resultBox.classList.add('hidden');

      try {
        const res = await fetch("{{ route('compare.ai') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            products: [
              { name: p1, price: "Tra cứu theo thị trường" },
              { name: p2, price: "Tra cứu theo thị trường" }
            ]
          })
        });

        const data = await res.json();
        if (data.error) throw new Error(data.error);

        renderResult(data);
      } catch (err) {
        alert("Có lỗi xảy ra: " + err.message);
      } finally {
        btn.disabled = false;
        btn.classList.remove('opacity-50');
        loading.classList.add('hidden');
        loading.classList.remove('flex');
      }
    }

    function renderResult(data) {
      document.getElementById('verdictText').textContent = data.verdict;
      const grid = document.getElementById('cardsGrid');
      grid.innerHTML = '';

      data.products.forEach(p => {
        const card = document.createElement('div');
        card.className = "bg-white border border-neutral-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between";
        card.innerHTML = `
          <div>
            <div class="border-b border-neutral-100 pb-4 mb-5">
              <span class="text-xs uppercase font-bold text-red-600 tracking-wider">ĐIỆN THOẠI</span>
              <h2 class="text-xl font-extrabold text-neutral-900 mt-1">${p.name}</h2>
              <div class="text-xl font-black text-red-600 mt-2 flex items-center gap-1.5">
                <i class="fa-solid fa-tag text-sm"></i> ${p.price}
              </div>
            </div>

            <!-- Cấu hình & Tính năng -->
            <div class="mb-5">
              <h4 class="text-xs font-bold uppercase text-neutral-400 mb-2.5 tracking-wider">Thông số nổi bật</h4>
              <ul class="space-y-2 text-sm text-neutral-600">
                ${p.features.map(f => `<li class="flex items-start gap-2.5"><i class="fa-solid fa-microchip text-neutral-400 mt-1"></i><span>${f}</span></li>`).join('')}
              </ul>
            </div>

            <!-- Điểm mạnh -->
            <div class="mb-5">
              <h4 class="text-xs font-bold uppercase text-emerald-600 mb-2.5 flex items-center gap-1.5 tracking-wider">
                <i class="fa-solid fa-circle-check"></i> Điểm mạnh
              </h4>
              <ul class="space-y-2 text-sm text-neutral-600">
                ${p.strengths.map(s => `<li class="flex items-start gap-2.5"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>${s}</span></li>`).join('')}
              </ul>
            </div>

            <!-- Điểm yếu -->
            <div class="mb-5">
              <h4 class="text-xs font-bold uppercase text-rose-600 mb-2.5 flex items-center gap-1.5 tracking-wider">
                <i class="fa-solid fa-circle-xmark"></i> Điểm cần cân nhắc
              </h4>
              <ul class="space-y-2 text-sm text-neutral-600">
                ${p.weaknesses.map(w => `<li class="flex items-start gap-2.5"><i class="fa-solid fa-minus text-rose-500 mt-1"></i><span>${w}</span></li>`).join('')}
              </ul>
            </div>
          </div>
        `;
        grid.appendChild(card);
      });

      document.getElementById('resultBox').classList.remove('hidden');
    }
  </script>
</body>
</html>