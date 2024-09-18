// fireworks.js
const canvas = document.getElementById('fireworksCanvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const fireworks = [];
const particles = [];

class Firework {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.hue = Math.random() * 360;
        this.particles = [];

        for (let i = 0; i < 100; i++) {
            this.particles.push(new Particle(this.x, this.y, this.hue));
        }
    }

    update() {
        for (let i = this.particles.length - 1; i >= 0; i--) {
            const particle = this.particles[i];
            particle.update();

            if (particle.alpha <= 0) {
                this.particles.splice(i, 1);
            }
        }

        if (this.particles.length === 0) {
            return true;
        }

        return false;
    }

    draw() {
        this.particles.forEach(particle => particle.draw());
    }
}

class Particle {
    constructor(x, y, hue) {
        this.x = x;
        this.y = y;
        this.hue = hue;
        this.speed = Math.random() * 5 + 1;
        this.angle = Math.random() * 2 * Math.PI;
        this.friction = 0.95;
        this.gravity = 0.5;
        this.alpha = 1;
        this.decay = Math.random() * 0.015 + 0.015;
    }

    update() {
        this.speed *= this.friction;
        this.x += Math.cos(this.angle) * this.speed;
        this.y += Math.sin(this.angle) * this.speed + this.gravity;
        this.alpha -= this.decay;
    }

    draw() {
        ctx.save();
        ctx.globalCompositeOperation = 'lighter';
        ctx.globalAlpha = this.alpha;
        ctx.fillStyle = `hsl(${this.hue}, 100%, 50%)`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, 2, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
    }
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = fireworks.length - 1; i >= 0; i--) {
        const firework = fireworks[i];
        if (firework.update()) {
            fireworks.splice(i, 1);
        } else {
            firework.draw();
        }
    }

    requestAnimationFrame(animate);
}

canvas.addEventListener('click', (e) => {
    fireworks.push(new Firework(e.clientX, e.clientY));
});

animate();
