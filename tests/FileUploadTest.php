<?php
namespace Stripe;

class FileUploadTest extends TestCase
{
  public function testCreateFile()
  {
    $fp = fopen(dirname(__FILE__).'/../data/test.png', 'r');
    self::authorizeFromEnv();
    $file = FileUpload::create(
        array(
            'purpose' => 'dispute_evidence',
            'file' => $fp,
        )
    );
    fclose($fp);
    $this->assertSame(95, $file->size);
    $this->assertSame('image/png', $file->mimetype);
  }

  public function testCreateCurlFile()
  {
    if (!class_exists('CurlFile')) {
      // Older PHP versions don't support this
      return;
    }

    $file = new \CurlFile(dirname(__FILE__).'/../data/test.png');
    self::authorizeFromEnv();
    $file = FileUpload::create(
        array(
            'purpose' => 'dispute_evidence',
            'file' => $file,
        )
    );
    $this->assertSame(95, $file->size);
    $this->assertSame('image/png', $file->mimetype);
  }
}
