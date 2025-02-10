<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
                <div class="breadcrumb-wrapper">
                    @if(@isset($breadcrumbs))
                        <ol class="breadcrumb">
                            {{-- this will load breadcrumbs dynamically from controller --}}
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item">
                                    @if(isset($breadcrumb['link']))
                                        <a href="{{ $breadcrumb['link'] == 'javascript:void(0)' ? $breadcrumb['link']:url($breadcrumb['link']) }}">
                                            @endif
                                            {{$breadcrumb['name']}}
                                            @if(isset($breadcrumb['link']))
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <!-- Kalkulyator tugmasi -->
    <div class="content-header-right col-md-3 col-12 d-flex justify-content-end align-items-center">
        <svg type="button" width="32px" height=32px" viewBox="0 0 20 20" version="1.1" data-bs-toggle="modal"
             data-bs-target="#calculatorModal" style="display: flex; align-items: center; justify-content: center;">
            <g id="🔍-System-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ic_fluent_calculator_20_regular" fill="#7367f0" fill-rule="nonzero">
                    <path
                        d="M13.5,2 C14.8807,2 16,3.11929 16,4.5 L16,15.5 C16,16.8807 14.8807,18 13.5,18 L6.5,18 C5.11929,18 4,16.8807 4,15.5 L4,4.5 C4,3.11929 5.11929,2 6.5,2 L13.5,2 Z M13.5,3 L6.5,3 C5.67157,3 5,3.67157 5,4.5 L5,15.5 C5,16.3284 5.67157,17 6.5,17 L13.5,17 C14.3284,17 15,16.3284 15,15.5 L15,4.5 C15,3.67157 14.3284,3 13.5,3 Z M7,13 C7.55228,13 8,13.4477 8,14 C8,14.5523 7.55228,15 7,15 C6.44772,15 6,14.5523 6,14 C6,13.4477 6.44772,13 7,13 Z M13,13 C13.5523,13 14,13.4477 14,14 C14,14.5523 13.5523,15 13,15 C12.4477,15 12,14.5523 12,14 C12,13.4477 12.4477,13 13,13 Z M10,13 C10.5523,13 11,13.4477 11,14 C11,14.5523 10.5523,15 10,15 C9.44772,15 9,14.5523 9,14 C9,13.4477 9.44772,13 10,13 Z M7,10 C7.55228,10 8,10.4477 8,11 C8,11.5523 7.55228,12 7,12 C6.44772,12 6,11.5523 6,11 C6,10.4477 6.44772,10 7,10 Z M13,10 C13.5523,10 14,10.4477 14,11 C14,11.5523 13.5523,12 13,12 C12.4477,12 12,11.5523 12,11 C12,10.4477 12.4477,10 13,10 Z M10,10 C10.5523,10 11,10.4477 11,11 C11,11.5523 10.5523,12 10,12 C9.44772,12 9,11.5523 9,11 C9,10.4477 9.44772,10 10,10 Z M12.5,4 C13.2796706,4 13.9204457,4.59488554 13.9931332,5.35553954 L14,5.5 L14,6.5 C14,7.27969882 13.4050879,7.920449 12.6444558,7.99313345 L12.5,8 L7.5,8 C6.72030118,8 6.079551,7.40511446 6.00686655,6.64446046 L6,6.5 L6,5.5 C6,4.72030118 6.59488554,4.079551 7.35553954,4.00686655 L7.5,4 L12.5,4 Z M12.5,5 L7.5,5 C7.25454222,5 7.0503921,5.17687704 7.00805575,5.41012499 L7,5.5 L7,6.5 C7,6.74545778 7.17687704,6.9496079 7.41012499,6.99194425 L7.5,7 L12.5,7 C12.7454222,7 12.9496,6.82312296 12.9919429,6.58987501 L13,6.5 L13,5.5 C13,5.25454222 12.8230914,5.0503921 12.5898645,5.00805575 L12.5,5 Z"
                        id="Shape">

                    </path>
                </g>
            </g>
        </svg>


    </div>

</div>

