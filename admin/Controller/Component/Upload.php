<?php

class UploadComponent extends Object {

    var $controller = true;
    var $view;
    var $components = array('Session', 'Upload', 'Email');
    var $out_enc = 'UTF-8';
    var $in_enc = 'UTF-8';

    function send($template, $from, $fromName, $to, $toName, $subject, $data) {

        $this->Email->smtpAuth = SMTP_AUTH;
        $this->Email->smtpUserName = SMTP_AUTH_USERNAME;
        $this->Email->smtpPassword = SMTP_AUTH_PASSWORD;
        $this->Email->smtpHostNames = SMTP_HOST_NAME;
        $this->Email->smtpPort = SMTP_PORT;

        $this->Email->template = $template;
        // You can use customised thmls or the default ones you setup at the start

        $this->controller->set('data', $data);
        $this->Email->from = $from;
        $this->Email->fromName = $fromName;
        $this->Email->to = $to;
        $this->Email->toName = $toName;
        $this->Email->subject = $subject;



        //$this->Email->attach($fully_qualified_filename, optionally $new_name_when_attached);
        // You can attach as many files as you like.
        //var_dump();
        $result = $this->Email->send();

        return $result;
    }

    function imageFileCheck($modelName, $fieldName) {
        //Begin Upload file check =============================
        $correctExtension = array("jpg", "gif", "png", "swf");
        $bUpload = false;
        $file = &$this->controller->data[$modelName][$fieldName];

        if (isset($file) && (!empty($file)) && ($file['name'] != "")) {
            $bUpload = TRUE;
            $name = $file['name'];

            //++ Image upload====================================================
            $this->Upload->upload($file);
            $handle = $this->Upload;
            if ($handle->uploaded) {
                $handle->file_max_size = PB_APP_MAX_UPLOAD_SIZE;

                //Check file size
                if ($handle->file_src_size > $handle->file_max_size) {
                    $bUpload = FALSE;
                } else {
                    //Check file extension
                    if (!in_array(strtolower($handle->file_src_name_ext), $correctExtension)) {
                        $bUpload = FALSE;
                    }
                }
            }
        }
        return $bUpload;
    }

    function imageUpload($modelName, $fieldName, $resize = false, $x = 0, $y = 0) {
        $bUploaded = $this->imageFileCheck($modelName, $fieldName);
        $nameoutput = '';
        $file = &$this->controller->data[$modelName][$fieldName];

        if ($bUploaded) {
            //++ Image upload====================================================
            if (isset($file) && $file['name'] != "") {


                $this->Upload->upload($file);
                $handle = $this->Upload;

                if ($handle->uploaded) {
                    $handle->image_resize = $resize;
                    ;
                    $handle->image_ratio_y = $y;
                    $handle->image_x = $x;
                    $handle->file_overwrite = true;
                    $handle->file_auto_rename = false;

                    $sessionUser = $this->Session->read(SESSION_USER);
                    $today = getdate();

                    //[yyyyMMdd]_[contractors_id]_[pict_m]
                    $filename = mktime() . "_" . $sessionUser[USER_ID] . "_" . $fieldName;


                    $handle->file_new_name_body = $filename;
                    $handle->Process(PB_APP_IMG_PATH . "/");

                    if (!$handle->processed) {

                        $bUploaded = FALSE;
                    } else {

                        $nameoutput = $handle->file_dst_name;
                    }
                } else {

                    $bUploaded = FALSE;
                }
            }

            //-- Image upload====================================================
        }


        return $nameoutput;
    }

    function fileUpload($model, $field, $outputPath, $filename) {
        $nameoutput = '';
        $file = &$this->controller->data[$model][$field];

        //++ File upload====================================================
        if (isset($file) && $file['name'] != "") {

            $this->Upload->upload($file);
            $handle = $this->Upload;

            if ($handle->uploaded) {

                $handle->file_overwrite = true;
                $handle->file_auto_rename = false;

                $handle->file_new_name_body = $filename;
                $handle->Process($outputPath . "/");

                if (!$handle->processed) {
                    $bUploaded = FALSE;
                } else {
                    $nameoutput = $outputPath . "/" . $handle->file_dst_name;
                }
            } else {
                $bUploaded = FALSE;
            }
        }
        //-- File upload====================================================

        return $nameoutput;
    }

    function uploadFile($modelName, $fieldName) {
        $bUploaded = $this->imageFileCheck($modelName, $fieldName);
        $nameoutput = '';
        $file = &$this->controller->data[$modelName][$fieldName];
        $bUploaded = true;
        if ($bUploaded) {
            if (isset($file) && $file['name'] != "") {
                $this->Upload->upload($file);
                $handle = $this->Upload;
                if ($handle->uploaded) {
                    $handle->Process(PB_APP_FILE_PATH . "/");
                    if (!$handle->processed) {
                        $bUploaded = FALSE;
                    } else {
                        $nameoutput = $handle->file_dst_name;
                    }
                } else {
                    $bUploaded = FALSE;
                }
            }
        }
        return $nameoutput;
    }

}

?>