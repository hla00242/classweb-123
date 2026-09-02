/**
 * Web Speech API Audio Essay Narrator
 * Real-time voice narration of academic papers with sentence highlighting & speed control.
 */

class AudioNarrator {
    constructor() {
        this.synth = window.speechSynthesis;
        this.paragraphs = [];
        this.currentIndex = 0;
        this.isPlaying = false;
        this.isPaused = false;
        this.rate = 1.0;
        this.utterance = null;

        this.init();
    }

    init() {
        if (!('speechSynthesis' in window)) {
            console.warn('Speech synthesis not supported in this browser.');
            return;
        }

        this.findParagraphs();
        if (this.paragraphs.length === 0) return;

        this.renderPlayerUI();
        this.bindEvents();
    }

    findParagraphs() {
        const container = document.getElementById('paper-content') || document.querySelector('.paper-content');
        if (!container) return;
        this.paragraphs = Array.from(container.querySelectorAll('p, blockquote'));
    }

    renderPlayerUI() {
        let player = document.getElementById('audio-narrator-bar');
        if (player) player.remove();

        player = document.createElement('aside');
        player.id = 'audio-narrator-bar';
        player.className = 'audio-narrator-bar';
        player.setAttribute('aria-label', 'Audio Essay Narration Controls');
        player.innerHTML = `
            <div class="narrator-content">
                <div class="narrator-info">
                    <div class="narrator-icon-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="narrator-sound-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg>
                    </div>
                    <div>
                        <span class="narrator-title">Audio Narration</span>
                        <span id="narrator-status" class="narrator-status">Listen to this essay</span>
                    </div>
                </div>

                <div class="narrator-controls">
                    <button id="narrator-play-btn" class="narrator-btn narrator-btn-play" title="Play Narration" aria-label="Play Narration">
                        <svg id="narrator-play-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                        <svg id="narrator-pause-icon" style="display: none;" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"></path></svg>
                    </button>

                    <button id="narrator-stop-btn" class="narrator-btn" title="Stop Narration" aria-label="Stop Narration" disabled>
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h12v12H6z"></path></svg>
                    </button>

                    <div class="narrator-speed-group">
                        <button class="narrator-speed-btn active" data-speed="1">1.0x</button>
                        <button class="narrator-speed-btn" data-speed="1.25">1.25x</button>
                        <button class="narrator-speed-btn" data-speed="1.5">1.5x</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(player);
    }

    bindEvents() {
        const playBtn = document.getElementById('narrator-play-btn');
        const stopBtn = document.getElementById('narrator-stop-btn');
        const speedBtns = document.querySelectorAll('.narrator-speed-btn');

        if (playBtn) {
            playBtn.addEventListener('click', () => {
                if (!this.isPlaying) {
                    this.start();
                } else if (this.isPaused) {
                    this.resume();
                } else {
                    this.pause();
                }
            });
        }

        if (stopBtn) {
            stopBtn.addEventListener('click', () => this.stop());
        }

        speedBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                speedBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                this.rate = parseFloat(btn.getAttribute('data-speed')) || 1.0;
                if (this.isPlaying && !this.isPaused) {
                    // Restart current paragraph with new rate
                    this.synth.cancel();
                    this.speakCurrent();
                }
            });
        });

        // Cancel speech when navigating away
        window.addEventListener('beforeunload', () => {
            if (this.synth) this.synth.cancel();
        });
    }

    start() {
        this.findParagraphs();
        if (this.paragraphs.length === 0) return;

        this.isPlaying = true;
        this.isPaused = false;
        this.currentIndex = 0;
        this.updateControlsUI();
        this.speakCurrent();
    }

    speakCurrent() {
        if (this.currentIndex >= this.paragraphs.length) {
            this.stop();
            return;
        }

        const el = this.paragraphs[this.currentIndex];
        const text = el.innerText || el.textContent;

        // Clear existing highlights
        this.paragraphs.forEach(p => p.classList.remove('narrating-active'));
        el.classList.add('narrating-active');

        // Smoothly scroll active paragraph into view
        el.scrollIntoView({ behavior: 'smooth', block: 'center' });

        this.utterance = new SpeechSynthesisUtterance(text);
        this.utterance.rate = this.rate;

        // Select a natural English voice if available
        const voices = this.synth.getVoices();
        const preferredVoice = voices.find(v => v.lang.startsWith('en') && (v.name.includes('Natural') || v.name.includes('Google') || v.name.includes('Samantha') || v.name.includes('David')));
        if (preferredVoice) {
            this.utterance.voice = preferredVoice;
        }

        const statusEl = document.getElementById('narrator-status');
        if (statusEl) {
            statusEl.textContent = `Reading section ${this.currentIndex + 1} of ${this.paragraphs.length}`;
        }

        this.utterance.onend = () => {
            if (this.isPlaying && !this.isPaused) {
                this.currentIndex++;
                this.speakCurrent();
            }
        };

        this.utterance.onerror = (e) => {
            console.error('Speech synthesis error:', e);
            this.stop();
        };

        this.synth.speak(this.utterance);
    }

    pause() {
        this.synth.pause();
        this.isPaused = true;
        this.updateControlsUI();
        const statusEl = document.getElementById('narrator-status');
        if (statusEl) statusEl.textContent = 'Narration paused';
    }

    resume() {
        this.synth.resume();
        this.isPaused = false;
        this.updateControlsUI();
        const statusEl = document.getElementById('narrator-status');
        if (statusEl) statusEl.textContent = `Reading section ${this.currentIndex + 1} of ${this.paragraphs.length}`;
    }

    stop() {
        this.synth.cancel();
        this.isPlaying = false;
        this.isPaused = false;
        this.currentIndex = 0;
        this.paragraphs.forEach(p => p.classList.remove('narrating-active'));
        this.updateControlsUI();
        const statusEl = document.getElementById('narrator-status');
        if (statusEl) statusEl.textContent = 'Listen to this essay';
    }

    updateControlsUI() {
        const playIcon = document.getElementById('narrator-play-icon');
        const pauseIcon = document.getElementById('narrator-pause-icon');
        const stopBtn = document.getElementById('narrator-stop-btn');

        if (!playIcon || !pauseIcon || !stopBtn) return;

        if (this.isPlaying && !this.isPaused) {
            playIcon.style.display = 'none';
            pauseIcon.style.display = 'block';
            stopBtn.disabled = false;
        } else {
            playIcon.style.display = 'block';
            pauseIcon.style.display = 'none';
            stopBtn.disabled = !this.isPlaying;
        }
    }
}

// Initialize when ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => { window.narrator = new AudioNarrator(); });
} else {
    window.narrator = new AudioNarrator();
}
