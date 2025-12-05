@extends('layouts.app')

@section('title', 'Shuffle Player')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Shuffle Player</h1>
    
    <div class="row">
        <!-- Input Section -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Input Players</h5>
                    
                    <div class="mb-4">
                        <label class="form-label">Add Players (one per line or comma separated)</label>
                        <textarea class="form-control" id="playerInput" rows="8" placeholder="Enter player names:
Budi Santoso
Andi Wijaya
Citra Dewi
Dedi Pratama
Eka Putri
Fajar Nugroho
Gita Maya
Hendra Saputra"></textarea>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Number of Teams</label>
                            <input type="number" class="form-control" id="numTeams" min="2" max="8" value="2">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Players per Team</label>
                            <input type="number" class="form-control" id="playersPerTeam" min="1" max="12" value="4">
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" onclick="shufflePlayers()">
                            <i class="bi bi-shuffle"></i> Shuffle Players
                        </button>
                        <button class="btn btn-outline-secondary" onclick="addRandomPlayers()">
                            <i class="bi bi-person-plus"></i> Add Sample Players
                        </button>
                        <button class="btn btn-outline-danger" onclick="clearPlayers()">
                            <i class="bi bi-trash"></i> Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="col-lg-6">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Team Results</h5>
                    
                    <!-- Team Display -->
                    <div id="teamResults" class="mb-4">
                        <p class="text-muted text-center">Click "Shuffle Players" to generate teams</p>
                    </div>
                    
                    <!-- Player List -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Player List</h6>
                        </div>
                        <div class="card-body">
                            <div id="playerList" class="mb-3">
                                <!-- Player list will be generated here -->
                            </div>
                            <div class="text-end">
                                <small class="text-muted">
                                    Total Players: <span id="totalPlayers">0</span>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Options -->
                    <div class="mt-4">
                        <h6>Options</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="balanceTeams" checked>
                            <label class="form-check-label" for="balanceTeams">
                                Balance teams based on skill level
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="includeCaptains">
                            <label class="form-check-label" for="includeCaptains">
                                Designate team captains
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showPositions">
                            <label class="form-check-label" for="showPositions">
                                Show player positions
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Team Display Section -->
    <div class="row mt-4" id="teamsDisplay">
        <!-- Teams will be displayed here -->
    </div>
</div>

@push('styles')
<style>
    .team-card {
        border-left: 4px solid var(--bs-primary);
    }
    
    .team-card.team-2 {
        border-left-color: var(--bs-danger);
    }
    
    .team-card.team-3 {
        border-left-color: var(--bs-success);
    }
    
    .team-card.team-4 {
        border-left-color: var(--bs-warning);
    }
    
    .player-item {
        padding: 8px 12px;
        margin: 4px 0;
        background-color: #f8f9fa;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .player-item:hover {
        background-color: #e9ecef;
    }
</style>
@endpush

