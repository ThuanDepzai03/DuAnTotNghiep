@extends('layouts.master')

@section('content')
  <div class="bg-neutral-100 text-neutral-800 min-h-screen">
    <main class="max-w-6xl mx-auto p-4 md:py-8 w-full">
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
            <input id="phone1" type="text" autocomplete="off" placeholder="Tìm sản phẩm trong cửa hàng..." 
              class="w-full pl-10 pr-4 py-3 bg-neutral-50 border border-neutral-300 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition" />
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-neutral-400 text-sm"></i>
          </div>
          <div id="product1Suggestions" class="mt-2 space-y-1"></div>
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
            <input id="phone2" type="text" autocomplete="off" placeholder="Tìm sản phẩm trong cửa hàng..." 
              class="w-full pl-10 pr-4 py-3 bg-neutral-50 border border-neutral-300 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition" />
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-neutral-400 text-sm"></i>
          </div>
          <div id="product2Suggestions" class="mt-2 space-y-1"></div>
        </div>
      </div>

      <p class="mt-4 pt-4 border-t border-neutral-100 text-center text-xs text-neutral-400">
        Chỉ có thể chọn các sản phẩm đang kinh doanh và còn hàng trong cửa hàng.
      </p>

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

    </main>
  </div>

  <script>
    const compareCatalog = @json($compareProducts);
    const selectedProductId = @json($selectedProductId);
    const selectedProducts = [null, null];
    const compareInputs = [document.getElementById('phone1'), document.getElementById('phone2')];
    const suggestionBoxes = [document.getElementById('product1Suggestions'), document.getElementById('product2Suggestions')];

    function productById(id) {
      return compareCatalog.find(product => Number(product.id) === Number(id)) || null;
    }

    function renderSuggestions(index) {
      const query = compareInputs[index].value.trim().toLowerCase();
      const selectedOther = selectedProducts[1 - index]?.id;
      const products = compareCatalog
        .filter(product => product.id !== selectedOther)
        .filter(product => !query || product.name.toLowerCase().includes(query))
        .slice(0, 8);

      suggestionBoxes[index].innerHTML = products.map(product => `
        <button type="button" data-product-id="${product.id}"
          class="flex w-full items-center justify-between rounded-lg border border-neutral-200 bg-white px-3 py-2 text-left text-sm hover:border-red-300 hover:bg-red-50">
          <span class="font-medium text-neutral-700">${product.name}</span>
          <span class="ml-3 whitespace-nowrap text-xs font-bold text-red-600">${product.priceLabel}</span>
        </button>
      `).join('');

      suggestionBoxes[index].querySelectorAll('[data-product-id]').forEach(button => {
        button.addEventListener('click', () => selectProduct(index, button.dataset.productId));
      });
    }

    function selectProduct(index, productId) {
      const product = productById(productId);
      if (!product) return;
      selectedProducts[index] = product;
      compareInputs[index].value = product.name;
      suggestionBoxes[index].innerHTML = `<div class="text-xs font-semibold text-emerald-600">Đã chọn: ${product.name} · ${product.priceLabel}</div>`;
    }

    compareInputs.forEach((input, index) => {
      input.addEventListener('focus', () => renderSuggestions(index));
      input.addEventListener('input', () => {
        selectedProducts[index] = null;
        renderSuggestions(index);
      });
    });

    if (selectedProductId) {
      selectProduct(0, selectedProductId);
    } else {
      renderSuggestions(0);
    }
    renderSuggestions(1);

    async function executeCompare() {
      const p1 = selectedProducts[0];
      const p2 = selectedProducts[1];

      if (!p1 || !p2) {
        alert("Vui lòng chọn đủ 2 sản phẩm trong danh sách cửa hàng!");
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
              { name: p1.name, price: p1.priceLabel },
              { name: p2.name, price: p2.priceLabel }
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
@endsection