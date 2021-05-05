<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/controllers/aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AWS_S3
{

    public function get_AWS_S3_Images($bucket_name,$folder_name,$time = '+5 minutes',$key_name,$key_secret)
	{
    // TEACHERS_IMAGE_KEY TEACHERS_IMAGE_SECRET
    $key_name = ($key_name ==''?TEACHERS_IMAGE_KEY:$key_name);
    $key_secret = ($key_secret==''?TEACHERS_IMAGE_SECRET:$key_secret);
		// echo $bucket_name.' - '.$folder_name.' - '.$time. ' - ' .$key_name.' - '.$key_secret;

		$result = array();
		
		try {
			
		$sharedConfig = S3Client::factory(
       array(
        'credentials' => array(
          'key' => $key_name,
          'secret' => $key_secret
        ),

        'version' => 'latest',
        'region'  => 'ap-south-1'
      )
      );
			
						$cmd = $sharedConfig->getCommand('GetObject', [
							'Bucket' => $bucket_name,
							'Key'    => $folder_name
						]);

				$request = $sharedConfig->createPresignedRequest($cmd, $time);
				$presignedUrl = (string) $request->getUri();
				
		}
		catch(AwsException $e)
		{
			return $e->getMessage();
		}
		
			return $presignedUrl;
			

	}

	public function update_S3_images($bucket_name,$students_id,$tmp)
	{
		// echo $students_id;die;
		$client = S3Client::factory(
       array(
        'credentials' => array(
          'key' => TEACHERS_IMAGE_KEY,
          'secret' => TEACHERS_IMAGE_SECRET
        ),

        'version' => 'latest',
        'region'  => 'ap-south-1'
      )
      );
         	// print_r($tmp);die;
                try {
                    $client->putObject([
                         'Bucket'=>TEACHER_BUCKET_NAME,
                         'Key' =>  $students_id,
                         'SourceFile' => $tmp,
                         'ContentType' => '*/*',
                         'StorageClass' => 'STANDARD',
                         'ACL'=>'public-read'
                    ]);
                      $message = "S3 Upload Successful.";
                      $s3file='http://'.$bucket_name.'.s3.amazonaws.com/'.$students_id;
                      $picture = "<img src='$s3file'/>";
                      return 'S3 File URL:'.$s3file;
                  } catch (S3Exception $e) {
                     // Catch an S3 specific exception.
                    echo 'catch'.$e->getMessage();
                  }

                      return $picture;

	}
}


