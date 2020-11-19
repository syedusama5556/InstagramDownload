<?php
use Ayesh\InstagramDownload\InstagramDownload;
$url = $_GET['url'];

try {
  $client = new InstagramDownload($url);
  $url = $client->getDownloadUrl(); // Returns the download URL.
  $type = $client->getType(); // Returns "image" or "video" depending on the media type.
}
catch (\InvalidArgumentException $exception) {
  /*
   * \InvalidArgumentException exceptions will be thrown if there is a validation 
   * error in the URL. You might want to break the code flow and report the error 
   * to your form handler at this point.
   */
  $error = $exception->getMessage();
}
catch (\RuntimeException $exception) {
  /*
   * \RuntimeException exceptions will be thrown if the URL could not be 
   * fetched, parsed, or a media could not be extracted from the URL. 
   */
  $error = $exception->getMessage();
}
