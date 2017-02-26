<?php
declare(strict_types=1);

class InvalidSongException extends Exception
{
}

class InvalidArtistNameException extends InvalidSongException
{
}

class InvalidSongNameException extends InvalidSongException
{
}

class InvalidSongLengthException extends InvalidSongException
{
}

class InvalidSongMinutesException extends InvalidSongLengthException
{
}

class InvalidSongSecondsException extends InvalidSongLengthException
{
}

class Song
{
    private $artistName;
    private $songName;
    private $songLength = 0;


    public function __construct(string $inputString)
    {
        $inputData = explode(";", $inputString);

        if (count($inputData) != 3){
            throw new InvalidSongException("Invalid song.");
        }

        $this->setArtistName($inputData[0]);
        $this->setSongName($inputData[1]);
        $this->setSongLength($inputData[2]);
    }

    private function setArtistName(string $artistName)
    {
        if (strlen($artistName) < 3 || strlen($artistName) > 20){
            throw new InvalidArtistNameException("Artist name should be between 3 and 20 symbols.");
        }

        $this->artistName = $artistName;
    }

    public function getSongName():string
    {
        return $this->songName;
    }

    private function setSongName(string $songName)
    {
        if (strlen($songName) < 3 || strlen($songName) > 30){
            throw new InvalidSongNameException("Song name should be between 3 and 30 symbols.");
        }

        $this->songName = $songName;
    }

    public function getSongLength():int
    {
        return $this->songLength;
    }

    private function setSongLength($songLength)
    {
        $arr = explode(":", $songLength);
        $minutes = 0;
        $seconds = 0;
        if (is_numeric($arr[0]) && is_numeric($arr[1])){
            $minutes = intval($arr[0]);
            $seconds = intval($arr[1]);
        }

        if ($minutes < 0 || $minutes > 14){
            throw new InvalidSongMinutesException("Song minutes should be between 0 and 14.");
        }

        if ($seconds < 0 || $seconds > 59){
            throw new InvalidSongSecondsException("Song seconds should be between 0 and 59.");
        }

        $this->songLength = $seconds + ($minutes * 60);
    }
}

class PlayList
{
    private $songs = [];

    private $playlistLength = 0;

    public function addSong(Song $song){
        $this->songs[] = $song;

        $this->playlistLength += $song->getSongLength();
    }

    public function getSongCount():int
    {
        return count($this->songs);
    }

    public function getPlaylistLength():string
    {
        $hours = intdiv($this->playlistLength, 3600);
        $minutes = intdiv($this->playlistLength - ($hours * 3600), 60);
        $seconds = fmod($this->playlistLength - ($hours * 3600), 60);

        return  $hours . "h " .
                sprintf("%'.02d", $minutes) . "m " .
                sprintf("%'.02d", $seconds) . "s". PHP_EOL;
    }
}

$numberOfSongs = intval(fgets(STDIN));

$playlist = new PlayList();

for ($i = 0; $i < $numberOfSongs; $i++) {

    try {

        $inputData = trim(fgets(STDIN));
        $song = new Song($inputData);
        $playlist->addSong($song);

        echo "Song added." . PHP_EOL;
    }catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
    }
}

echo "Songs added: " . $playlist->getSongCount() . PHP_EOL;
echo "Playlist length: " . $playlist->getPlaylistLength();