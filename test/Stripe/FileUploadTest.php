<?php

class Stripe_FileUploadTest extends StripeTestCase
{
  public function testCreateFile()
  {
    $fp = fopen(dirname(__FILE__).'/../data/test.png', 'r');
    self::authorizeFromEnv();
    $file = Stripe_FileUpload::create(
        array(
            'purpose' => 'dispute_evidence',
            'file' => $fp,
        )
    );
    fclose($fp);
    $this->assertEqual(95, $file->size);
    $this->assertEqual('image/png', $file->mimetype);
  }

  public function testCreateCurlFile()
  {
    if (!class_exists('CurlFile')) {
      // Older PHP versions don't support this
      return;
    }

    $file = new CurlFile(dirname(__FILE__).'/../data/test.png');
    self::authorizeFromEnv();
    $file = Stripe_FileUpload::create(
        array(
            'purpose' => 'dispute_evidence',
            'file' => $file,
        )
    );
    $this->assertEqual(95, $file->size);
    $this->assertEqual('image/png', $file->mimetype);
  }
}
