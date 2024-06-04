$(document).ready(function() {

  // Função para carregar vídeos do YouTube
  function loadYouTubeVideos() {
    $.get('/api/youtube', function(data) {
      if (data.length === 0) {
        $('#videos').html('<h2>Nenhum vídeo encontrado</h2>');
      } else {
        data.forEach(video => {
          const videoId = video.snippet.resourceId.videoId;
          const thumbnail = video.snippet.thumbnails.medium.url;
          const videoTitle = video.snippet.title;
          $('#videos').append(`
            <div class='itemVideo' data-video-id='${videoId}'>
              <div class='thumb'>
                <a class='video-link' data-video-id='${videoId}'><img class='thumbImage' src='${thumbnail}'></a>
              </div>
              <h1>${videoTitle}</h1>
            </div>
            <hr>
          `);
        });
      }
    }).fail(function() {
      $('#videos').html('<p class="errorText">Erro ao carregar vídeos. Por favor, verifique sua conexão com a internet e recarregue a página.</p>');
    });
  }

  // Chamar a função para carregar vídeos
  loadYouTubeVideos();

  // Lógica de exibição do vídeo
  $(document).on('click', '.itemVideo', function(e) {
    e.preventDefault();
    var videoId = $(this).data('video-id');
    var embedUrl = "https://www.youtube.com/embed/" + videoId;
    $('#video-iframe').attr('src', embedUrl);
    $('#video-container').fadeIn();
  });

  $('#close-video').click(function() {
    $('#video-container').fadeOut();
    $('#video-iframe').attr('src', '');
  });
});
