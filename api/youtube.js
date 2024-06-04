const { google } = require('googleapis');
require('dotenv').config();

module.exports = async (req, res) => {
  const apiKey = process.env.YOUTUBE_API_KEY;
  const youtube = google.youtube({
    version: 'v3',
    auth: apiKey
  });

  try {
    const channelId = process.env.YOUTUBE_CHANNEL_KEY;
    const channelResponse = await youtube.channels.list({
      part: 'contentDetails',
      id: channelId
    });

    const uploadsPlaylistId = channelResponse.data.items[0].contentDetails.relatedPlaylists.uploads;
    const playlistItemsResponse = await youtube.playlistItems.list({
      part: 'snippet',
      playlistId: uploadsPlaylistId,
      maxResults: 16
    });

    res.status(200).json(playlistItemsResponse.data.items);
  } catch (error) {
    res.status(500).json({ error: 'Erro ao acessar a API do YouTube', details: error.message });
  }
};