<!-- Kalkulyator modal oynasi -->
<div class="modal fade" id="calculatorModal" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calculatorModalLabel">Калькулятор</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="calculator modal-content">
                    <input type="text" id="calc-display" class="calc-display modal-content" readonly>

                    <div class="calc-buttons">
                        <button class="btn-c btn-secondary" onclick="calcInput('7')">7</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('8')">8</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('9')">9</button>
                        <button class="btn-c btn-warning" onclick="calcInput('/')">/</button>

                        <button class="btn-c btn-secondary" onclick="calcInput('4')">4</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('5')">5</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('6')">6</button>
                        <button class="btn-c btn-warning" onclick="calcInput('*')">×</button>

                        <button class="btn-c btn-secondary" onclick="calcInput('1')">1</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('2')">2</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('3')">3</button>
                        <button class="btn-c btn-warning" onclick="calcInput('-')">−</button>

                        <button class="btn-c btn-secondary" onclick="calcInput('0')">0</button>
                        <button class="btn-c btn-secondary" onclick="calcInput('.')">.</button>
                        <button class="btn-c btn-success" onclick="calculateResult()">=</button>
                        <button class="btn-c btn-warning" onclick="calcInput('+')">+</button>

                        <button class="btn-c btn-danger col-12" onclick="clearCalc()">C</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kalkulyator dizayni -->
<style>
    .calculator {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        background-color: #f9f9f9; /* Yengil fon rangi */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Yengil soya effekti */
    }

    .calc-display {
        width: 100%;
        height: 60px;
        font-size: 28px; /* Katta va o'qilishi oson matn */
        text-align: right;
        padding: 10px 15px;
        border: 2px solid #ddd; /* Yengil chegara rangi */
        border-radius: 8px;
        background-color: #fff;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); /* Ichki soyali effekt */
    }

    .calc-buttons {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        width: 100%;
    }

    .btn-c {
        font-size: 18px;
        padding: 15px;
        border-radius: 12px; /* Yumaloq burchak */
        background-color: #007bff; /* Asosiy tugma rangi */
        color: #fff;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3); /* Yengil soya */
        transition: all 0.3s ease; /* Silliq o‘tish effekti */
        cursor: pointer;
    }

    .btn-c:hover {
        background-color: #0056b3; /* Hover effekti uchun quyuqroq rang */
        box-shadow: 0 6px 8px rgba(0, 86, 179, 0.4); /* Hoverda kuchliroq soya */
    }

    .btn-c:active {
        transform: scale(0.95); /* Tugma bosilganda kichikroq bo'ladi */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Kamroq soya */
    }

    .btn-c.operator {
        background-color: #ff7f50; /* Operator tugmalari uchun boshqa rang */
    }

    .btn-c.operator:hover {
        background-color: #ff6347; /* Hoverda operator tugmalari uchun quyuqroq rang */
    }

    .btn-c.clear {
        background-color: #dc3545; /* Tozalash tugmasi uchun qizil rang */
    }

    .btn-c.clear:hover {
        background-color: #c82333; /* Hoverda quyuqroq qizil rang */
    }

    .btn-c.equal {
        background-color: #28a745; /* Hisoblash tugmasi uchun yashil rang */
        grid-column: span 2; /* Natija tugmasi ikkita ustunni egallaydi */
    }

    .btn-c.equal:hover {
        background-color: #218838; /* Hoverda quyuqroq yashil rang */
    }
</style>


<!-- Kalkulyator JS -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener("keydown", function (event) {
            const key = event.key;

            if (!isNaN(key) || key === ".") {
                calcInput(key);
            } else if (["+", "-", "*", "/"].includes(key)) {
                calcInput(key);
            } else if (key === "Enter") {
                calculateResult();
            } else if (key === "Backspace") {
                deleteLast();
            } else if (key === "Escape") {
                clearCalc();
            }
        });
    });

    /**
     * Kiritmani ekranga qo'shish
     * @param {string} value
     */
    function calcInput(value) {
        const display = document.getElementById("calc-display");
        display.value += value;
    }

    /**
     * Natijani hisoblash va pul ko'rinishida ko'rsatish
     */
    function calculateResult() {
        const display = document.getElementById("calc-display");
        try {
            // Hisob-kitobni bajarish
            const result = eval(display.value);

            // Natijani ikki xonali kasr bilan formatlash
            const formattedResult = formatCurrency(result);

            // Ekranda natijani ko'rsatish
            display.value = formattedResult;
        } catch (e) {
            display.value = "Xato"; // Xato kiritmalar uchun
        }
    }

    /**
     * Kalkulyator ekranini tozalash
     */
    function clearCalc() {
        const display = document.getElementById("calc-display");
        display.value = "";
    }

    /**
     * Oxirgi kiritmani o'chirish
     */
    function deleteLast() {
        const display = document.getElementById("calc-display");
        display.value = display.value.slice(0, -1);
    }

    /**
     * Raqamni pul formatida ko'rsatish
     * @param {number} number
     * @returns {string} Pul shaklidagi formatlangan string
     */
    function formatCurrency(number) {
        return new Intl.NumberFormat("en-US", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }).format(number);
    }
</script>

