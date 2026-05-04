@extends('layout.users.app')
@section('title')
    Daily Spin
@endsection
@section('css')
    <style class="css">
       
        .container {
            background: rgba(10, 10, 20, 0.6);
            backdrop-filter: blur(4px);
            border-radius: 70px;
            padding: 20px 28px 35px 28px;
            box-shadow: 0 20px 35px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
            transition: all 0.2s;
        }

       
        #wheel-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #wheel-container {
            position: relative;
            transition: all 0.2s ease;
        }

        canvas {
            display: block;
            border-radius: 50%;
            box-shadow: 0 0 0 8px rgba(30,30,50,0.9), 0 20px 35px rgba(0,0,0,0.4), 0 0 0 3px #ffd966 inset, 0 0 0 6px rgba(0,0,0,0.2);
            width: 100%;
            /* height: 100%; */
            max-width:500px;
            
        }

        .pointer-wrapper {
            position: absolute;
            top: -18px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        }

        #pointer {
            width: 0;
            height: 0;
            border-left: 22px solid transparent;
            border-right: 22px solid transparent;
            border-top: 42px solid var(--primary);
            position: relative;
        }

        #pointer::after {
            content: "▼";
            position: absolute;
            top: -52px;
            left: -12px;
            font-size: 26px;
            color: var(--primary-light);
            text-shadow: 0 2px 3px black;
            opacity: 0.8;
        }

        .controls {
           
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            align-items: center;
        }

        .button {
            padding: 14px 38px;
            font-size: 1.25rem;
            font-weight: bold;
            border: none;
            border-radius: 60px;
            background: radial-gradient(circle at 30% 10%, var(--primary-darker), var(--primary-light));
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }

        .button:hover {
            transform: scale(1.02);
           
        }

        .button:disabled {
            opacity: 0.8;
            cursor: not-allowed;
        }

        #result {
           
            background: var(--primary-dark);
            backdrop-filter: blur(8px);
            padding: 12px 24px;
            font-size: 1.7rem;
            font-weight: bold;
            text-align: center;
            min-width: 240px;
            color:var(--primary-text);
            border-top:5px solid var(--primary-light);
            
            /* font-family: monospace; */
            /* letter-spacing: 1px; */
            transition: all 0.2s;
        }
       

       
        @media (max-width: 550px) {
           
            button { padding: 10px 28px; font-size: 1rem; }
            #result { font-size: 1.2rem; }
        }
    </style>
@endsection
@section('main')
<section class="populate">
<div class="child">
    
</div>
</section>
    <section class="w-full column g-20">
     <input type="hidden" name="_token" value="{{ @csrf_token() }}">
  <div class="column m-bottom-20 g-5">
      <strong class="desc">Daily Spin</strong>
    <span>Spin & win Daily rewards</span>
  </div>
    <div id="wheel-wrapper">
        <div id="wheel-container">
            <canvas id="wheelCanvas"></canvas>
        </div>
        <div class="pointer-wrapper">
            <div id="pointer"></div>
        </div>
    </div>
    <div class="column w-full ctrls g-10">
    
        <span class="{{ !$last_spin->isToday() ? 'display-none' : '' }} c-red prompt text-align-center">You have already spinned today, Kindly wait till tomorrow before spinning again</span>
   
    <div class="controls">
        <button class="button no-select {{ $last_spin->isToday() ? 'disabled' : '' }}" id="spinBtn">🎡 SPIN NOW 🎡</button>
    </div>
     
    <div class="{{ $last_spin->isToday() ? 'display-none' : '' }}" id="result">⚡ READY ⚡</div>
  
   
    </div>

    </section>
    