@push('scripts')
<script>
    function getPlayerNames() {
        const input = document.getElementById('playerInput').value;
        // Split by new lines or commas, trim whitespace, filter out empty strings
        const players = input.split(/[\n,]/)
            .map(name => name.trim())
            .filter(name => name.length > 0);
        return players;
    }

    function updatePlayerList() {
        const players = getPlayerNames();
        const playerListDiv = document.getElementById('playerList');
        const totalSpan = document.getElementById('totalPlayers');
        
        totalSpan.textContent = players.length;
        playerListDiv.innerHTML = '';
        
        players.forEach((player, index) => {
            const playerDiv = document.createElement('div');
            playerDiv.className = 'player-item';
            playerDiv.innerHTML = `
                <div>
                    <span class="badge bg-secondary me-2">${index + 1}</span>
                    ${player}
                </div>
                <button class="btn btn-sm btn-outline-danger" onclick="removePlayer(${index})">
                    <i class="bi bi-x"></i>
                </button>
            `;
            playerListDiv.appendChild(playerDiv);
        });
    }

    function removePlayer(index) {
        const players = getPlayerNames();
        players.splice(index, 1);
        document.getElementById('playerInput').value = players.join('\n');
        updatePlayerList();
    }

    function shufflePlayers() {
        const players = getPlayerNames();
        const numTeams = parseInt(document.getElementById('numTeams').value);
        const playersPerTeam = parseInt(document.getElementById('playersPerTeam').value);
        const balanceTeams = document.getElementById('balanceTeams').checked;
        
        if (players.length < 2) {
            alert('Please add at least 2 players');
            return;
        }
        
        // Shuffle players array
        const shuffled = [...players].sort(() => Math.random() - 0.5);
        
        // Create teams
        const teams = [];
        for (let i = 0; i < numTeams; i++) {
            teams.push([]);
        }
        
        // Distribute players to teams
        if (playersPerTeam > 0) {
            for (let i = 0; i < playersPerTeam * numTeams && i < shuffled.length; i++) {
                teams[i % numTeams].push(shuffled[i]);
            }
        } else {
            // Distribute evenly
            shuffled.forEach((player, index) => {
                teams[index % numTeams].push(player);
            });
        }
        
        // Display results
        displayTeams(teams);
        updatePlayerList();
    }

    function displayTeams(teams) {
        const resultsDiv = document.getElementById('teamResults');
        const teamsDisplayDiv = document.getElementById('teamsDisplay');
        
        // Update quick results
        let resultsHTML = '<div class="row">';
        teams.forEach((team, index) => {
            const teamColors = ['primary', 'danger', 'success', 'warning', 'info', 'secondary', 'dark', 'light'];
            const color = teamColors[index % teamColors.length];
            
            resultsHTML += `
                <div class="col-md-${12/Math.min(teams.length, 4)} mb-3">
                    <div class="card team-card h-100 team-${index + 1}">
                        <div class="card-header bg-${color} text-white">
                            <h6 class="mb-0">Team ${String.fromCharCode(65 + index)} (${team.length} players)</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                ${team.map(player => `<li class="py-1"><i class="bi bi-person me-2"></i>${player}</li>`).join('')}
                            </ul>
                        </div>
                        ${document.getElementById('includeCaptains').checked && team.length > 0 ? `
                            <div class="card-footer">
                                <small class="text-muted">Captain: ${team[0]}</small>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
        });
        resultsHTML += '</div>';
        
        resultsDiv.innerHTML = resultsHTML;
        teamsDisplayDiv.innerHTML = resultsHTML;
        
        // Add copy button
        const copyButton = document.createElement('button');
        copyButton.className = 'btn btn-outline-primary mt-3';
        copyButton.innerHTML = '<i class="bi bi-clipboard"></i> Copy Teams to Clipboard';
        copyButton.onclick = copyTeamsToClipboard;
        resultsDiv.appendChild(copyButton);
    }

    function addRandomPlayers() {
        const randomPlayers = [
            "Budi Santoso", "Andi Wijaya", "Citra Dewi", "Dedi Pratama",
            "Eka Putri", "Fajar Nugroho", "Gita Maya", "Hendra Saputra",
            "Indra Setiawan", "Joko Susilo", "Kartika Sari", "Lukman Hakim",
            "Maya Indah", "Nina Utami", "Oki Pratama", "Putri Anggraini"
        ];
        
        document.getElementById('playerInput').value = randomPlayers.join('\n');
        updatePlayerList();
    }

    function clearPlayers() {
        if (confirm('Are you sure you want to clear all players?')) {
            document.getElementById('playerInput').value = '';
            document.getElementById('teamResults').innerHTML = 
                '<p class="text-muted text-center">Click "Shuffle Players" to generate teams</p>';
            document.getElementById('teamsDisplay').innerHTML = '';
            updatePlayerList();
        }
    }

    function copyTeamsToClipboard() {
        const teams = [];
        document.querySelectorAll('.team-card').forEach(card => {
            const teamName = card.querySelector('.card-header').textContent.trim();
            const players = Array.from(card.querySelectorAll('li')).map(li => li.textContent.trim());
            teams.push(`${teamName}\n${players.join('\n')}`);
        });
        
        const textToCopy = teams.join('\n\n');
        navigator.clipboard.writeText(textToCopy).then(() => {
            alert('Teams copied to clipboard!');
        });
    }

    // Initialize player list
    document.getElementById('playerInput').addEventListener('input', updatePlayerList);
    updatePlayerList();
</script>
@endpush
@endsection