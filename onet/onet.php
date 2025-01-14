<?php
// Default level
$level = isset($_GET['level']) ? $_GET['level'] : 1;

// Atur ukuran grid dan durasi timer berdasarkan level
switch ($level) {
    case 2:
        $boardSize = [8, 8]; // 8x8 untuk level 2
        $timeLimit = 180; // 3 menit
        break;
    case 3:
        $boardSize = [8, 16]; // 8x16 untuk level 3
        $timeLimit = 180; // 3 menit
        break;
    default:
        $boardSize = [6, 8]; // 6x8 untuk level 1
        $timeLimit = 180; // 3 menit
        break;
}

// Ukuran grid dan elemen gambar
$rows = $boardSize[0];
$cols = $boardSize[1];
$images = ['🍎', '🍌', '🍓', '🍍', '🍒', '🍇', '🍉', '🥝'];

$totalTiles = $rows * $cols;
while (count($tiles = array_merge(...array_fill(0, ceil($totalTiles / count($images)), $images))) < $totalTiles) {}
$tiles = array_slice($tiles, 0, $totalTiles);
shuffle($tiles);

$board = [];
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $board[$i][$j] = array_pop($tiles);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onet Classic - Level <?php echo $level; ?></title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            color: #333333;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        #game-board {
            display: grid;
            grid-template-columns: repeat(<?php echo $cols; ?>, 1fr);
            gap: 2px;
            background: white;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            margin-right: 30px;
            width: <?php echo $cols * 50; ?>px;
            max-width: 100%;
        }
        .tile {
            width: 100%;
            height: calc(400px / <?php echo $rows; ?>);
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8f9fa;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .tile:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .tile.selected {
            border: 3px solid #ff9a9e;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        #score, #timer {
            font-size: 1.2rem;
            padding: 5px 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        #score {
            margin-top: 20px;
            color: #28a745;
        }

        /* Styling for menu icon */
        #menu-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            padding: 5px 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        #menu-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        /* Dropdown menu */
        #menu {
            display: none;
            position: absolute;
            top: 90px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 10;
        }
        #menu div {
            margin: 10px 0;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        #menu div:hover {
            background: #ff9a9e;
            color: white;
        }

        /* Styling for level container */
        .level-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 150px;
        }
        .level-btn {
            background-color: #ff9a9e;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            font-size: 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .level-btn:hover {
            background-color: #ff7b7b;
        }

        /* Game Over Modal */
        #game-over-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease-out;
        }
        .modal-content h1 {
            margin: 0 0 10px;
            font-size: 2rem;
            color: #ff9a9e;
        }
        .modal-content p {
            margin: 10px 0;
            font-size: 1.2rem;
        }
        .modal-content button {
            background: #ff9a9e;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .modal-content button:hover {
            background: #ff7b7b;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

    </style>
</head>
<body>
    <!-- Menu Button -->
    <div id="menu-btn">☰</div>

    <!-- Dropdown Menu -->
    <div id="menu">
        <div id="pause-btn">⏸️ Pause</div>
        <div id="restart-btn">🔄 Restart</div>
    </div>

    <div class="container">
        <div id="game-board">
            <?php foreach ($board as $i => $row): ?>
                <?php foreach ($row as $j => $tile): ?>
                    <div class="tile" data-row="<?php echo $i; ?>" data-col="<?php echo $j; ?>">
                        <span><?php echo $tile; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>

        <!-- Level Selection -->
        <div class="level-container">
            <div id="score">Score: 0</div>
            <div id="timer">Time Remaining: 3:00</div>
            <a href="?level=1"><button class="level-btn">Level 1</button></a>
            <a href="?level=2"><button class="level-btn">Level 2</button></a>
            <a href="?level=3"><button class="level-btn">Level 3</button></a>
        </div>
    </div>

        <!-- Game Over Modal -->
        <div id="game-over-modal" style="display: none;">
            <div class="modal-content">
                <h1>Game Over</h1>
                <p>Your final score is: <span id="final-score">0</span></p>
                <button id="restart-game">Restart</button>
            </div>
        </div>

    <script>
        // Variables and Initialization
        const timerElement = document.getElementById('timer');
        const scoreElement = document.getElementById('score');
        let score = 0;
        let hiddenTiles = 0;
        let firstSelection = null;
        let isPaused = false;
        let timerInterval;
        let timeRemaining = <?php echo $timeLimit; ?>;

        // Start Timer
        function startTimer() {
            timerInterval = setInterval(() => {
                if (!isPaused) {
                    timeRemaining--;
                    if (timeRemaining <= 0) {
                        clearInterval(timerInterval);
                        showGameOverModal(); // Show game over modal instead of alert
                    }
                    updateTimerDisplay();
                }
            }, 1000);
        }

        function showGameOverModal() {
            const modal = document.getElementById('game-over-modal');
            const finalScore = document.getElementById('final-score');
            finalScore.textContent = score;
            modal.style.display = 'flex';

            document.getElementById('restart-game').addEventListener('click', () => {
                location.reload();
            });
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;
            timerElement.textContent = `Time Remaining: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        function updateScoreDisplay() {
            scoreElement.textContent = `Score: ${score}`;
        }

        function checkGameCompletion() {
            if (hiddenTiles === <?php echo $totalTiles; ?>) {
                clearInterval(timerInterval); // Hentikan timer
                showGameOverModal(); // Show game over modal
            }
        }

        function handleTileClick(tileDiv, row, col) {
            if (tileDiv.classList.contains('selected')) return;

            tileDiv.classList.add('selected');

            if (!firstSelection) {
                firstSelection = { tileDiv, row, col };
            } else {
                const { tileDiv: firstTileDiv, row: firstRow, col: firstCol } = firstSelection;

                if (
                    firstTileDiv.innerText === tileDiv.innerText &&
                    !(firstRow === row && firstCol === col)
                ) {
                    setTimeout(() => {
                        firstTileDiv.style.visibility = 'hidden';
                        tileDiv.style.visibility = 'hidden';
                        hiddenTiles += 2; // Tambahkan jumlah tile yang tersembunyi
                        timeRemaining += 2; // Tambah 2 detik jika cocok
                        score += 10;
                        updateTimerDisplay();
                        updateScoreDisplay();
                        checkGameCompletion(); // Periksa apakah permainan selesai
                    }, 300);
                } else {
                    setTimeout(() => {
                        firstTileDiv.classList.remove('selected');
                        tileDiv.classList.remove('selected');
                        timeRemaining -= 5; // Kurang 5 detik jika tidak cocok
                        updateTimerDisplay();
                    }, 300);
                }
                firstSelection = null;
            }
        }

        document.querySelectorAll('.tile').forEach(tileDiv => {
            tileDiv.addEventListener('click', () => {
                const row = tileDiv.getAttribute('data-row');
                const col = tileDiv.getAttribute('data-col');
                handleTileClick(tileDiv, row, col);
            });
        });

        document.getElementById('menu-btn').addEventListener('click', () => {
            const menu = document.getElementById('menu');
            menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'block' : 'none';
        });

        // Pause and resume game
        document.getElementById('pause-btn').addEventListener('click', () => {
            const pauseButton = document.getElementById('pause-btn');
            if (isPaused) {
                isPaused = false;
                startTimer();
                pauseButton.innerHTML = '⏸️ Pause';
            } else {
                isPaused = true;
                clearInterval(timerInterval);
                pauseButton.innerHTML = '▶️ Play';
            }
        });

        // Restart game
        document.getElementById('restart-btn').addEventListener('click', () => {
            location.reload();
        });

        startTimer();
    </script>
</body>
</html>
