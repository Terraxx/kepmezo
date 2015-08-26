<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class ContactPhoto {

    protected $destination;
    protected $fileName;

    function uploadPhoto(&$bean, $event, $arguments)
    {
        require_once('modules/Contacts/Contact.php');
        require_once('include/utils.php');

        $GLOBALS['log']->debug("ContactPhoto->uploadPhoto");

        if(empty($bean->id)) {
            $bean->id = create_guid();
            $bean->new_with_id = true;
        }

        $field_name = 'contact_photo_c';
        if (!empty($_FILES[$field_name]['name'])) {
            global $sugar_config;

            if(!empty($_REQUEST['old_'.$field_name])) {
                $old_file_name = $_REQUEST['old_'.$field_name];

                $old_photo = $sugar_config['cache_dir'].'images/'.$bean->id.'_'.$old_file_name;
                $old_photo_thumb = $sugar_config['cache_dir'].'images/thumb/'.$bean->id.'_'.$old_file_name;
                $GLOBALS['log']->debug("ContactPhoto->uploadPhoto: Deleting old photo: ".$old_photo);
                $GLOBALS['log']->debug("ContactPhoto->uploadPhoto: Deleting old photo thumbnail: ".$old_photo_thumb);
                if(file_exists($old_photo)){
                    unlink($old_photo);
                }
                if(file_exists($old_photo)){
                    unlink($old_photo_thumb);
                }
            }

            $this->fileName = $bean->id.'_'.$_FILES[$field_name]['name'];

            $bean->contact_photo_c = $_FILES[$field_name]['name'];

            if(!is_uploaded_file($_FILES[$field_name]['tmp_name'])) {
                die("ERROR: file did not upload");
            } elseif($_FILES[$field_name]['size'] > $sugar_config['upload_maxsize']) {
                die("ERROR: uploaded file was too big: max filesize: {$sugar_config['upload_maxsize']}");
            }
            $end = (strlen($this->fileName) > 176) ? 176 : strlen($this->fileName);
            $stored_file_name = substr($this->fileName, 0, $end);

            $this->destination = $sugar_config['cache_dir'].'images/'.$stored_file_name;

            if(!is_writable($sugar_config['upload_dir'])) {
                die("ERROR: cannot write to directory: {$sugar_config['upload_dir']} for uploads");
            }

            if(!move_uploaded_file($_FILES[$field_name]['tmp_name'], $this->destination))
            {
                die("ERROR: can't move_uploaded_file to $this->destination. You should try making the directory writable by the webserver");
            }

            $this->setThumbnail();

        }
    }

    /**
     * Thumbnail kép készítése
     */
    function setThumbnail()
    {
        global $sugar_config;

        if (!empty($this->destination)) {
            $size = getimagesize($this->destination);
            $height = 200;
            $ratio = $size[0] / $size[1];
            $width = round($height * $ratio);
            $images_orig = $this->imagecreatefromfile($this->destination);
            $photoX = ImagesX($images_orig);
            $photoY = ImagesY($images_orig);
            $images_thumb = ImageCreateTrueColor($width, $height);

            if (!ImageCopyResampled($images_thumb, $images_orig, 0, 0, 0, 0, $width, $height, $photoX, $photoY)) {
                die("ERROR: can't resize the image");
            } else {
                ImageJPEG($images_thumb, $sugar_config['cache_dir'] . "images/thumb/" . $this->fileName);
            }
        }
    }

    function imagecreatefromfile( $filename ) {
        if (!file_exists($filename)) {
            throw new InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return imagecreatefromjpeg($filename);
                break;

            case 'png':
                return imagecreatefrompng($filename);
                break;

            case 'gif':
                return imagecreatefromgif($filename);
                break;

            default:
                throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
                break;
        }
    }
}
?>