<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/controllers/aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
class AWSBucket {
    public $bucket;
    public $key;
    public $secret;
    public $foldername;
    public $storageClass;
    public $fname_dec;
    
    public function __construct()
    {
        $arg_names = array('bucket', 'key', 'secret','foldername','files','storageClass');
        $arg_list = func_get_args();
        for ($i = 0; $i < func_num_args(); $i++) {
            $this->{$arg_names[$i]} = $arg_list[$i];
        }
    }
    
    public function uploadFilesToAWS($bucket,$key,$secret,$foldername,$files,$storageClass='STANDARD',$fname_dec=1){
       $filesArray=array();
       $bash=null;
       
       //print_r($files);die();
       foreach($files as $bashidx => $file){
            if($bash!=$bashidx){
                $j=0;
                $bash=$bashidx;
            }
            if(!is_array($file['name'])){
                if($file['error']==0){
                    $fn=$file['name'];
                    $fpath=$this->s3BucketUpload($bucket,$key,$secret,$foldername,$file,$storageClass,$fname_dec);
                    //echo($bashidx.'===='.$file['name'].'<br>');
                    $filesArray[$bash][$j]['fname']=$fn;
                    $filesArray[$bash][$j]['fpath']=$fpath;
                    $j++;
                }
            }
            elseif(is_array($file['name'])){
                foreach($file['name'] as $fidx => $fname){
                    if($file['error'][$fidx]==0){
                        $fn=$fname;
                        $alfile=array(
                                    'name'      => $file['name'][$fidx],
                                    'type'      => $file['type'][$fidx],
                                    'tmp_name'  => $file['tmp_name'][$fidx],
                                    'error'     => $file['error'][$fidx],
                                    'size'      => $file['size'][$fidx]                                    
                                );
                        $fpath=$this->s3BucketUpload($bucket,$key,$secret,$foldername,$alfile,$storageClass,$fname_dec);
                        $filesArray[$bash][$j]['fname']=$fn;
                        $filesArray[$bash][$j]['fpath']=$fpath;
                        $j++;
                    }
                }
            }
       }
       return $filesArray;
    }
    public function s3BucketUpload($bucket,$key,$secret,$foldername,$file,$storageClass,$fname_dec=1){
        $bucketName = $bucket;
        $IAM_KEY = $key;
        $IAM_SECRET = $secret;
        // Connect to AWS
        try {
            // You may need to change the region. It will say in the URL when the bucket is open
            // and on creation.
            $s3 = S3Client::factory(
                array(
                    'credentials' => array(
                        'key' => $IAM_KEY,
                        'secret' => $IAM_SECRET
                    ),
                    'version' => 'latest',
                    'region'  => 'ap-south-1'
                )
            );
	   } catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	   }
       $filename=$file['name'];
       $mime=$file['type'];
       $tmpname=$file['tmp_name'];
       $error=$file['error'];
       $size=$file['size']; 
       
       $fileext=explode('/',$mime);
	   if($fname_dec){
       $fname=time().'_'.uniqid().'.'.$fileext[1];
	   }else{
		  $fname=$filename; 
	   }
       
       $keyName = $foldername.'/' . $fname;
       $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
       
       //echo($foldername);die();
       try {    
            $s3->putObject(
                        array(
                                'Bucket'        =>  $bucketName,
                                'Key'           =>  $keyName,
                                'SourceFile'    =>  $tmpname,
                                'StorageClass'  =>  'STANDARD',
                                'ContentType'   =>  $mime,
                                'ACL'           => 'public-read'                
                            )
                        );
                        $s3->waitUntil('ObjectExists', array(
                                            'Bucket' => $bucketName,
                                            'Key'    => $keyName
                            ));
                        $plainUrl = $s3->getObjectUrl($bucketName, $keyName); 
                        return $plainUrl;       
                        //echo('<br>'.$var.'---'.$j.'  ');print_r($filesArray);
       } catch (S3Exception $e) {die('Error:'.$e->getMessage());} catch (Exception $e) {die('Error:'.$e->getMessage());}
       
       
    }
}