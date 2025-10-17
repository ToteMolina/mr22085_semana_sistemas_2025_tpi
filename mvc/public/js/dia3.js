(function() {
    'use strict';

    // Configuración optimizada
    const config = {
        dropCount: 120, // Reducido para mejor rendimiento
        dropSpeed: { min: 4, max: 9 },
        dropLength: { min: 15, max: 35 },
        dropWidth: 1.5,
        dropAngle: -8 // Ángulo más pronunciado para lluvia intensa
    };

    // Setup Canvas
    const canvas = document.getElementById('rainCanvas');
    if (!canvas) {
        console.error('Canvas element not found');
        return;
    }

    const ctx = canvas.getContext('2d', { 
        alpha: true,
        desynchronized: true // Mejora rendimiento en algunos navegadores
    });
    
    let drops = [];
    let animationId = null;

    // Ajustar canvas al tamaño de ventana
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initDrops();
    }

    // Inicializar gotas
    function initDrops() {
        drops = [];
        for (let i = 0; i < config.dropCount; i++) {
            drops.push(createDrop());
        }
    }

    // Crear una gota individual
    function createDrop() {
        return {
            x: Math.random() * canvas.width,
            y: Math.random() * -canvas.height,
            length: Math.random() * (config.dropLength.max - config.dropLength.min) + config.dropLength.min,
            speed: Math.random() * (config.dropSpeed.max - config.dropSpeed.min) + config.dropSpeed.min,
            opacity: Math.random() * 0.4 + 0.3
        };
    }

    // Resetear gota cuando sale de la pantalla
    function resetDrop(drop) {
        drop.x = Math.random() * canvas.width;
        drop.y = -20;
        drop.length = Math.random() * (config.dropLength.max - config.dropLength.min) + config.dropLength.min;
        drop.speed = Math.random() * (config.dropSpeed.max - config.dropSpeed.min) + config.dropSpeed.min;
    }

    // Animar lluvia
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        const angleRad = config.dropAngle * Math.PI / 180;

        drops.forEach(drop => {
            const dx = Math.sin(angleRad) * drop.length;
            const dy = Math.cos(angleRad) * drop.length;

            // Dibujar gota
            ctx.beginPath();
            ctx.strokeStyle = `rgba(171, 194, 233, ${drop.opacity})`;
            ctx.lineWidth = config.dropWidth;
            ctx.moveTo(drop.x, drop.y);
            ctx.lineTo(drop.x + dx, drop.y + dy);
            ctx.stroke();

            // Actualizar posición
            drop.y += drop.speed;
            drop.x += Math.sin(angleRad) * drop.speed;

            // Resetear si sale de pantalla
            if (drop.y > canvas.height + 50) {
                resetDrop(drop);
            }
        });

        animationId = requestAnimationFrame(animate);
    }

    // Lightning effect
    let lightningTimeout = null;
    
    function triggerLightning() {
        document.body.classList.add('lightning');
        
        if (lightningTimeout) {
            clearTimeout(lightningTimeout);
        }
        
        lightningTimeout = setTimeout(() => {
            document.body.classList.remove('lightning');
        }, 400);
    }

    // Event listeners optimizados
    let isMouseDown = false;

    document.body.addEventListener('mousedown', () => {
        if (!isMouseDown) {
            isMouseDown = true;
            triggerLightning();
        }
    }, { passive: true });

    document.body.addEventListener('mouseup', () => {
        isMouseDown = false;
    }, { passive: true });

    // Throttle para resize
    let resizeTimeout = null;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(resizeCanvas, 150);
    });

    // Pausar cuando tab no está visible (ahorro de batería)
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            if (animationId) {
                cancelAnimationFrame(animationId);
                animationId = null;
            }
        } else {
            if (!animationId) {
                animate();
            }
        }
    });

    // Cleanup
    window.addEventListener('beforeunload', () => {
        if (animationId) {
            cancelAnimationFrame(animationId);
        }
        drops = [];
    });

    // Inicializar
    resizeCanvas();
    animate();

    // Lightning automático cada 5-15 segundos
    function randomLightning() {
        const delay = Math.random() * 10000 + 5000; // 5-15 segundos
        setTimeout(() => {
            if (!document.hidden) {
                triggerLightning();
            }
            randomLightning();
        }, delay);
    }
    
    randomLightning();

})();