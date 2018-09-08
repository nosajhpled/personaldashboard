<?php
use Aws\S3\S3Client;
class S3
{


  private $client;

  function __construct()
  {

  }

  public function Connect($region,$key,$secret)
  {
    require '../aws/aws-autoloader.php';
    $this->client  = S3Client::factory([
        'version'     => 'latest',
        'region'      => $region,
        'credentials' => [
            'key'    => $key,
            'secret' => $secret,
        ],
    ]);
  }

  public function ReadFile($bucket,$fileName)
  {
    $result = $this->client->getObject(array(
        'Bucket' => $bucket,
        'Key'    => $fileName
    ));
    return $result['Body'];
  }

  public function SaveFile($bucket,$fileName,$bodyText)
  {
    $result = $this->client->putObject(array(
        'Bucket' => $bucket,
        'Key'    => $fileName,
        'Body'   => $bodyText,
        //'ACL'        => 'public-read'
    ));
  }

  public function UploadFile($bucket,$fileName,$pathFileName)
  {
    $result = $this->client->putObject(array(
      'Bucket'     => $bucket,
      'Key'        => $fileName,
      'SourceFile' => $pathFileName
    ));
  }

  public function DownloadFile($bucket,$fileName,$pathFileName)
  {
    $result = $this->ReadFile($bucket,$fileName);
    $outputFile = fopen($pathFileName,"w") or die("Unable to open JSON file.");
    fwrite($outputFile,$result) or die("Unable to write JSON file.");
  }

}
 ?>