@endsection
@section('js')
    <script class="js">
          (function(){
        const wheelConfig = {
            containerWidth: "min(500px, 85vw)",
            containerHeight: "min(500px, 85vw)",
            maxContainerWidth: "500px",
            maxContainerHeight: "500px",
            
            sectors: [
                { label: "{{ $currency.number_format(25) }}",   color: "#FF5733" },
                { label: "{{ $currency.number_format(3) }}",    color: "red" },
                { label: "{{ $currency.number_format(75) }}",  color: "#3357FF" },
                { label: "{{ $currency.number_format(10) }}",    color: "#F333FF" },
                { label: "{{ $currency.number_format(250) }}",  color: "#FFBD33" },
                { label: "{{ $currency.number_format(7) }}",    color: "black" },
                { label: "{{ $currency.number_format(50) }}",   color: "#8D33FF" },
                { label: "{{ $currency.number_format(125) }}",   color: "#FF3385" }
            ],
            
            textColor: "#FFFFFF",
            fontFamily: "'SF Pro', 'Segoe UI', 'Poppins', sans-serif",
            fontSizeScale: 0.075,
            fontWeight: "bold",
            enableStroke: true,
            strokeColor: "#00000055",
            
            minRotations: 5,
            spinDurationMs: 3000, 
        };

        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
        const spinBtn = document.getElementById('spinBtn');
        const resultDiv = document.getElementById('result');
        const wheelContainer = document.getElementById('wheel-container');
        
        let sectors = [...wheelConfig.sectors];
        let currentRotationDeg = 0;   
        let isSpinning = false;
        let animationFrameId = null;
        
        let canvasSize = 500;
        let radius = 250;
        let arcAngle = 0;

        function applyContainerDimensions() {
            wheelContainer.style.width = wheelConfig.containerWidth;
            wheelContainer.style.height = wheelConfig.containerHeight || wheelConfig.containerWidth;
            if (wheelConfig.maxContainerWidth) wheelContainer.style.maxWidth = wheelConfig.maxContainerWidth;
            if (wheelConfig.maxContainerHeight) wheelContainer.style.maxHeight = wheelConfig.maxContainerHeight;
            
            canvas.style.width = '100%';
            canvas.style.height = '100%';
            updateCanvasResolution();
        }
        
        function updateCanvasResolution() {
            const containerRect = wheelContainer.getBoundingClientRect();
            let targetSize = Math.min(containerRect.width, containerRect.height);
            if (targetSize < 20) targetSize = 400;
            
            canvas.width = targetSize;
            canvas.height = targetSize;
            canvasSize = targetSize;
            radius = canvasSize / 2;
            arcAngle = (Math.PI * 2) / sectors.length;
            
            drawFullWheel();
        }
        
        function drawFullWheel() {
            if (!ctx) return;
            const n = sectors.length;
            const centerX = radius;
            const centerY = radius;
            const startAngleOffset = -Math.PI / 2; // Start at top
            
            ctx.clearRect(0, 0, canvasSize, canvasSize);
            
            for (let i = 0; i < n; i++) {
                const sector = sectors[i];
                const start = startAngleOffset + i * arcAngle;
                const end = start + arcAngle;
                
                ctx.beginPath();
                ctx.moveTo(centerX, centerY);
                ctx.arc(centerX, centerY, radius, start, end);
                ctx.closePath();
                ctx.fillStyle = sector.color;
                ctx.fill();
                
                if (wheelConfig.enableStroke) {
                    ctx.strokeStyle = wheelConfig.strokeColor;
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }
                
                ctx.save();
                ctx.translate(centerX, centerY);
                ctx.rotate(start + arcAngle / 2);
                ctx.textAlign = "center";
                ctx.textBaseline = "middle";
                ctx.fillStyle = wheelConfig.textColor;
                const fontSize = Math.max(12, radius * wheelConfig.fontSizeScale);
                ctx.font = `${wheelConfig.fontWeight} ${fontSize}px ${wheelConfig.fontFamily}`;
                ctx.fillText(sector.label, radius * 0.72, 0);
                ctx.restore();
            }
            
            // Center Decoration
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius * 0.08, 0, 2 * Math.PI);
            ctx.fillStyle = "#FFD966";
            ctx.fill();
        }
        
        function setWheelRotation(degrees) {
            canvas.style.transform = `rotate(${degrees}deg)`;
        }
        
        function spinWheel() {
            if (isSpinning) return;
            
            isSpinning = true;
            spinBtn.disabled = true;
            resultDiv.innerHTML = "🌀 SPINNING... 🌀";
            
            const totalSectors = sectors.length;
            const randomSectorIndex = Math.floor(Math.random() * totalSectors);
            const targetPrize = sectors[randomSectorIndex].label;
            
            const sectorAngleDeg = 360 / totalSectors;
            
            // 1. Calculate how far the center of the target slice is from the top (0°)
            // in the wheel's internal coordinates.
            const sliceCenterRelToTop = (randomSectorIndex * sectorAngleDeg) + (sectorAngleDeg / 2);
            
            // 2. To bring that slice to the pointer, we rotate the wheel CLOCKWISE
            // by (360 - distance). 
            const rotationToTarget = 360 - sliceCenterRelToTop;
            
            // 3. Add full spins for excitement
            const fullSpins = wheelConfig.minRotations * 360;
            
            // 4. Calculate total delta from current position
            const startRotation = currentRotationDeg;
            const currentNormalized = startRotation % 360;
            const totalDelta = fullSpins + (rotationToTarget - currentNormalized + 360) % 360;
            
            const targetRotation = startRotation + totalDelta;
            const duration = wheelConfig.spinDurationMs;
            const startTime = performance.now();
            
            async function animateSpin(now) {
                const elapsed = now - startTime;
                let t = Math.min(1, elapsed / duration);
                
                // Cubic ease-out
                const easeOut = 1 - Math.pow(1 - t, 3);
                const current = startRotation + (totalDelta * easeOut);
                
                setWheelRotation(current);
                
                if (t < 1) {
                    animationFrameId = requestAnimationFrame(animateSpin);
                } else {
                    try{
                        currentRotationDeg = targetRotation;
                    setWheelRotation(targetRotation);
                    resultDiv.innerHTML = `✨ YOU GOT: ${targetPrize} ✨`;
                    isSpinning = false;
                    spinBtn.disabled = false;
                    let form= new FormData();
                    form.append('_token','{{ @csrf_token() }}');
                    form.append('amount',targetPrize);
                    
                    document.querySelector('.populate .child').innerHTML=` <strong class="font-3">🎁✨</strong>
    <strong class="font-1-5">Congratulations</strong>
    <strong class="font-2">${targetPrize}</strong>
    <span style="border-bottom:1px dashed var(--primary-07);padding-bottom:10px;width:100%;display:flex;">Your daily spin reward have been added to your Main Wallet</span>
    <span class="font-size-07 opacity-07">💚 Powered by {{ config('app.name') }} | Daily Spin</span>
    <button onclick="this.closest('.populate').classList.remove('active')" style="margin-top:0;" class="post">Got It</button>`;
                    document.querySelector('.populate').classList.add('active');
                    spinBtn.classList.add('disabled');
                    resultDiv.classList.add('display-none');
                    document.querySelector('.prompt').classList.remove('display-none');
    let response=await fetch('{{ url('users/post/daily/spin/process') }}',{
                        method : 'POST',
                        body : form
                     });
                     if(response.ok){
                    //    let data=await response.text();
                    //    alert(data)
                     }
                    }catch(error){
                        alert(error)
                    }
                }
            }
            
            animationFrameId = requestAnimationFrame(animateSpin);
        }
        
        function init() {
            applyContainerDimensions();
            window.addEventListener('resize', updateCanvasResolution);
            spinBtn.addEventListener('click', spinWheel);
        }
        
        init();
    })();
    </script>
@endsection