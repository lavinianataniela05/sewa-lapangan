@extends('layouts.app')

@section('title', 'Scoreboard')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Scoreboard</h1>
    
    <div class="row">
        <!-- Scoreboard Display -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-body p-0">
                    <div class="scoreboard-display bg-dark text-white p-4 rounded-top">
                        <div class="row align-items-center">
                            <!-- Team A -->
                            <div class="col-4 text-center">
                                <h5 class="mb-2">TEAM A</h5>
                                <h1 id="scoreA" class="display-1 fw-bold">0</h1>
                                <div class="mt-3">
                                    <button class="btn btn-outline-light btn-sm" onclick="changeTeamName('A')">
                                        <i class="bi bi-pencil"></i> Ganti Nama
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Timer & Info -->
                            <div class="col-4 text-center">
                                <h5 id="timer" class="display-3 mb-3">10:00</h5>
                                <div class="btn-group">
                                    <button class="btn btn-success" onclick="startTimer()">
                                        <i class="bi bi-play-fill"></i> Start
                                    </button>
                                    <button class="btn btn-warning" onclick="pauseTimer()">
                                        <i class="bi bi-pause-fill"></i> Pause
                                    </button>
                                    <button class="btn btn-danger" onclick="resetTimer()">
                                        <i class="bi bi-stop-fill"></i> Reset
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <small>PERIODE: <span id="period">1</span>/4</small>
                                </div>
                            </div>
                            
                            <!-- Team B -->
                            <div class="col-4 text-center">
                                <h5 class="mb-2">TEAM B</h5>
                                <h1 id="scoreB" class="display-1 fw-bold">0</h1>
                                <div class="mt-3">
                                    <button class="btn btn-outline-light btn-sm" onclick="changeTeamName('B')">
                                        <i class="bi bi-pencil"></i> Ganti Nama
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Controls -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Team A Controls</h6>
                                <div class="btn-group w-100 mb-3">
                                    <button class="btn btn-primary" onclick="updateScore('A', 1)">+1</button>
                                    <button class="btn btn-primary" onclick="updateScore('A', 2)">+2</button>
                                    <button class="btn btn-primary" onclick="updateScore('A', 3)">+3</button>
                                    <button class="btn btn-outline-danger" onclick="updateScore('A', -1)">-1</button>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fouls</label>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-outline-warning" onclick="updateFouls('A', -1)">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <span id="foulsA" class="mx-3 fs-4">0</span>
                                        <button class="btn btn-sm btn-outline-warning" onclick="updateFouls('A', 1)">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h6>Team B Controls</h6>
                                <div class="btn-group w-100 mb-3">
                                    <button class="btn btn-danger" onclick="updateScore('B', 1)">+1</button>
                                    <button class="btn btn-danger" onclick="updateScore('B', 2)">+2</button>
                                    <button class="btn btn-danger" onclick="updateScore('B', 3)">+3</button>
                                    <button class="btn btn-outline-danger" onclick="updateScore('B', -1)">-1</button>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fouls</label>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-outline-warning" onclick="updateFouls('B', -1)">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <span id="foulsB" class="mx-3 fs-4">0</span>
                                        <button class="btn btn-sm btn-outline-warning" onclick="updateFouls('B', 1)">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Player & Settings -->
        <div class="col-lg-4">
            <!-- Timer Settings -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h6>Timer Settings</h6>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label small">Minutes per period</label>
                            <input type="number" class="form-control" id="minutesPerPeriod" value="10" min="1" max="60">
                        </div>
                        <div class="col-6">
                            <label class="form-label small">Total Periods</label>
                            <input type="number" class="form-control" id="totalPeriods" value="4" min="1" max="10">
                        </div>
                    </div>
                    <button class="btn btn-outline-primary w-100 mt-3" onclick="applyTimerSettings()">
                        Apply Settings
                    </button>
                </div>
            </div>
            
            <!-- Player List -->
            <div class="card shadow">
                <div class="card-body">
                    <h6>Player List</h6>
                    <div id="playerList">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Budi Santoso</span>
                            <select class="form-select form-select-sm w-auto" onchange="assignTeam(this, 'player1')">
                                <option value="">Select Team</option>
                                <option value="A">Team A</option>
                                <option value="B">Team B</option>
                                <option value="bench">Bench</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Andi Wijaya</span>
                            <select class="form-select form-select-sm w-auto" onchange="assignTeam(this, 'player2')">
                                <option value="">Select Team</option>
                                <option value="A">Team A</option>
                                <option value="B">Team B</option>
                                <option value="bench">Bench</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="newPlayer" placeholder="Add player name">
                            <button class="btn btn-primary" onclick="addPlayer()">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Reset Button -->
                    <button class="btn btn-outline-danger w-100 mt-4" onclick="resetGame()">
                        <i class="bi bi-arrow-clockwise"></i> Reset Game
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let scoreA = 0;
    let scoreB = 0;
    let foulsA = 0;
    let foulsB = 0;
    let timer = 600; // 10 minutes in seconds
    let timerInterval;
    let isTimerRunning = false;
    let period = 1;
    const totalPeriods = 4;

    function updateScore(team, points) {
        if (team === 'A') {
            scoreA = Math.max(0, scoreA + points);
            document.getElementById('scoreA').textContent = scoreA;
        } else {
            scoreB = Math.max(0, scoreB + points);
            document.getElementById('scoreB').textContent = scoreB;
        }
    }

    function updateFouls(team, change) {
        if (team === 'A') {
            foulsA = Math.max(0, foulsA + change);
            document.getElementById('foulsA').textContent = foulsA;
        } else {
            foulsB = Math.max(0, foulsB + change);
            document.getElementById('foulsB').textContent = foulsB;
        }
    }

    function changeTeamName(team) {
        const newName = prompt(`Enter new name for Team ${team}:`, 
                              team === 'A' ? 'TEAM A' : 'TEAM B');
        if (newName) {
            document.querySelector(team === 'A' ? '.col-4:first-child h5' : '.col-4:last-child h5')
                    .textContent = newName.toUpperCase();
        }
    }

    function startTimer() {
        if (!isTimerRunning) {
            isTimerRunning = true;
            timerInterval = setInterval(() => {
                if (timer > 0) {
                    timer--;
                    updateTimerDisplay();
                } else {
                    clearInterval(timerInterval);
                    if (period < totalPeriods) {
                        period++;
                        document.getElementById('period').textContent = period;
                        timer = 600; // Reset to 10 minutes
                        updateTimerDisplay();
                        alert(`Period ${period} started!`);
                        startTimer();
                    } else {
                        alert('Game Over!');
                        isTimerRunning = false;
                    }
                }
            }, 1000);
        }
    }

    function pauseTimer() {
        clearInterval(timerInterval);
        isTimerRunning = false;
    }

    function resetTimer() {
        clearInterval(timerInterval);
        isTimerRunning = false;
        timer = 600;
        period = 1;
        document.getElementById('period').textContent = period;
        updateTimerDisplay();
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timer / 60);
        const seconds = timer % 60;
        document.getElementById('timer').textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

    function applyTimerSettings() {
        const minutes = parseInt(document.getElementById('minutesPerPeriod').value);
        const periods = parseInt(document.getElementById('totalPeriods').value);
        timer = minutes * 60;
        updateTimerDisplay();
        document.getElementById('totalPeriods').value = periods;
        alert(`Settings applied: ${minutes} minutes per period, ${periods} periods total`);
    }

    function addPlayer() {
        const playerName = document.getElementById('newPlayer').value.trim();
        if (playerName) {
            const playerId = 'player' + Date.now();
            const playerElement = document.createElement('div');
            playerElement.className = 'd-flex justify-content-between align-items-center mb-2';
            playerElement.innerHTML = `
                <span>${playerName}</span>
                <select class="form-select form-select-sm w-auto" onchange="assignTeam(this, '${playerId}')">
                    <option value="">Select Team</option>
                    <option value="A">Team A</option>
                    <option value="B">Team B</option>
                    <option value="bench">Bench</option>
                </select>
            `;
            document.getElementById('playerList').appendChild(playerElement);
            document.getElementById('newPlayer').value = '';
        }
    }

    function assignTeam(selectElement, playerId) {
        const team = selectElement.value;
        alert(`Player assigned to ${team === 'A' ? 'Team A' : team === 'B' ? 'Team B' : 'Bench'}`);
    }

    function resetGame() {
        if (confirm('Are you sure you want to reset the game?')) {
            scoreA = 0;
            scoreB = 0;
            foulsA = 0;
            foulsB = 0;
            document.getElementById('scoreA').textContent = '0';
            document.getElementById('scoreB').textContent = '0';
            document.getElementById('foulsA').textContent = '0';
            document.getElementById('foulsB').textContent = '0';
            resetTimer();
        }
    }

    // Initialize timer display
    updateTimerDisplay();
</script>
@endpush
@endsection