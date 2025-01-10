$(document).ready(function () {
    const emojis = ['🍎', '🍌', '🍇', '🍓', '🍒', '🍍', '🍉', '🥝'];
    const cards = [...emojis, ...emojis];
    const shuffledCards = cards.sort(() => Math.random() - 0.5);
  
    let firstCard = null;
    let secondCard = null;
    let lockBoard = false;
    let moves = 0;
    let matches = 0;
    let timer = 0;
    let interval;
  
    function startTimer() {
      interval = setInterval(() => {
        timer++;
        $('#timer').text(timer);
      }, 1000);
    }
  
    function resetGame() {
      location.reload();
    }
  
    shuffledCards.forEach((emoji) => {
      $('#game-board').append(`
        <div class="card" data-emoji="${emoji}"></div>
      `);
    });
  
    $('.card').on('click', function () {
      if (!interval) startTimer();
      if (lockBoard || $(this).hasClass('flipped')) return;
  
      $(this).text($(this).data('emoji')).addClass('flipped');
  
      if (!firstCard) {
        firstCard = $(this);
      } else {
        secondCard = $(this);
        lockBoard = true;
  
        moves++;
        $('#moves').text(moves);
  
        if (firstCard.data('emoji') === secondCard.data('emoji')) {
          setTimeout(() => {
            firstCard.addClass('hidden');
            secondCard.addClass('hidden');
            matches++;
            resetBoard();
  
            if (matches === emojis.length) {
              clearInterval(interval);
              $('#final-time').text(timer);
              $('#final-moves').text(moves);
              $('#win-message').fadeIn();
            }
          }, 500);
        } else {
          setTimeout(() => {
            firstCard.text('').removeClass('flipped');
            secondCard.text('').removeClass('flipped');
            resetBoard();
          }, 1000);
        }
      }
    });
  
    function resetBoard() {
      firstCard = null;
      secondCard = null;
      lockBoard = false;
    }
  
    $('#restart').on('click', resetGame);
  });
  