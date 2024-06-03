<?php

    use GuzzleHttp\Exception\ConnectException;

    require_once "../components/Componentes.php";

    $componente = new Componentes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/vlog.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Hind&family=Roboto&display=swap" rel="stylesheet">
    <title>Beloved</title>
</head>
<body>
    <header>
        <?php
            echo $componente->header;
        ?>
    </header>
    <main>
        <section class="page">
            <div id="video-container">
                <div id="video-wrapper">
                    <iframe id="video-iframe" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                    <button id="close-video">X</button>
                </div>
            </div>
            <!-- <div id="videos">
                <div class='itemVideo'>
                    <div class='thumb'>
                        <a class='video-link' data-video-id='7oBPDOURHYc'><img class='thumbImage' src='../images/whatsapp-green.png'></a>
                    </div>
                    <h1>Título do vídeo</h1>
                </div>
            </div> -->

            <?php
            //https://youtube.com/@BelovedPortugal?si=fdga9Q497PPxY6hW
            //https://www.youtube.com/channel/UC0Xg3HaPasKRbHb3cld8smg

            require_once '../vendor/autoload.php';

            $client = new Google_Client();
            $client->setDeveloperKey('AIzaSyAYgGXDbFPr14eb9DUTv9yvp_gAjQGUF2A');

            $youtube = new Google\Service\YouTube($client);

            try {

                $idCanal = "UC0Xg3HaPasKRbHb3cld8smg";

                $canalResponse = $youtube->channels->listChannels('contentDetails', array('id' => $idCanal));
                $idPlaylist = $canalResponse->getItems()[0]->getContentDetails()->getRelatedPlaylists()->getUploads();

                $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
                    'playlistId' => $idPlaylist,
                    'maxResults' => 16,
                ));

                echo "<div id='videos'>";

                if (count($playlistItemsResponse) === 0) {
                    echo "<h2>Nenhum vídeo encontrado</h2>";
                } else {
                    foreach ($playlistItemsResponse->getItems() as $video) {
                        $videoId = $video->getSnippet()->getResourceId()->getVideoId();
                        $thumbnail = $video->getSnippet()->getThumbnails()->getMedium()->getUrl();
                        echo "<div class='itemVideo' data-video-id='$videoId'>";
                            echo "<div class='thumb'>";
                                echo "<a class='video-link' data-video-id='$videoId'><img class='thumbImage' src='$thumbnail'></a>";
                            echo "</div>";
                            echo "<h1>".$video->getSnippet()->getTitle()."</h1>";
                        echo "</div>";
                        echo "<hr>";
                    }
                    echo '</div>';
                }
            } catch (Google_Service_Exception $e) {
                echo "Erro ao acessar a API do YouTube: " . htmlspecialchars($e->getMessage());
            } catch (Google_Exception $e) {
                echo "Erro de cliente: " . htmlspecialchars($e->getMessage());
            } catch (ConnectException $e) {
                echo "<p class='errorText'>Não foi possível carregar, verifique sua conexão com a internet e recarregue a página.</p>";
            }
            ?>
            <button id='buttonYouTube'><a href='https://youtube.com/@BelovedPortugal?si=fdga9Q497PPxY6hW' target='_blank'><strong>VEJA MAIS</strong></a></button>
        </section>
    </main>
    <footer>
        <?php
            echo $componente->footer;
        ?>
    </footer>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function() {
        $('.itemVideo').click(function(e) {
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

    function mouseOver() {
        document.getElementById('whatsLogo').src = '../images/whatsapp-green.png';
        document.getElementById('fale').style.color = 'rgb(37, 211, 102)';
    }

    function mouseOut() {
        document.getElementById('whatsLogo').src = '../images/whatsapp-gold3.png';
        document.getElementById('fale').style.color = '#BC9722';
    }

    window.addEventListener('resize', function() {
        var menuList = document.querySelector('.menu-list');
        var isMobile = window.matchMedia('(max-width: 800px)').matches;

        if (!isMobile && window.getComputedStyle(menuList).getPropertyValue('display') === 'flex') {
            menuList.style.display = 'none';
        }
    });

    function toggleMenu() {
        var menuList = document.querySelector('.menu-list');
        var isMobile = window.matchMedia('(max-width: 800px)').matches;

        if (isMobile && window.getComputedStyle(menuList).getPropertyValue('display') === 'none') {
            menuList.style.display = 'flex';
        } else {
            menuList.style.display = 'none';
        }

        if (!isMobile) {
            menuList.style.display = 'none';
        }
    }
</script>

</html>
